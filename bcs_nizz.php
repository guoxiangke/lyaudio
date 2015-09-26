<meta charset="UTF-8">
<pre>
<?php
//1.get index from nizz once a day
//2.get all links form nizz once a day
//3.run this file 60times in 1-2点！
//4.wechat add menu 500 to the 节目！
//TODO: 百度分片上传！！！
//MongoDB log the data!!
$debug = 0;
$archive = 0;
date_default_timezone_set('Asia/Shanghai');
$file_path = dirname(__FILE__).'/cron/nzzlist/';
$file_key = $file_path . date('Ymd') . '.json';
// $file_store_key = $file_path .'/store/'. date('Ymd') . '.txt';
// chmod($file_store_key, 0777); 
chmod($file_key, 0777); 
$file = file_get_contents($file_key);
$urls = json_decode($file,TRUE);
if(isset($_GET['key'])){
  $domyjob = TRUE;
  $jobkey = $_GET['key'];
}else{
  $domyjob = FALSE;
  //go cron work;
}
foreach ($urls as $url => $value) {
  if($debug) echo $value['mp3_link'].'--'.$value['title'].'<br/>';
	if(!isset($value['md5']) &&!isset($value['already']) && isset($value['mp3_link'])){

        if($domyjob){
          if (strpos($value['mp3_link'],'/'.$jobkey.'/') !== false) {            
            if($debug) echo 'got domyjob!!';
          }else {
            continue;
          }
        }

        $mp3_link = $value['mp3_link'];
        preg_match('/[a-z]{2,}[\d]{6}/', $mp3_link, $matches);
				$prefix = str_replace(date('ymd'), '', $matches[0]);
				$filename = $matches[0];
				$local_dir = dirname(__FILE__).'/audios/';//tempfile
        if($archive) $local_dir = dirname(__FILE__).'/audios/liangyou/audio/'.date('Ym').'/'.$value['title'];
        
        if (!is_dir($local_dir)) {
            $oldmask = umask(0);
            mkdir($local_dir,0777,true);
            // chmod($local_dir, 0777);
            umask($oldmask); 
        }
        $realfile = $local_dir . '/' . $filename .  '.mp3';

        if(file_exists($realfile)){
            // return 'file_exists';
        	if($debug) echo  $realfile.' file_exists!!<br>';
        	continue;
        }
        // Create a stream
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
        try {
            $file = file_get_contents($mp3_link, false, $context);            
        } catch (Exception $e) {
            // $urls = json_encode($urls);
            //fails
            // file_put_contents( $file_key , $urls);
            continue;
        }
        
        // $file = @readfile($mp3_link);
        if(!$file){
          if($debug) echo  $realfile.' empty!!<br>';
          continue;
        }
        file_put_contents($realfile, $file);
        chmod($realfile, 0777); 
        if($debug) echo  $realfile.' Download done!<br>'; 
        // if(md5_file($realfile) == md5_file($tempfile)){
        //     return 'log the same!';
        // }
        // copy($tempfile, $realfile);
        $urls[$url]['md5'] = md5_file($realfile);
        $objectKey = '/lyaudio/nizz/'.$prefix.'/'.date('ym').'/'.$prefix.date('ymd').'.mp3';
        $urls[$url]['bce'] = $objectKey;
        $write = json_encode($urls);
        if(filesize($realfile)>104724) {
 					// $url = 'http://localhost/~dale.guo/loves/lyaudio/bce/BosClientSample.php';
					$fields = array(
					            'key'=>$objectKey,
					            'fileName'=>$realfile,
					            'user_meta'=>json_encode($value)
					        	);
					//open connection 
					$return = curl_post($fields,$file_key,$write,$debug);
					if($debug&&$return) echo $objectKey.' upload——done!000<br>';
        }
        if(!$archive) unlink($realfile);
        if($domyjob) break;
        // break;
	}

}

function curl_post($fields,$file_key,$write,$debug=0){
	$server = isset($_SERVER[HTTP_HOST])?$_SERVER[HTTP_HOST]:'http://localhost';
  $uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
  // echo 'http://' . $_SERVER['HTTP_HOST'] . $uri_parts[0];
	$url = "http://".$server.$uri_parts[0].'bce/BosClientSample.php';
	if($debug) echo($url);
	$url = str_replace('bcs_nizz.php', '', $url);
	//open connection
	$ch = curl_init() ;
	//set the url, number of POST vars, POST data
	curl_setopt($ch, CURLOPT_URL,$url) ;
	curl_setopt($ch, CURLOPT_POST,count($fields)) ; // 启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。
	curl_setopt($ch, CURLOPT_POSTFIELDS,$fields); // 在HTTP中的“POST”操作。如果要传送一个文件，需要一个@开头的文件名

	ob_start();
	curl_exec($ch);
	$result = ob_get_contents() ;
	ob_end_clean();

	if($debug) echo '<br>curl: '.$result;
	if($result){
		//upload sucess!
    file_put_contents( $file_key , $write); 
    if($debug) echo $file_key.' updated!<br>'; 
    curl_close($ch) ;
    return TRUE;
	}
	//close connection
	curl_close($ch) ;
	return FALSE;
}
