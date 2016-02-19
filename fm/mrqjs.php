<html lang="en">
  <head>
  <?php
		date_default_timezone_set('Asia/Shanghai');
		//from http://www.tpehoc.org.tw/daily_message/daily_message_1601/catalog_1601.htm
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>每日亲近神-<?php echo date('m');?>月份|公众号：永不止息 微信收听-良友直播-良友知音-良友电台-空中辅导-灵命日粮-旷野吗哪-在线播放-良友微信|公众号：永不止息</title>
     <meta name="description"  content="良友电台为基督教福音电台，一直致力向中国内地广播福音信息，并教导圣经真理、训练基督工人，是同胞的良朋益友。 良友电台的口号是“知音‧牵手‧同行”，我们盼望与听众互为知音，彼此牵手，在人生、信仰路上并肩同行。">
     <META NAME="Keywords" CONTENT="良友电台 益友电台 同行频道 良友 益友 电台 福音 广播 短波 中波 节目 收音机 爱广播 基督教 基督徒 良友知音人 知音人 福音广播 慕道 栽培 训练 少数民族 31公尺 9430千赫 1566千赫 1188千赫 生活智慧 关怀辅导 婚恋家庭 慕道探索 生命成长 学习真道 栽培训练 诗歌音乐 中英双语 少数民族 圣经广播剧 微播出炉 绝妙当家 生活无国界 零点零距离 书香园地 今夜心未眠 i-Radio爱广播 i关怀心磁场 空中辅导 无限飞行号 恋爱季节 幸福满家园 亲情不断电 欢乐卡恰碰 现代人的希望 生命的福音 燃亮的一生 施恩座前 这一刻清心 佳美脚踪 生命的四季 拥抱每一天 旷野吗哪 空中崇拜 真理之光 生根建造 信仰百宝箱 真理与柱石 经动人心 真道分解 聆听主道 圣言盛宴 善牧良言 好牧人 与神同行 生活之光 良院精选 接棒人 晨曦讲座 良友圣经学院 基础课程 良友圣经学院 本科文凭课程 进深文凭课程 齐来颂扬 彩虹桥 长夜的牵引 蓝天绿洲 天路导向 粤语 傈僳佳音 傈僳族 恩典与真理 回民 回民广播 穆斯林 爱在人间 云南话 阳光下的喜鹊 白族 祝福康巴 康巴话 维吾尔佳音 维吾尔语 好消息 蒙古话 壮族 程枫 陈婧 陈心洁 丁小农 杜凯船 方华 樊星原 高典 韩美灵 黄燕君 黄以恩 纪天恩 康宁 蓝冰燕 蓝梦远 乐明怡 梁天路 廖光语 李敬天 林诚 淩树树 淩云 李书雅 刘芳 刘佳音 刘文 罗加怡 罗文辉 卢文 迈克 米雅 Charles Morris 邱海棠 齐云 阮一心 上官娟子 沙韵 沈颖 施雨泽 孙大中 唐华 唐漫 田薇 童真 万峰 王大卫 文惠 武爽 小娟 小四 谢姊妹 许爱琳 徐婷 徐文文 徐小凡 杨东川 杨加美 杨天成 杨羽 颜明 姚谦 叶芳 袁择善 张道明 张大卫 张得仁 章静 张清心 张小环 赵群 郑媛媛 周彩云 周广亮 周素琴 周子禾 庄惠年 李兰 讲道 讲道文章 讲义 诗歌 圣乐 歌谱 网上媒体宣教学院 团契 网上圣经 网上书房 电子刊物 参与 服侍 宣教 差传 尔道自建 mp3 播放器 手机 应用程式 多媒体 教牧之道 夫妻营 广播训练  同行 每日灵修">
    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/stylesheets/style.css">
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/rotate.js"></script>
	</head>
