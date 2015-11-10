<meta charset="UTF-8"><?php
//check if get already? cron once a day!
$file_path = dirname(__FILE__).'/cron/cloud/';
if (!is_dir($file_path)) {
    mkdir($file_path, 0777, true);
}
date_default_timezone_set('Asia/Shanghai');
$file_key = $file_path . date('Ymd') . '.json';
if(!file_exists($file_key))  {
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
  require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');
  foreach ($radios as $keytitle => $url) {
    $html = SimpleHtmlDom\file_get_html($url);
    if(!$html) continue;
    $url = $html->find('#div_playlist li', 0);
    $title = $html->find('H1', 0)->plaintext;
    $title = $title;
    $title_get = $html->find('#div_playlist li .mp3_title', 0)->plaintext;
    $mp3_description = $html->find('#div_playlist li .mp3_description', 0)->plaintext;
    $dates = explode('-', $title_get);
    $data[] = array(
      'title' => $title,
      'date' => $dates[1],
      'url'   =>  $url->attr['data-stream'],
      'desc'  => $mp3_description,
      );
    //break;
  }
  // var_dump($data);
  $file = json_encode($data);

  file_put_contents( $file_key , $file );
  // echo 'Sucess! Write File :'. $file_key;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>良友直播|公众号：永不止息</title>

    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">

      <div class="hidden show_wx">
        <br>
        <p class="bg-primary">►右上角，在浏览器中打开即可后台播放！↑↑↑↑</p>
        <a style="background-color: #563d7c;color:#fff" href="http://t.cn/RA2GQFq">点此关注服务号，回复【编号】即可微信收听！</a>
      </div>

      <h1>请点击要收听的节目</h1>
      <p id="bg-info">
        <?php if(!isset($_GET['order'])):?>
          <h5><a href="?order=1" style="color:#FFF">顺序排列</a></h5>
        <?php endif;?> 
        <h5><a href="/nizz_play.php" style="color:#FFF">线路二</a></h5>
      </p>    
      <audio id="audio" preload="auto" tabindex="0" controls type="audio/mpeg">
          <source type="audio/mp3" src="http://77g6cj.com1.z0.glb.clouddn.com/lyad.mp3">
          小永提示：不好意思！您的浏览器不支持，建议下载猎豹浏览器浏览本页面.//http://fm77.u.qiniudn.com/2015/hjkkhzb.mp3
      </audio>
      <div class="hidden-xs">
        <p>已加载:</p>
        <div class="progress">
          <div id="valuenow" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100" style="width: 1%">
            <span>0</span>%
          </div>
        </div>
        <p>已播放: <span></span>%</p>        
      </div>
      <ul id="playlist">
        <?php
        $file_key = $file_path . date('Ymd') . '.json';
        // $file_key = 'http://liangyou.yongbuzhixi.com/cron/cloud/'.date('Ymd').'.json';
        // $file_key = 'http://liangyou.yongbuzhixi.com/cron/cloud/20150204.json';      
        $file = file_get_contents($file_key);
        $urls = json_decode($file,TRUE);

        $count = 1;
        foreach ($urls as $url => $value) {
          $new_urls[] = array(
            'title' => '【'.(600+$count).'】'.$value['title'],
            'date'  =>  $value['date'],
            'url'   =>  $value['url'],
            'desc'  =>  $value['desc'],
          );
          $count ++;
        }
        if(!isset($_GET['order']))
          shuffle($new_urls);
        $count = 0;
        foreach ($new_urls as $url => $value) {

        if(isset($value['url'])){
          // $id = str_replace('url.asp?id=', '', $url);
          $title = $value['title'];
          $mp3_link = $value['url'];
          $desc = $value['desc'];
          // $desc = '公众号：永不止息 '.date('md');
          ?>
          <li  class="btn btn-default" role="button" <?php if(!$count) echo ' class="active"';?>>
            <a href="<?php echo $mp3_link;?>"><?php echo $title;?></a>
            <p class="bg-info hidden"><?php echo $desc;?></p>
          </li>
          
          <?php
          $count++;
          // $menu .= '【'.$id.'】'.$title."<br/>";
        }
          // break;
      }
      ?>
      </ul>
      <h4><a style="background-color: #563d7c;color:#fff" href="http://t.cn/RA2GQFq">点此关注服务号，回复【编号】即可微信收听！</a></h4>
      <?php include('focus.php');?>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">

      document.addEventListener("WeixinJSBridgeReady", function onBridgeReady() {
        // WeixinJSBridge.call("hideOptionMenu");
        $('.show_wx').removeClass('hidden');
      });

      var audio;
      var playlist;
      var tracks;
      var current;

      init();
      function init(){
          current = 0;
          audio = $('audio');
          playlist = $('#playlist');
          tracks = playlist.find('li a');
          len = tracks.length - 1;
          audio[0].volume = .10;
          audio[0].play();
          playlist.find('a').click(function(e){
              e.preventDefault();
              link = $(this);
              current = link.parent().index();
              $('#bg-info').html(link.parent().find('.bg-info').html());
              $('h1').html(link.html());    
              $('html, body').animate({ scrollTop: 0 }, 'fast');          
              run(link, audio[0]);
          });
          audio[0].addEventListener('ended',function(e){
              current++;
              if(current == len){
                  current = 0;
                  link = playlist.find('a')[0];
              }else{
                  link = playlist.find('a')[current];    
              }
              $('#bg-info').html(link.parent().find('.bg-info').html());
              $('h1').html(link.html()); 
              run($(link),audio[0]);
          });
      }
      function run(link, player){
              player.src = link.attr('href');
              par = link.parent();
              par.addClass('active').siblings().removeClass('active');
              audio[0].load();
              audio[0].play();
      }

      var audio2 = document.querySelector('audio');
      var percentages = document.querySelectorAll('span');

      function loop() {
        var buffered = audio2.buffered;
        var loaded;
        var played;

        if (buffered.length) {
          loaded = 100 * buffered.end(0) / audio2.duration;
          played = 100 * audio2.currentTime / audio2.duration;
          percentages[0].innerHTML = loaded.toFixed(2);
          $('#valuenow').attr('valuenow',loaded.toFixed(2));          
          $('#valuenow').attr('style','width: ' + loaded.toFixed(0) + '%');
          percentages[1].innerHTML = played.toFixed(2);
        }

        setTimeout(loop, 50);
      }

      loop();
      document.getElementById("audio").volume = 1
    </script>
  </body>
</html>