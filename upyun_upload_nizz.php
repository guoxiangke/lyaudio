<meta charset="UTF-8">
<?php
require_once('config.php');
if(DEBUG)  echo '<pre>';
//https://github.com/upyun/php-sdk
require_once('upyun.class.php');
$upyun = new UpYun(UPBUCKETNAME, UPOPNAME, UPOPPASS,UpYun::ED_AUTO,600);
if(DEBUG)  echo 'starting!!<br>';
//1.get index from nizz once a day
//2.get all links form nizz once a day
//3.run this file 60times in 1-2点！
//4.wechat add menu 500 to the 节目！
//TODO: 百度分片上传！！！
//MongoDB log the data!!

$relative_path = 'cron/nissigz';
$file_path = dirname(__FILE__).'/'.$relative_path.'/json';
$json_file_key = $file_path.'/'.date('Ymd').'.json';
if(!file_exists($json_file_key)){
    header('location:get_mp3_index_wx.php');
}
$oldmask = umask(0);
chmod($json_file_key,0777);
umask($oldmask); 
$file = file_get_contents($json_file_key);
$urls = json_decode($file,TRUE);
if(isset($_GET['key'])){
  $domyjob = TRUE;
  $jobkey = $_GET['key'];
}else{
  $domyjob = FALSE;
  //go cron work;
}

// check if all done download link
$count = 0;
foreach ($urls as $url => $value) {
    if(isset($value['bce'])){
        $count++;
    }
}
if($count==count($urls)&&$count!=0) {
    echo '<br/>already download all links of mp3!'; 
    $your_url = 'http://'.CDNLINK.'/'.$json_file_key;
    if(@get_headers($your_url)[0] == 'HTTP/1.1 404 Not Found')
    {
      // The file doesn't exist
      $value = array('from'=>'http://www.yongbuzhixi.com');
      $write = json_encode($urls);
      //push to bce the json file!!!!
      $fields = array(
                  'key'=>'/'.$relative_path.'/json'.'/'.date('Ymd').'.json',
                  'fileName'=>$json_file_key,
                  'user_meta'=>json_encode($value)
                );
      //open connection 
      // $return = curl_post($fields,$json_file_key,$write,$debug);
      $return = upyunupload($fields,$json_file_key,$write,$upyun);
      if(DEBUG&&$return) echo $your_url.' upload——done!000<br>';
      header('location:cron/nissigz/json/'. date('Ymd') . '.json');
    }
    else
    {
      if(DEBUG) echo $your_url.' upload——done!111<br>';
      return; // The file exists
    }
    
}

