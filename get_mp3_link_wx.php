<?php
date_default_timezone_set('Asia/Shanghai');
require 'vendor/autoload.php';
require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');

$file_path = dirname(__FILE__).'/cron/nzzlist/';
$file_key = $file_path . date('Ymd') . '.json';

if(file_exists($file_key))  {
    // header('location:cron/nzzlist/'. date('Ymd') . '.json');
    unlink($file_key);
    echo 'Warning: File ' . $file_key . ' exists! Exit!!!';
    return;
}
//1点到2点之间执行！！！
if(!(date('G')>1&&date('G')<2)) return;
// $file_store_key = $file_path .'/store/'. date('Ymd') . '.txt';
// chmod($file_store_key, 0777); 
chmod($file_key, 0777); 
$file = file_get_contents($file_key);
$urls = json_decode($file,TRUE);

$logfile = $file_path.'logs.txt';

foreach ($urls as $url => $value) {

	if(!isset($value['mp3_link'])){
		$link = 'http://liangyou.nissigz.com/'.$url;
        $html = SimpleHtmlDom\file_get_html("$link");
        $meta = $html->find('meta[http-equiv="refresh"]');
        $meta = array_shift($meta)->content;
        $mp3_link = str_replace('1; url=','',$meta);
        $urls[$url]['mp3_link'] = $mp3_link;
        //ignore  when this day no radio.
        if(!strstr($mp3_link, date('ymd'))){
            $urls[$url]['already'] = 'already';  
        }
        $write = json_encode($urls);
        file_put_contents( $file_key , $write);
    }
    // break;
}
