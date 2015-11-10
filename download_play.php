<?php
// $xml = 'http://www.w4j.org/MessageCenter/News/W4JPODCastFeed.asp?txtOrgCode=HaoMuRen&Category=17';
// $xmlstring = file_get_contents($xml);
// $xml = simplexml_load_string($xmlstring);
// $json = json_encode($xml);
// $array = json_decode($json,TRUE);
	$radios = array(
		'ir'=>array(
			'title'	=>	'i-radio爱广播',
			'desc'	=>	'唐华、康宁、徐婷、万峰。 资讯导航节目，良友电台最新消息。'),
		'yu'=>array(
			'title'	=>	'绝妙当家',
			'desc'	=>	'孙大中、杨加美、高典主持。 没有理由，不需要理由，你就是主角。绝对唯一，绝对独特，你是无可取代。'),
		'gv'=>array(
			'title'	=>	'生活无国界',
			'desc'	=>	'颜明、叶芳、黄青、樊星原、施雨泽主持。 天南地北、古今中外，一扇开阔你视野的窗口──精彩世界看得见。 '),
		'zz'=>array(
			'title'	=>	'零点零距离',
			'desc'	=>	'乐明怡、陈心洁、杜凯船、韩美灵、周子禾、许爱琳主持。 让你吃好、玩好、与神和好、与人和好！'),
		'se'=>array(
		  'title'	=>	'恋爱季节（周1-5）',
			'desc'	=>	 '张大卫、徐凡、黄以恩、 徐文文、李书雅、廖光语主持。 欢迎孤男寡女、一男一女、已婚男女、不分男女，一起沉浸在《恋爱季节》！ '),
		'up'=>array(	
			'title'	=>	'亲情不断电（周1-5）',
			'desc'	=>	'上官娟子、蓝梦远、李敬天、凌树树主持。 有一种情，与你一起出死入生，既塑造你的个性，又激发你的人生；既要你学会舍，又要你珍惜得。这就是── 我们的亲情。 '),
		'bc'=>array(
			'title'	=>	'书香园地（周1-5）',
			'desc'	=>	'刘文主持。 打开心灵的窗户，让书香的味道飘洒进来；走进繽纷的园地，让生命的色彩丰富起来。 '),
		'gn'=>array(
			'title'	=>	'现代人的希望',
			'desc'	=>	'米雅、庄惠年、张得仁主持。 唯有来自永恒的声音，才能抚慰虚空的心灵。圣经是迷途者的指南，耶穌是现代人的希望。'),
		'hg'=>array(
			'title'	=>	'欢乐卡恰碰',
			'desc'	=>	'李佩吉、高典、袁择善主持。 和我们一起，唱歌、听故事、培养好品格 GO GO GO ！！！'),
		'im'=>array(
			'title'	=>	'i关怀心磁场',
			'desc'	=>	'携手，关爱同行！'),
		'ib'=>array(
			'title'	=>	'无限飞行号',
			'desc'	=>	'罗文辉、丁小农主持。 《无限飞行号》，与你同飞行！ '),
		'tg'=>array(
			'title'	=>	'施恩座前',
			'desc'	=>	'周彩云、周广亮主持。 通过介绍有关祷告的圣经真理、分享信徒祷告的见证、实际祷告操练与代祷。'),

		'bv'=>array(
			'title'	=>	'灵命日粮',
			'desc'	=>	'孙大中主持。 每天一篇喻道故事，每天一段经文，餵养你的属灵生命。带领你与主更亲近'),

		'be'=>array(
			'title'	=>	'真道分解',
			'desc'	=>	'圣经66卷书的讲解和教导，与你一起查经、读经、研经,让神的话语扎根，更新和转化我们的生命'),
	'cc'=>array(
			'title'	=>	'空中辅导',
			'desc'	=>	'周素琴、丁小农、杨天成主持。 细心聆听你的苦闷心声， 真诚关怀你的内心感受，借着圣经和祷告给你回应，为你指引成长的途径。'),
		'ee'=>array(
			'title'	=>	'拥抱每一天',
			'desc'	=>	'凌云主持。 生命能够成长，因为我们愿意放下昨天；生命那么美好，因为我们依然拥有今天；生命充满希望，因为我们可以计划明天！'),
		'tr'=>array(
			'title'	=>	'彩虹橋',
			'desc'	=>	'田薇、杨羽、梁艺主持。 这是学习唱诗赞美的时刻，这是学习灵修分享的时刻，是你我和神见面的时刻。'),
		'cw'=>array(
			'title'	=>	'齊來頌揚',
			'desc'	=>	'方华主持。 严选古今中外讚美圣诗，带领信徒齐来敬拜，同心颂扬万王之王，万主之主！'),
		'ws'=>array(
			'title'	=>	'长夜的牵引',
			'desc'	=>	'武爽、蓝冰燕主持。 一束光，用跳跃的音符，带领着你和我穿过长夜。那是牵引，那是爱，进入自由的天地，显明真理。'),
		'bs'=>array(
			'title'	=>	'聖言盛宴',
			'desc'	=>	'袁择善、张以琳、张凡、杉杉主持。 透过小组查经的方式与呈现，带领听众明白神的圣言，领受属灵的丰盛筵席。'),
		'th'=>array(
			'title'	=>	'真理之光',
			'desc'	=>	'齐云主持。 带领传道同工和弟兄姊妹更深入的认识圣经真理，让神的话语成为我们生命中随时的提醒、帮助、鼓励、安慰和引导！'),
		'sr'=>array(
			'title'	=>	'給力人生',
			'desc'	=>	'目为初信栽培而设，透过不同的课题，生命读经、家庭规划、自我探索等，让信仰落实到信徒生活的每个层面。'),
		'dp'=>array(
			'title'	=>	'空中門訓',
			'desc'	=>	'个在耶稣基督里寻求成长的信徒。'),
		'pb'=>array(
			'title'	=>	'接棒人',
			'desc'	=>	'陈雅芳、张美玲主持。 专为教会领袖和事奉人员提供神学和教义训练。'),
		'ds'=>array(
			'title'	=>	'晨曦讲座',
			'desc'	=>	'卢文、林诚、文惠、姚谦、阮一心、罗文辉主持,良院牧者和师长每天与你分享，透过圣经真理建立你的生命与事奉；帮助学员应用、实践良院课程中所学。')
);
// var_dump($radios);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>精选良友节目播放|公众号：永不止息</title>

    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="css/audio.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid">

      <div class="hidden-lg">
        <br>
        <p class="bg-primary">►点击右上角，在浏览器中打开即可后台播放！↑↑↑</p>
        <p>小永提示：请务必在浏览器中浏览本页面以获得最佳体验.</p>
      </div>

      <h3>精选节目播放</h3>
      <div id="bg-info">
      </div>  
      <div class="bg-no">
        <?php if(!isset($_GET['order'])):?>
        <h5><a href="?order=1" style="color:#FFF">顺序排列</a></h5><?php endif;?>
        <h5><a href="/index.php" style="color:#FFF">线路一</a></h5>
        <h5><a href="/nizz_play.php" style="color:#FFF">线路二</a></h5>
        <h5><a href="/player/marrage_training.php" style="color:#FFF">婚姻辅导</a></h5>
        <h5><a href="/player/yong.php" style="color:#FFF">青少年事工</a></h5>
        <h5><a href="/xwz.php" style="color:#FFF">小王子</a></h5>
        <h5><a href="/xz.php" style="color:#FFF">下载收听</a></h5>
      </div>       
      <audio id="audio" preload="auto" tabindex="0" controls type="audio/mpeg">
          <source type="audio/mp3" src="http://fm77.u.qiniudn.com/2015/hjkkhzb.mp3">
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
        $urls = $radios;
        // shuffle($urls);
        // var_dump($radios);
        $count = 0;
        foreach ($urls as $key => $value) {

        if(isset($value['title'])){
          // $id = str_replace('url.asp?id=', '', $url);
          $title = '[' . $key .']'. $value['title'];
          // $mp3_link =  str_replace('150205', date('ymd'), 'http://media.febcchinese.org/Streaming/'.$key.'/'.$key.'150205.mp3');
          
          date_default_timezone_set('Asia/Chongqing');
          $mp3_link =  'http://media.febcchinese.org/Streaming/'.$key.'/'.$key.date('ymd').'.mp3'; 
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
    </script>
  </body>
</html>