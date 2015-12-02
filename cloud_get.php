<meta charset="UTF-8">
<pre><?php
date_default_timezone_set('Asia/Shanghai');
//check if get already? cron once a day!
$file_path = dirname(__FILE__).'/cron/cloud/';
if (!is_dir($file_path)) {
    mkdir($file_path, 0777, true);
}
$file_key = $file_path . date('Ymd') . '.json';
if(file_exists($file_key))  {
	echo 'Warning: File ' . $file_key . ' exists! Exit!!!';
  header("location:cron/cloud/". date('Ymd') . '.json');
	return;
}
//////////////////////////////////////////////////////////////////
$radios = array(
    '无限飞行号' => 'http://www.txly1.net/program/1njcjm-3b2p38',
    'i关怀心磁场' => 'http://www.txly1.net/program/1njchy-3b2ozw',
    '空中辅导' => 'http://www.txly1.net/program/1njci2-3b2p04',
    '恋爱季节' => 'http://www.txly1.net/program/1njci0-3b2p00',
    '幸福满家园' => 'http://www.txly1.net/program/1njci6-3b2p0c',
    '亲情不断电' => 'http://www.txly1.net/program/1njcil-3b2p16',
    '欢乐卡恰碰' => 'http://www.txly1.net/program/1njci4-3b2p08',
    '绝妙当家' => 'http://www.txly1.net/program/1njchx-3b2ozu',
    '微播出炉' => 'http://www.txly1.net/program/1njcm0-3b2p80',
    '生活无国界' => 'http://www.txly1.net/program/1njci3-3b2p06',
    '零点零距离' => 'http://www.txly1.net/program/1njciw-3b2p1s',
    '书香园地' => 'http://www.txly1.net/program/1njci1-3b2p02',
    '爱广播' => 'http://www.txly1.net/program/1njchu-3b2ozo',
    '今夜心未眠' => 'http://www.txly1.net/program/1njcia-3b2p0k',
    '彩虹桥' => 'http://www.txly1.net/program/1njchv-3b2ozq',
    '长夜的牵引' => 'http://www.txly1.net/program/1njci9-3b2p0i',
    '现代人的希望' => 'http://www.txly1.net/program/1njcif-3b2p0u',
    '生命的四季' => 'http://www.txly1.net/program/1njciu-3b2p1o',
    '拥抱每一天' => 'http://www.txly1.net/program/1njchw-3b2ozs',
    '旷野吗哪' => 'http://www.txly1.net/program/1njcly-3b2p7w',
    '真道分解' => 'http://www.txly1.net/program/1njcik-3b2p14',
    '圣言盛宴' => 'http://www.txly1.net/program/1njci8-3b2p0g',
    '齐来颂扬' => 'http://www.txly1.net/program/1njchz-3b2ozy',
    '施恩座前' => 'http://www.txly1.net/program/1njclc-3b2p6o',
    '真理之光' => 'http://www.txly1.net/program/1njcjh-3b2p2y',
    '接棒人' => 'http://www.txly1.net/program/1njcj9-3b2p2i',
    '聆听主道' => 'http://www.txly1.net/program/1njciy-3b2p1w',
    '空中崇拜' => 'http://www.txly1.net/program/1njcir-3b2p1i',
    '善牧良言' => 'http://www.txly1.net/program/1njciz-3b2p1y',
    '好牧人' => 'http://www.txly1.net/program/1njcix-3b2p1u',
    '经动人心' => 'http://www.txly1.net/program/1njcis-3b2p1k',
    '佳美脚踪' => 'http://www.txly1.net/program/1njcl2-3b2p64',
    '蓝天绿洲' => 'http://www.txly1.net/program/1njcit-3b2p1m',
    '给力人生' => 'http://www.txly1.net/program/1njcj7-3b2p2e',
    '空中门训' => 'http://www.txly1.net/program/1njcja-3b2p2k',
    '生根建造' => 'http://www.txly1.net/program/1njcj5-3b2p2a',
    '信仰百宝箱' => 'http://www.txly1.net/program/1njcj8-3b2p2g',
    '生活之光' => 'http://www.txly1.net/program/1njcjc-3b2p2o',
    '生命的福音' => 'http://www.txly1.net/program/1njcjb-3b2p2m',
    '这一刻，清心' => 'http://www.txly1.net/program/1njcld-3b2p6q',
    '良院（基础课程）' => 'http://www.txly1.net/program/1njck8-3b2p4g',
    '良院（本科一套）' => 'http://www.txly1.net/program/1njck9-3b2p4i',
    '良院（本科二套）' => 'http://www.txly1.net/program/1njcka-3b2p4k',
    '良院（进深一套）' => 'http://www.txly1.net/program/1njckb-3b2p4m',
    '良院（进深二套）' => 'http://www.txly1.net/program/1njckc-3b2p4o',
    '晨曦讲座' => 'http://www.txly1.net/program/1njcji-3b2p30',
    '良院精选' => 'http://www.txly1.net/program/1njclb-3b2p6m',
    '天路导向' => 'http://www.txly1.net/program/1njcj3-3b2p26',
    '天路导向（粤语）' => 'http://www.txly1.net/program/1njcj2-3b2p24',
    '恩典与真理（回民）' => 'http://www.txly1.net/program/1njcj0-3b2p20',
    '爱在人间（云南话）' => 'http://www.txly1.net/program/1njcj1-3b2p22',
    '燃亮的一生' => 'http://www.txly1.net/program/1njclz-3b2p7y',
);

require 'vendor/autoload.php';
// aws/aws-sdk-php
//https://github.com/aws/aws-sdk-php
require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');
// use simple_html_dom as shd;
// require_once('simplehtmldom_1_5/simple_html_dom.php'); 

// $file_path = dirname(__FILE__);
// $logfile = $file_path.'/index.html';
$count = 0;
foreach ($radios as $title => $url) {
  $count++;
  $html = SimpleHtmlDom\file_get_html($url);
  if(!$html) { echo '<br/> ^_^lost '.$title;continue;}

  $url = $html->find('#div_playlist li', 0);

  $title_get = $html->find('#div_playlist li .mp3_title', 0)->plaintext;
  $mp3_description = $html->find('#div_playlist li .mp3_description', 0)->plaintext;
  $dates = explode('-', $title_get);
  $data[] = array(
    'id'  => 600 + $count,
    'title' => $title,
    'date' => $dates[1],
    'url'   =>  $url->attr['data-stream'],
    'desc'  => $mp3_description,
    );
  // break;
}
// var_dump($data);
$file = json_encode($data);
if(!is_null($file)){
  file_put_contents( $file_key , $file );
  header($file_key);
}