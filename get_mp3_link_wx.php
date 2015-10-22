<meta charset="UTF-8">
<?php
//need run one time ,sometime 2 if fails!
date_default_timezone_set('Asia/Shanghai');
require 'vendor/autoload.php';
require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');

$file_path = dirname(__FILE__).'/cron/nzzlist/';
$file_key = $file_path . date('Ymd') . '.json';

if(!(date('G')>=5&&date('G')<=6)) {
    // time 1点到2点之间执行！！！
    echo '<br>Hour '.date('G');
    return false;
}
if(!file_exists($file_key)){
    echo '<br>file not exists!';
    return;
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
if($count==count($urls)) {
    echo '<br/>already download all links of mp3!'; 
    return;
}

$logfile = $file_path.'logs.txt';

foreach ($urls as $url => $value) {

	if(!isset($value['mp3_link'])){
		$link = 'http://liangyou.nissigz.com/'.$url;
        $html = SimpleHtmlDom\file_get_html("$link");
        $meta = $html->find('meta[http-equiv="refresh"]');
        $meta = array_shift($meta)->content;
        $mp3_link = str_replace('1; url=','',$meta);
        if(isset($mp3links)) continue;
        $urls[$url]['mp3_link'] = $mp3_link;
        //ignore  when this day no radio.
        if(!strstr($mp3_link, date('ymd'))){
            // $urls[$url]['already'] = 'already'; 
            unset($urls[$url]); 
        }
        $write = json_encode($urls);
        // chmod($file_key,777); 
        file_put_contents( $file_key , $write);
    }
    // break;
}
if(file_exists($file_key))  {
    $oldmask = umask(0);
    chmod($file_key,0777);
    umask($oldmask); 
    header('location:cron/nzzlist/'. date('Ymd') . '.json');
    // unlink($file_key);
    // echo 'Warning: File ' . $file_key . ' exists! Exit!!!';
    return;
}