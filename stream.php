<?php
$file_path = dirname(__FILE__).'/cron/stream/';
if (!is_dir($file_path)) {
    mkdir($file_path, 0777, true);
}
$file_key = $file_path . date('Ymd') . '.json';
if(!file_exists($file_key)) {
	$url = 'http://stream.liangyou.net/channel/65837e3587';
	// $url = 'http://liangyou.yongbuzhixi.com/65837e3587';
	// $html = file_get_html($url);
	require 'vendor/autoload.php';
	require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');
	$html = SimpleHtmlDom\file_get_html($url);
	$audios = array();
	foreach($html->find('#div_playlist li.li_show') as $li) {
		$title = $li->plaintext;
		$title = explode('&nbsp;&nbsp;&nbsp;',$title);
		$main_title = trim($title[1]);
		$audios[$main_title]['title'] =  $main_title;
		$audios[$main_title]['url'] =  $li->{'data-mp3'};
		$audios[$main_title]['desc'] = '播出时间：'.trim($title[0]);
	}
	// var_dump($audios);
	$file = json_encode($audios);

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
    <title>微信收听-良友直播-良友知音-良友电台-空中辅导-灵命日粮-旷野吗哪-在线播放-良友微信|公众号：永不止息</title>
     <meta name="description"  content="良友电台为基督教福音电台，一直致力向中国内地广播福音信息，并教导圣经真理、训练基督工人，是同胞的良朋益友。 良友电台的口号是“知音‧牵手‧同行”，我们盼望与听众互为知音，彼此牵手，在人生、信仰路上并肩同行。">
     <META NAME="Keywords" CONTENT="良友电台 益友电台 同行频道 良友 益友 电台 福音 广播 短波 中波 节目 收音机 爱广播 基督教 基督徒 良友知音人 知音人 福音广播 慕道 栽培 训练 少数民族 31公尺 9430千赫 1566千赫 1188千赫 生活智慧 关怀辅导 婚恋家庭 慕道探索 生命成长 学习真道 栽培训练 诗歌音乐 中英双语 少数民族 圣经广播剧 微播出炉 绝妙当家 生活无国界 零点零距离 书香园地 今夜心未眠 i-Radio爱广播 i关怀心磁场 空中辅导 无限飞行号 恋爱季节 幸福满家园 亲情不断电 欢乐卡恰碰 现代人的希望 生命的福音 燃亮的一生 施恩座前 这一刻清心 佳美脚踪 生命的四季 拥抱每一天 旷野吗哪 空中崇拜 真理之光 生根建造 信仰百宝箱 真理与柱石 经动人心 真道分解 聆听主道 圣言盛宴 善牧良言 好牧人 与神同行 生活之光 良院精选 接棒人 晨曦讲座 良友圣经学院 基础课程 良友圣经学院 本科文凭课程 进深文凭课程 齐来颂扬 彩虹桥 长夜的牵引 蓝天绿洲 天路导向 粤语 傈僳佳音 傈僳族 恩典与真理 回民 回民广播 穆斯林 爱在人间 云南话 阳光下的喜鹊 白族 祝福康巴 康巴话 维吾尔佳音 维吾尔语 好消息 蒙古话 壮族 程枫 陈婧 陈心洁 丁小农 杜凯船 方华 樊星原 高典 韩美灵 黄燕君 黄以恩 纪天恩 康宁 蓝冰燕 蓝梦远 乐明怡 梁天路 廖光语 李敬天 林诚 淩树树 淩云 李书雅 刘芳 刘佳音 刘文 罗加怡 罗文辉 卢文 迈克 米雅 Charles Morris 邱海棠 齐云 阮一心 上官娟子 沙韵 沈颖 施雨泽 孙大中 唐华 唐漫 田薇 童真 万峰 王大卫 文惠 武爽 小娟 小四 谢姊妹 许爱琳 徐婷 徐文文 徐小凡 杨东川 杨加美 杨天成 杨羽 颜明 姚谦 叶芳 袁择善 张道明 张大卫 张得仁 章静 张清心 张小环 赵群 郑媛媛 周彩云 周广亮 周素琴 周子禾 庄惠年 李兰 讲道 讲道文章 讲义 诗歌 圣乐 歌谱 网上媒体宣教学院 团契 网上圣经 网上书房 电子刊物 参与 服侍 宣教 差传 尔道自建 mp3 播放器 手机 应用程式 多媒体 教牧之道 夫妻营 广播训练  同行 每日灵修">
    <!-- Bootstrap -->
    <link href="http://libs.useso.com/js/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
	    body {
				background: #2980b9;
				color: #fff;
				font-family: '微软雅黑','Lato', Arial, sans-serif;
			}
			#playlist li{
				margin-bottom: 15px;
			}

			#playlist{
				padding:20px;
				padding-left: 0;
			}
			audio{
				width: 100%;
				font-family: 微软雅黑;
				font-size: 20px;
				text-decoration: none;
			}
			.active a{text-decoration:none;}
			li a{padding:5px;display:block;}
			li a:hover{text-decoration:none;}
		</style>
  </head>
  <body>
  	<div class="container-fluid">

			<div class="hidden-lg">
				<p class="bg-primary">点击右上角，在浏览器中打开即可后台播放！</p>
			</div>

	    <h1>Hello, TX!</h1>

	    <audio id="audio" preload="auto" tabindex="0" controls type="audio/mpeg">
	        <source type="audio/mp3" src="http://www.cloud-audio.com/get_stream/ee6a0e-11b17b">
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
			<p id="bg-info"></p>
	    <ul id="playlist">
	    	<?php
	      // $file_key = 'http://liangyou.yongbuzhixi.com/cron/cloud/'.date('Ymd').'.json';
	      // $file_key = 'http://liangyou.yongbuzhixi.com/cron/cloud/20150123.json';
	      $file_key = $file_path . date('Ymd') . '.json';
	      $file = file_get_contents($file_key);
	      $urls = json_decode($file,TRUE);
	      $count = 0;
	      foreach ($urls as $url => $value) {

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
	    <?php include('focus.php');?>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://libs.useso.com/js/jquery/1.9.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://libs.useso.com/js/bootstrap/3.2.0/js/bootstrap.min.js"></script>

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