foreach ($urls as $url => $value) {
  if(!isset($value['mp3_link'])){ header('location:get_mp3_link_wx.php?go=1');}
  if(DEBUG)  echo $value['mp3_link'].'--'.$value['title'].'<br/>';
  if(!isset($value['md5']) &&!isset($value['bce']) && isset($value['mp3_link'])){
          if($domyjob){
            if (strpos($value['mp3_link'],'/'.$jobkey.'/') !== false) {            
              if(DEBUG)  echo 'got domyjob!!';
            }else {
              continue;
            }
          }
          if(isset($urls[$url]['try_times']) && $urls[$url]['try_times']>=5){
            continue;
          }
          $mp3_link = $value['mp3_link'];

          preg_match('/\/[a-z]{2,3}\//', $mp3_link, $matches);
          $code = str_replace('/','',$matches[0]);
  				
  				
          $dir_stru = 'liangyou/nissigz/'.$value['title'].'/'.date('Ym');

          $local_dir = dirname(__FILE__).'/cron/audios/'.$dir_stru;
          
          if (!is_dir($local_dir)) {
              $oldmask = umask(0);
              mkdir($local_dir,0777,true);
              // chmod($local_dir, 0777);
              umask($oldmask); 
          }
          $realfile = $local_dir .'/'.$code.date('ymd').'.mp3';
          $objectKey = '/'.$dir_stru .'/'.$code. date('ymd').'.mp3';
          $bce_url = '/liangyou/nissigz/'.urlencode($value['title']).'/'.date('Ym').'/'. date('ymd').'.mp3';
          $urls[$url]['bce'] = $bce_url;
          $bce_url = 'http://'.CDNLINK.$bce_url;
          // var_dump($bce_url);
          // var_dump(get_headers($bce_url));
          // var_dump(get_headers($bce_url)[0]);
          // return;
          if(@get_headers($bce_url)[0] == 'HTTP/1.1 200 OK'){//远程有!!!
            //update json!!
            $urls[$url]['md5'] = 'nomd5';
            $write = json_encode($urls);

            if(!ARCHIVE && file_exists($realfile)) unlink($realfile);
            file_put_contents( $json_file_key , $write); 
            if(DEBUG)  {echo $json_file_key.' updated only!<br>'; return;}
            if(!DEBUG) continue;
          }

          if(file_exists($realfile)){//文件存在本地
            if(filesize($realfile)<104724) {
              unlink($realfile);
              unset($urls[$url]);
              $write = json_encode($urls);
              file_put_contents( $json_file_key , $write); 
              continue;
            }
            $urls[$url]['md5'] = md5_file($realfile);
            
            // $urls[$url]['bce'] = $bce_url;
            $write = json_encode($urls);
            if(@get_headers($bce_url)[0] == 'HTTP/1.1 404 Not Found'){//远程没有
              $fields = array(
                          'key'=>$objectKey,
                          'fileName'=>$realfile,
                          'user_meta'=>json_encode($value)
                        );
              // $return = curl_post($fields,$json_file_key,$write,$debug);
              $return = upyunupload($fields,$json_file_key,$write,$upyun);
              if(!ARCHIVE) unlink($realfile);
            }else{//远程存在文件，只更新json
              //update json!!
              if(!ARCHIVE) unlink($realfile);
              file_put_contents( $json_file_key , $write); 
            }
            if(DEBUG)  echo  $realfile.' file_exists!!<br>';
            continue;
          }

          //远程获取文件！begin Create a stream
          $opts = array(
            'http'=>array(
              'method'=>"GET",
              // 'header'=>"Accept-language: en\r\n" .
                        // "Cookie: foo=bar\r\n"
            )
          );

          $context = stream_context_create($opts);

          // Open the file using the HTTP headers set above
          // $file = file_get_contents('http://www.example.com/', false, $context);
          set_time_limit(0);
          if(@get_headers($mp3_link)[0] == 'HTTP/1.1 404 Not Found'){//nissigz没有

            if(isset($urls[$url]['try_times'])){
              $urls[$url]['try_times']=$urls[$url]['try_times']+1;
              //当3次404无当天节目时，后退到第二天的。
              if($urls[$url]['try_times']>=3){
                $urls[$url]['mp3_link'] = str_replace(date('ymd'), date('ymd',time()-86400*($urls[$url]['try_times']-2)), $urls[$url]['mp3_link']);
              }
            }else{
              $urls[$url]['try_times']=1;
            }
              
            $urls = json_encode($urls);
            //fails
            file_put_contents( $json_file_key , $urls);
            continue;
          }else{
            $file = file_get_contents($mp3_link, false, $context);            
          }
          
          // $file = @readfile($mp3_link);
          if(!$file){
            if(DEBUG)  echo  $realfile.' empty!!<br>';
            // continue;
            return;
          }
          file_put_contents($realfile, $file);
          chmod($realfile, 0777); 
          if(DEBUG)  echo  $realfile.' Download done!<br>';
          // copy($tempfile, $realfile);
          $urls[$url]['md5'] = md5_file($realfile);
          // $urls[$url]['bce'] = $bce_url;
          $write = json_encode($urls);
          if(filesize($realfile)>3000000) { //3M
   					// $url = 'http://localhost/~dale.guo/loves/lyaudio/bce/BosClientSample.php';
  					$fields = array(
	            'key'=>$objectKey,
	            'fileName'=>$realfile,
	            'user_meta'=>json_encode($value)
	        	);
  					//open connection 
            // var_dump($fields);
  					$return = upyunupload($fields,$json_file_key,$write,$upyun);
  					if(DEBUG&&$return) echo $objectKey.' upload done!<br>';
          }else{
            var_dump('error:size too samll!');
            // continue;
          }
          if(!ARCHIVE) unlink($realfile);
          if($domyjob) break;
          break;
  }
  // break;
}

function upyunupload($fields,$json_file_key,$write,$upyun){
  try {
    $fh = fopen($fields['fileName'], 'rb');
    $rsp = $upyun->writeFile($fields['key'], $fh, True);   // 上传图片，自动创建目录
    fclose($fh);
    // var_dump($rsp);
    //upload sucess!
    file_put_contents( $json_file_key , $write); 
    if(DEBUG)  echo $json_file_key.' updated!<br>';
    return TRUE;
  } catch (Exception $e) {
    if(DEBUG){
      echo $e->getCode();     // 错误代码
      echo $e->getMessage();  // 具体错误信息
    }
    return FALSE;
  }
  return;
}
