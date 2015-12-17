<meta charset="UTF-8"><?php
require_once('config.php');
if(DEBUG)  echo '<pre>';
//check if get already? cron once a day!
$relative_path = 'cron/nissigz';
$file_path = dirname(__FILE__).'/'.$relative_path.'/json';

if (!is_dir($file_path)) {
  $oldmask = umask(0);
  mkdir($file_path,0777,true);
  umask($oldmask); 
}
$file_key = $file_path .'/'. date('Ymd') . '.json';

if(file_exists($file_key))  {
    $file = file_get_contents($file_key);
    $urls = json_decode($file,TRUE);
    if(count($urls)>=20){
      // echo count($urls);
      $oldmask = umask(0);
      chmod($file_path,0777);
      umask($oldmask);
      if(!DEBUG)header('location:cron/nissigz/json/'. date('Ymd') . '.json');
      if(DEBUG)echo 'Warning: File ' . $file_key . ' exists! Exit!!!';
      return;
    }
}
// // 1点到2点之间执行！！！
if(!(date('G')>=1 && date('G')<=1)) {
  echo '<br>Hour '.date('G');
  if(!isset($_GET['go']))
  return;  
}
//////////////////////////////////////////////////////////////////


require 'vendor/autoload.php';
// aws/aws-sdk-php
//https://github.com/aws/aws-sdk-php
require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');
// use simple_html_dom as shd;
// require_once('simplehtmldom_1_5/simple_html_dom.php'); 


$html = SimpleHtmlDom\file_get_html('http://liangyou.nissigz.com/');
if(!$html) return 'can not get html! alert!!!';
// find all td tags with attribite align=center
foreach($html->find('tr') as $tr){
  $key =  $tr->find('td[align="left"]',0);
  if(!$key) continue;
  $key = iconv('GB2312', 'UTF-8//IGNORE//TRANSLIT', $key->innertext);
  if(!$key) continue;

    if(strstr($key,'良友圣经学院')) {
      continue;
      $titles = explode('-', $key);
      $key = $titles[1];
  }
  // $value = preg_replace('（([^（）]+)）','', $value);
  // $value = '生命的四季（星期一至五为直播，节目会於直播完毕后上载）';
  if(strstr($key,'生命的四季')) $key = '生命的四季';
  if(strstr($key,'空中辅导')) $key = '空中辅导';
  if(strstr($key,'无限飞行号')) $key = '无限飞行号';
  if(strstr($key,'关怀心磁场')) $key = '心磁场';
  if(strstr($key,'清心')) $key = '清心';
  if(strstr($key,'爱广播')) $key = '爱广播';
  if(strstr($key,'爱在人间')) $key = '爱在人间';
  if(strstr($key,'天路导向')) $key = '天路导向';
  if(strstr($key,'善牧良言')) $key = '善牧良言';
  preg_replace('/[\(（][\s\S]*[\)）]/', '', $key);
  var_dump($key);

  foreach($tr->find('a[target="_blank"]') as $td){
  	$id = str_replace('url.asp?id=','',$td->href);
    $url[$id] = $key;
  } //url.asp?id=79567

}
// var_dump($url);
$url = array_reverse($url,true);
// var_dump($url);
$url = array_flip($url);
// // var_dump($url);
$url = array_flip($url);
// var_dump($url);
// array(49) {
//   [79713]=>
//   string(58) "良友圣经学院（本科文凭课程）-青少年事工"

require_once('liangyou_audio_list.php');
$list = liangyou_audio_list_bytitle();
// if(DEBUG)  var_dump($list);
foreach ($url as $id => $value) {
  if($list[$value]['bce'] != 1) continue;
	$urls["url.asp?id=".$id]['title'] = $value;
}
// file_put_contents( $file_store_key, print_r($urls, true)) ;
// var_dump($urls);
$file = json_encode($urls);

// // shell_exec("mkdir $file_path -p");
file_put_contents( $file_key , $file ) ;
// echo 'Sucess! Write File :'. $file_key;
// header('location:get_mp3_index_wx.php');