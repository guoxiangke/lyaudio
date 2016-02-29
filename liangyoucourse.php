<?php
// $xml = 'http://www.w4j.org/MessageCenter/News/W4JPODCastFeed.asp?txtOrgCode=HaoMuRen&Category=17';
// $xmlstring = file_get_contents($xml);
// $xml = simplexml_load_string($xmlstring);
// $json = json_encode($xml);
// var_dump($radios);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>婚姻与家庭|公众号：永不止息|良友圣经学院|本科课程</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/audio.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">

      <div class="hidden-lg">
        <br>
        <p class="bg-primary">►点击右上角，在浏览器中打开即可后台播放！↑↑↑</p>
        <p>小永提示：请务必在浏览器中浏览本页面以获得最佳体验.</p>
      </div>

      <h3>婚姻与家庭</h3>
      <p id="bg-info"></p>
      <audio id="audio" preload="auto" tabindex="0" controls type="audio/mpeg">
          <source type="audio/mp3" src="http://yongbuzhixi.qiniudn.com/LePetitPrince/01.mp3">
          小永提示：不好意思！您的浏览器不支持，建议下载猎豹浏览器浏览本页面.
      </audio>
      <div class="">
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
        $day = ($date('z') - 87)/24 + 1;
        for ($i=1; $i <= $day; $i++) {
        	$desc= '第'.$i.'课';
        	$title = '婚姻与家庭';
        	$mp3_link = 'http://liangyou.u.qiniudn.com/old/d基础课程/004婚姻与家庭/mavmf0'.str_pad($i, 2, "0", STR_PAD_LEFT).'.mp3';
        ?>
          <li  class="btn btn-default" role="button" <?php if(!$i) echo ' class="active"';?>>
            <a href="<?php echo $mp3_link;?>"><?php echo $title;?></a>
            <p class="bg-info hidden"><?php echo $desc;?></p>
          </li>

        <?php }  ?>
      </ul>
      <?php include('focus.php');?>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
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
    </script>
  </body>
</html>
