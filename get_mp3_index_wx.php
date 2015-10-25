<meta charset="UTF-8"><?php
date_default_timezone_set('Asia/Shanghai');
//check if get already? cron once a day!
$file_path = dirname(__FILE__).'/cron/nzzlist/';
if (!is_dir($file_path)) {
  $oldmask = umask(0);
  mkdir($file_path,0777,true);
  umask($oldmask); 
}
$file_key = $file_path . date('Ymd') . '.json';

if(file_exists($file_key))  {
    $file = file_get_contents($file_key);
    $urls = json_decode($file,TRUE);
    if(count($urls)>30){
      // echo count($urls);
      $oldmask = umask(0);
      chmod($file_path,0777);
      umask($oldmask);
      header('location:cron/nzzlist/'. date('Ymd') . '.json');
      // echo 'Warning: File ' . $file_key . ' exists! Exit!!!';
      return;
    }
}
// // 1点到2点之间执行！！！
if(!(date('G')>=12 && date('G')<=14)) {
  echo '<br>Hour '.date('G');
  // return;  
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
  $key = iconv('GB2312', 'UTF-8//IGNORE', $key->innertext);
  foreach($tr->find('a[target="_blank"]') as $td){
  	$id = str_replace('url.asp?id=','',$td->href);
    $url[$id] = $key;
  } //url.asp?id=79567

}
// var_dump($url);
$url = array_reverse($url,true);
// var_dump($url);
$url = array_flip($url);
// var_dump($url);
$url = array_flip($url);
// var_dump($url);
// array(49) {
//   [79713]=>
//   string(58) "良友圣经学院（本科文凭课程）-青少年事工"

foreach ($url as $id => $value) {
  if(strstr($value,'良友圣经学院')) {
      // continue;
      $titles = explode('-', $value);
      $value = $titles[1];
  }
  // $value = preg_replace('（([^（）]+)）','', $value);
  //生命的四季（星期一至五为直播，节目会於直播完毕后上载）
  if(strstr($value,'生命的四季')) $value = '生命的四季';
  if(strstr($value,'天路导向（')) continue; 
  if(strstr($value,'灵命日粮')) continue; 
  if(strstr($value,'听听90后')) continue; 
  // if(strstr($value,'善牧良言')) continue; 
  //$value = '天路导向1';
  if(strstr($value,'关怀心磁场')) $value = '心磁场';
  if(strstr($value,'爱广播')) $value = '爱广播';
  if(strstr($value,'爱在人间')) $value = '爱在人间';
	$urls["url.asp?id=".$id]['title'] = $value;
}
// file_put_contents( $file_store_key, print_r($urls, true)) ;
// var_dump($urls);
$file = json_encode($urls);

// // shell_exec("mkdir $file_path -p");
file_put_contents( $file_key , $file ) ;
// echo 'Sucess! Write File :'. $file_key;
header('location:get_mp3_index_wx.php');