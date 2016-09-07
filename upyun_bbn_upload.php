<meta charset="UTF-8">
<?php
require_once('config.php');
require_once('tools.php');
require_once('bbn.php');
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
// $relative_json_file = '/cron/bbn/json/'.date('Ym').'/'.date('Ymd').'.json';
// $json_file_key = dirname(__FILE__).'/'.$relative_json_file;

$relative_path = 'cron/bbn';
$file_path = dirname(__FILE__).'/'.$relative_path.'/json/'.date('Ym');

if (!is_dir($file_path)) {
  $oldmask = umask(0);
  mkdir($file_path,0777,true);
  umask($oldmask);
}
$json_file_key = $file_path .'/'. date('Ymd') . '.json';


if(!file_exists($json_file_key)){
  $json = bbn_audio_list();
  foreach ($json as $keyword => $value) {
    //不是每天都有的节目处理
    $weekday = date('N')-1;//1-7天？
    if($keyword==401) echo "今天是滴 $weekday 日 \n";
    $code =str_replace('0', $weekday, $json[$keyword]['code']);
    $new = mp_get_bbn($keyword)[$keyword];
    if($keyword==401) echo $new['mp3_link'];
    $tmp_link = substr($new['mp3_link'], 0, 56);
    $pos = strpos($tmp_link,"$weekday");
    if($keyword==401) var_dump($pos);
    if ($pos === false) {
      var_dump($code.' no! in today!');
      continue;
    }
    $newjson[$keyword] = $new;
    $newjson[$keyword]['download'] = 0;
  }
  file_put_contents($json_file_key , json_encode($newjson));
  return;
  // header('location:get_mp3_index_wx.php');
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
  if(isset($value['md5'])){
      $count++;
  }
}

// var_dump($urls);
foreach ($urls as $key => $value) {
  if($urls[$key]['download'] == 1) continue;
  $mp3_link = $value['mp3_link'];
  $dir_stru = 'resources/400/'.$key;
  $local_dir = dirname(__FILE__).'/cron/'.$dir_stru;
  if (!is_dir($local_dir)) {
      $oldmask = umask(0);
      mkdir($local_dir,0777,true);
      // chmod($local_dir, 0777);
      umask($oldmask);
  }
  $realfile = $local_dir .'/'.$key.'_'.date('ymd').'.mp3';
  $objectKey = '/'.$dir_stru .'/'.$key.'_'.date('ymd').'.mp3';

  $bce_url = upyun_get_link($objectKey);
  if(DEBUG)  var_dump($bce_url);
  if(DEBUG)  var_dump(get_headers($bce_url)[0]);
  if(@get_headers($bce_url)[0] == 'HTTP/1.1 200 OK'){//远程有!!!
    //update json!!
    $urls[$key]['md5'] = 'nomd5';
    $urls[$key]['download'] = 1;
    $urls[$key]['upyun'] = $objectKey;
    $write = json_encode($urls);
    if(!ARCHIVE && file_exists($realfile)) unlink($realfile);
    file_put_contents( $json_file_key , $write);
    if(DEBUG)  {echo $json_file_key.' updated only!<br>'; return;}
    if(!DEBUG) continue;
  }

  if(file_exists($realfile)){//文件存在本地
    if(filesize($realfile)<104724) {
      // unlink($realfile);
      // unset($urls[$key]);
      // $write = json_encode($urls);
      // file_put_contents( $json_file_key , $write);
      continue;
    }
    $urls[$key]['md5'] = md5_file($realfile);
    $urls[$key]['download'] = 1;
    $urls[$key]['upyun'] = $objectKey;
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
    break;
  }


  set_time_limit(0);
  if(@get_headers($mp3_link)[0] == 'HTTP/1.1 404 Not Found'){//nissigz没有
    // try_times
    unset($urls[$key]);
    $write = json_encode($urls);
    file_put_contents( $json_file_key , $write);
    // $urls = json_encode($urls);
    // //fails
    // file_put_contents( $json_file_key , $urls);
    continue;
  }else{
    $file = file_get_contents($mp3_link);
  }

  // $file = @readfile($mp3_link);
  if(!$file){
    if(DEBUG)  echo  '<br>'.$realfile.' empty!!<br>';

    unset($urls[$key]);
    $write = json_encode($urls);
    file_put_contents( $json_file_key , $write);
    break;
    // continue;
  }
  file_put_contents($realfile, $file);
  chmod($realfile, 0777);
  if(DEBUG)  echo  $realfile.' Download done!<br>';
  // copy($tempfile, $realfile);
  $urls[$key]['md5'] = md5_file($realfile);
  $urls[$key]['download'] = 1;
  $urls[$key]['upyun'] = $objectKey;
  $write = json_encode($urls);
  file_put_contents( $json_file_key , $write);
  $fields = array(
    'key'=>$objectKey,
    'fileName'=>$realfile,
    'user_meta'=>json_encode($value)
  );
  // $return = curl_post($fields,$json_file_key,$write,$debug);
  $return = upyunupload($fields,$json_file_key,$write,$upyun);
  if(!ARCHIVE) unlink($realfile);
  break;
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
