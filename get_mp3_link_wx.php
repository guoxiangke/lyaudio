<meta charset="UTF-8">
<?php
require_once('config.php');
if(DEBUG)  echo '<pre>';
//need run one time ,sometime 2 if fails!
require 'vendor/autoload.php';
require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');


$relative_path = 'cron/nissigz';
$file_path = dirname(__FILE__).'/'.$relative_path.'/json/'.date('Ym');
$file_key = $file_path .'/'. date('Ymd') . '.json';

if(!(date('G')>=2 && date('G')<=2)) {
    // time 1点到2点之间执行！！！
    echo '<br>Hour '.date('G');
    if(!isset($_GET['go']))
        return;
}
if(!file_exists($file_key)){
    echo '<br>file not exists!';
    header('location:get_mp3_index_wx.php');
}

$oldmask = umask(0);
chmod($file_key,0777);
umask($oldmask); 

$file = file_get_contents($file_key);
$urls = json_decode($file,TRUE);

// check if all done download link
$count = 0;
if(isset($urls))
foreach ($urls as $url => $value) {
    if(isset($value['mp3_link'])){
        $count++;
    }
}
if($count==count($urls) && $count!=0) {
    if(DEBUG)  echo '<br/>already download all links of mp3!'; 
    
    if(!DEBUG) {
        header('location:upyun_upload_nizz.php');
    }
    return;
}


foreach ($urls as $url => $value) {
    if(DEBUG)  echo $value['title'].'<br>';
	if(!isset($value['mp3_link'])){
		$link = 'http://liangyou.nissigz.com/'.$url;
        if(DEBUG)  echo $link.'<br>';
        // if(DEBUG)  var_dump(get_headers($link));
        $html = SimpleHtmlDom\file_get_html("$link");
        if(!$html) continue;
        $meta = $html->find('meta[http-equiv="refresh"]');
        $meta = array_shift($meta)->content;
        $mp3_link = str_replace('1; url=','',$meta);
        // if(isset($mp3links)) continue;
        $urls[$url]['mp3_link'] = $mp3_link;
        //ignore  when this day no radio.
        if(!strstr($mp3_link, date('ymd'))){
            // $urls[$url]['already'] = 'already'; 
            unset($urls[$url]); 
            continue;
        }
        break;
    }
}
$write = json_encode($urls);
// chmod($file_key,777); 
file_put_contents( $file_key , $write);
if(file_exists($file_key) && !DEBUG)  {
    $oldmask = umask(0);
    chmod($file_key,0777);
    umask($oldmask); 
    // header('location:cron/nissigz/json/'. date('Ymd') . '.json');
    return;
}