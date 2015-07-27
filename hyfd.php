<?php
// $xml = 'http://www.w4j.org/MessageCenter/News/W4JPODCastFeed.asp?txtOrgCode=HaoMuRen&Category=17';
// $xmlstring = file_get_contents($xml);
// $xml = simplexml_load_string($xmlstring);
// $json = json_encode($xml);
// var_dump($radios);
$title = '婚姻辅导-林真儿';

$urls = array(
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 一 课 引言－婚姻的谬思与正解 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 二 课 现代婚姻的威胁(1)世俗的模式'),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 三 课 现代婚姻的威胁(2)自私的罪性 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 四 课 现代婚姻的威胁(3)婚外的情事 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 五 课 现代婚姻的威胁(4)适应的困难 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 六 课 婚姻现状与蓝图－世俗婚姻与神创婚姻的比较 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 七 课 原创婚姻说明书(1)神对婚姻的旨意(上) '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 八 课 原创婚姻说明书(2)神对婚姻的旨意(下) '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 九 课 原创婚姻说明书(3)神对婚姻的计划(上) '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第 十 课 原创婚姻说明书(4)神对婚姻的计划(下)'),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十一课 不再约会-恋爱前的预备 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十二课 婚前交往-有目标的恋爱 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十三课 订婚之前(1)评估现在的情感与和谐(上) '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十四课 订婚之前(2)评估现在的情感与和谐(下) '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十五课 订婚之前(3)预备未来的亲密和忠实 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十六课 订婚之前(4)面对过去的背景与经历 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十七课 结婚之前(1)订婚－建立婚姻的蓝图(上) '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十八课 结婚之前(2)订婚－建立婚姻的蓝图(下) '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第十九课 结婚之前(3)如何视察辨明神的旨意(上)'),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第二十课 结婚之前(4)如何视察辨明神的旨意(下)'),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿一课 神在婚姻中的地位与能力 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿二课 丈夫在婚姻中的角色与责任 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿三课 妻子在婚姻中的角色与责任 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿四课 建立更深的沟通 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿五课 建立亲密的性关系 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿六课 化解冲突的方式 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿七课 以德报怨－祝福的能力 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿八课 父亲与母亲的角色 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第廿九课 破裂、触礁与重建-关于离婚与再婚的辅导 '),
  array('mp3_link'=>'https://dn-cfyin.qbox.me/mavmc001.mp3','title'=>'第三十课 建立属灵的承传'),
);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo $title;?>|公众号：永不止息</title>

    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

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

      <h3><?php echo $title;?></h3>
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
        // shuffle($urls);
        // var_dump($radios);
        $count = 0;
        foreach ($urls as $key => $value) {
        	$desc= $value['title'];
        	$title = $value['title'];
        	$mp3_link = $value['mp3_link'];
        if(isset($value['title'])){
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
      <?php include('focus.php');?>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

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
      document.getElementById("audio").volume = 1
    </script>
  </body>
</html>