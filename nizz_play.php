<meta charset="UTF-8"><?php
//check if get already? cron once a day!
$file_path = dirname(__FILE__).'/cron/nzzlist/';
// http://ly.yongbuzhixi.com/cron/nzzlist/20151110.json
if (!is_dir($file_path)) {
    mkdir($file_path, 0777, true);
}
date_default_timezone_set('Asia/Shanghai');
$file_key = $file_path . date('Ymd') . '.json';
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
      <div id="bg-info"><?php if(!isset($_GET['order'])):?>
      	<h5><a href="?order=1" style="color:#FFF">顺序排列</a></h5><?php endif;?>
				<h5><a href="/player/marrage_training.php" style="color:#FFF">婚姻辅导</a></h5>
        <h5><a href="/player/yong.php" style="color:#FFF">青少年事工</a></h5>
      </div>      
      <audio id="audio" preload="auto" tabindex="0" controls type="audio/mpeg">
          <source type="audio/mp3" src="http://77g6cj.com1.z0.glb.clouddn.com/lyad.mp3">
          小永提示：不好意思！您的浏览器不支持，建议下载猎豹浏览器浏览本页面.
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
        $file = file_get_contents($file_key);
        $urls = json_decode($file,TRUE);

        $count = 1;
        foreach ($urls as $url => $value) {
        	$title = $value['title'];
        	$mp3_link = $value['mp3_link'];
        	if(isset($value['bce'])){
        		$title = '【'.$value['title'].'】';
        		$mp3_link = 'http://bos.yongbuzhixi.com/'.$value['bce'];
        	}
          $new_urls[] = array(
            'title' =>  $title,
            'date'  =>  $value['date'],
            'url'   =>  $mp3_link,
            'desc'  =>  $title,
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