<body>
<div class="container-fluid">
	<div id="player">
		<div class="ctrl">
			<div class="tag">
				<strong>Title</strong>
				<span class="artist">Artist</span>
				<span class="album">Album</span>
			</div>
			<div class="control">
				<div class="left">
					<div class="rewind icon"></div>
					<div class="playback icon"></div>
					<div class="fastforward icon"></div>
				</div>
				<div class="volume right">
					<div class="mute icon left"></div>
					<div class="slider left">
						<div class="pace"></div>
					</div>
				</div>
			</div>
			<div class="pprogress">
				<div class="slider">
					<div class="loaded"></div>
					<div class="pace"></div>
				</div>
				<div class="timer left">0:00</div>
				<div class="right">
					<div class="repeat icon"></div>
					<div class="shuffle icon"></div>
				</div>
			</div>
		</div>
		<div class="row" id="radiopicrow">
			<div class="col-md-6 col-xs-6"><div id="radiopic"></div></div>
			<div class="col-md-6 col-xs-6"><a href="https://mp.weixin.qq.com/s?__biz=MjM5ODQ4NjU4MA==&mid=400462011&idx=1&sn=ea26aacf8317d6dba24b5b339cdf0242&scene=1&srcid=1223NosyF25gZEn8STEnUOqz&key=ac89cba618d2d976ea2bb39169ce8b27d00e57f2c5373fa9ff35a12feaed5678b06c09673fa892ac87e7e33ab4e278a2&ascene=0&uin=MTYyMjI5NjYwMA%3D%3D&devicetype=iMac+MacBookPro11%2C3+OSX+OSX+10.10.5+build(14F1021)&version=11020201&pass_ticket=yUmHU9UKWe7hmJ5vhL7kmwFgzpJEJ7lE4Nnp0Xtz7HaY3IeK3SW6310dOoQEN%2BTO"><div class="cover"></div></a></div>
		</div>
	</div>
	<ul id="playlist"></ul>

	<script src="js/jquery-ui-1.8.17.custom.min.js"></script>
	<script>
		(function($){
			// Settings
			var repeat = localStorage.repeat || 0,
				shuffle = localStorage.shuffle || 'false',
				continous = true,
				autoplay = true,

				playlist = [];
				for (var i = 1; i < <?php echo date('t')+1;?>; i++) {
					element = {}
					element.title = "<?php echo date('n');?>"+'月'+i+'日';
					element.artist = '每日亲近神';
					element.album = '每日亲近神';
					element.cover = '/fm/img/ybzx320.jpg';
					element.mp3 = 'http://www.tpehoc.org.tw/daily_message/daily_message_<?php echo date("ym");//1601 ?>/mp3/'+(160100+i)+'mat'+(61+i)+'.mp3';
					element.ogg = '';
					playlist.push(element);
				};

			// Load playlist
			for (var i=0; i<playlist.length; i++){
				var item = playlist[i];
				$('#playlist').append('<li>'+item.artist+' - '+item.title+'</li>');
			}

			var time = new Date(),
				currentTrack = shuffle === 'true' ? time.getTime() % playlist.length : 0,
				trigger = false,
				audio, timeout, isPlaying, playCounts;

			var play = function(){
				audio.play();
				$('.playback').addClass('playing');
				timeout = setInterval(updateProgress, 500);
				isPlaying = true;
			}

			var pause = function(){
				audio.pause();
				$('.playback').removeClass('playing');
				clearInterval(updateProgress);
				isPlaying = false;
			}

			// Update progress
			var setProgress = function(value){
				var currentSec = parseInt(value%60) < 10 ? '0' + parseInt(value%60) : parseInt(value%60),
					ratio = value / audio.duration * 100;

				$('.timer').html(parseInt(value/60)+':'+currentSec);
				$('.pprogress .pace').css('width', ratio + '%');
				$('.pprogress .slider a').css('left', ratio + '%');
			}

			var updateProgress = function(){
				setProgress(audio.currentTime);
			}

			// Progress slider
			$('.pprogress .slider').slider({step: 0.1, slide: function(event, ui){
				$(this).addClass('enable');
				setProgress(audio.duration * ui.value / 100);
				clearInterval(timeout);
			}, stop: function(event, ui){
				audio.currentTime = audio.duration * ui.value / 100;
				$(this).removeClass('enable');
				timeout = setInterval(updateProgress, 500);
			}});

			// Volume slider
			var setVolume = function(value){
				audio.volume = localStorage.volume = value;
				$('.volume .pace').css('width', value * 100 + '%');
				$('.volume .slider a').css('left', value * 100 + '%');
			}

			var volume = localStorage.volume || 0.5;
			$('.volume .slider').slider({max: 1, min: 0, step: 0.01, value: volume, slide: function(event, ui){
				setVolume(ui.value);
				$(this).addClass('enable');
				$('.mute').removeClass('enable');
			}, stop: function(){
				$(this).removeClass('enable');
			}}).children('.pace').css('width', volume * 100 + '%');

			$('.mute').click(function(){
				if ($(this).hasClass('enable')){
					setVolume($(this).data('volume'));
					$(this).removeClass('enable');
				} else {
					$(this).data('volume', audio.volume).addClass('enable');
					setVolume(0);
				}
			});

			// Switch track
			var switchTrack = function(i){
				if (i < 0){
					track = currentTrack = playlist.length - 1;
				} else if (i >= playlist.length){
					track = currentTrack = 0;
				} else {
					track = i;
				}

				$('audio').remove();
				loadMusic(track);
				if (isPlaying == true) play();
			}

			// Shuffle
			var shufflePlay = function(){
				var time = new Date(),
					lastTrack = currentTrack;
				currentTrack = time.getTime() % playlist.length;
				if (lastTrack == currentTrack) ++currentTrack;
				switchTrack(currentTrack);
			}

			// Fire when track ended
			var ended = function(){
				pause();
				audio.currentTime = 0;
				playCounts++;
				if (continous == true) isPlaying = true;
				if (repeat == 1){
					play();
				} else {
					if (shuffle === 'true'){
						shufflePlay();
					} else {
						if (repeat == 2){
							switchTrack(++currentTrack);
						} else {
							if (currentTrack < playlist.length) switchTrack(++currentTrack);
						}
					}
				}
			}

			var beforeLoad = function(){
				var endVal = this.seekable && this.seekable.length ? this.seekable.end(0) : 0;
				$('.pprogress .loaded').css('width', (100 / (this.duration || 1) * endVal) +'%');
			}

			// Fire when track loaded completely
			var afterLoad = function(){
				if (autoplay == true) play();
				$('.cover img').rotate();
			}

			// Load track
			var loadMusic = function(i){
				var item = playlist[i],
					newaudio = $('<audio>').html('<source src="'+item.mp3+'"><source src="'+item.ogg+'">').appendTo('#player');

				$('.cover').html('<img src="'+item.cover+'" alt="'+item.album+'">');
				$('.tag').html('<strong>'+item.title+'</strong><span class="artist">'+item.artist+'</span><span class="album">'+item.album+'</span>');
				$('#playlist li').removeClass('playing').eq(i).addClass('playing');
				audio = newaudio[0];
				audio.volume = $('.mute').hasClass('enable') ? 0 : volume;
				audio.addEventListener('progress', beforeLoad, false);
				audio.addEventListener('durationchange', beforeLoad, false);
				audio.addEventListener('canplay', afterLoad, false);
				audio.addEventListener('ended', ended, false);
			}

			loadMusic(currentTrack);
			$('.playback').on('click', function(){
				if ($(this).hasClass('playing')){
					pause();
				} else {
					play();
				}
			});
			$('.rewind').on('click', function(){
				if (shuffle === 'true'){
					shufflePlay();
				} else {
					switchTrack(--currentTrack);
				}
			});
			$('.fastforward').on('click', function(){
				if (shuffle === 'true'){
					shufflePlay();
				} else {
					switchTrack(++currentTrack);
				}
			});
			$('#playlist li').each(function(i){
				var _i = i;
				$(this).on('click', function(){
					switchTrack(_i);
				});
			});

			if (shuffle === 'true') $('.shuffle').addClass('enable');
			if (repeat == 1){
				$('.repeat').addClass('once');
			} else if (repeat == 2){
				$('.repeat').addClass('all');
			}

			$('.repeat').on('click', function(){
				if ($(this).hasClass('once')){
					repeat = localStorage.repeat = 2;
					$(this).removeClass('once').addClass('all');
				} else if ($(this).hasClass('all')){
					repeat = localStorage.repeat = 0;
					$(this).removeClass('all');
				} else {
					repeat = localStorage.repeat = 1;
					$(this).addClass('once');
				}
			});

			$('.shuffle').on('click', function(){
				if ($(this).hasClass('enable')){
					shuffle = localStorage.shuffle = 'false';
					$(this).removeClass('enable');
				} else {
					shuffle = localStorage.shuffle = 'true';
					$(this).addClass('enable');
				}
			});

		})(jQuery);
	</script>
	<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
	</div>
</div>
<?php include('../focus.php');?>
</body>
</html>
