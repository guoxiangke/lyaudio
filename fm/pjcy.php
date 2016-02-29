<?php
require_once('../config.php');
date_default_timezone_set('Asia/Shanghai');
require_once('../liangyou_audio_list.php');
$radios = liangyou_audio_list_byindex();
$index = '607';
if(isset($_GET['fm']))
	$index = $_GET['fm'];
$radio = $radios[$index];
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>破镜重圆-外遇辅导|公众号：永不止息</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
	<script type="text/javascript">
		<?php
			$i = 0;
			$js_radios = array();
			$max = 9;
			while ($i < $max) {
				$i++;
				$js_radio['title'] = '第'.$i.'集';
				$js_radio['artist'] = '如何面对外遇I';
				$js_radio['album'] = '冯志梅:如何面对外遇'.$i;
				$js_radio['cover'] = 'img/ybzx320.jpg';
				$js_radio['mp3'] = 'http://wwwmp3.fuyin.tv/n/04%E5%A9%9A%E5%A7%BB%E5%AE%B6%E5%BA%AD/06%E5%84%BF%E7%AB%A5%E7%9B%B8%E5%85%B3/z%E4%B8%BB%E6%97%A5%E5%AD%A6%E7%9B%B8%E5%85%B3mp3/%E5%AE%B6%E5%BA%AD-mp3/%E5%A6%82%E4%BD%95%E9%9D%A2%E5%AF%B9%E5%A4%96%E9%81%87%EF%BC%88I%EF%BC%89/PART%20'.$i.'.mp3';
				$js_radio['ogg'] = '';
				$js_radios[]= $js_radio;
			}
				$js_radio['title'] = '第10集';
				$js_radio['artist'] = '如何面对外遇I';
				$js_radio['album'] = '冯志梅:如何面对外遇'.$i;
				$js_radio['cover'] = 'img/ybzx320.jpg';
				$js_radio['mp3'] = 'http://downsmp3.fuyin.tv//n/04%E5%A9%9A%E5%A7%BB%E5%AE%B6%E5%BA%AD/06%E5%84%BF%E7%AB%A5%E7%9B%B8%E5%85%B3/z%E4%B8%BB%E6%97%A5%E5%AD%A6%E7%9B%B8%E5%85%B3mp3/%E5%AE%B6%E5%BA%AD-mp3/%E5%A6%82%E4%BD%95%E9%9D%A2%E5%AF%B9%E5%A4%96%E9%81%87%EF%BC%88I%EF%BC%89/PART%209a.mp3';
				$js_radio['ogg'] = '';
				$js_radios[]= $js_radio;

				$js_radio['title'] = '第11集';
				$js_radio['artist'] = '如何面对外遇I';
				$js_radio['album'] = '冯志梅:如何面对外遇'.$i;
				$js_radio['cover'] = 'img/ybzx320.jpg';
				$js_radio['mp3'] = 'http://downsmp3.fuyin.tv//n/04%E5%A9%9A%E5%A7%BB%E5%AE%B6%E5%BA%AD/06%E5%84%BF%E7%AB%A5%E7%9B%B8%E5%85%B3/z%E4%B8%BB%E6%97%A5%E5%AD%A6%E7%9B%B8%E5%85%B3mp3/%E5%AE%B6%E5%BA%AD-mp3/%E5%A6%82%E4%BD%95%E9%9D%A2%E5%AF%B9%E5%A4%96%E9%81%87%EF%BC%88I%EF%BC%89/PART%209b.mp3';
				$js_radio['ogg'] = '';
				$js_radios[]= $js_radio;

				$i = 0;
				$max = 9;
				while ($i < $max) {
					$i++;
					$js_radio['title'] = '第'.$i.'集';
					$js_radio['artist'] = '如何面对外遇II';
					$js_radio['album'] = '冯志梅:如何面对外遇'.$i;
					$js_radio['cover'] = 'img/ybzx320.jpg';
					$js_radio['mp3'] = 'http://downsmp3.fuyin.tv//n/04%E5%A9%9A%E5%A7%BB%E5%AE%B6%E5%BA%AD/06%E5%84%BF%E7%AB%A5%E7%9B%B8%E5%85%B3/z%E4%B8%BB%E6%97%A5%E5%AD%A6%E7%9B%B8%E5%85%B3mp3/%E5%AE%B6%E5%BA%AD-mp3/%E5%A6%82%E4%BD%95%E9%9D%A2%E5%AF%B9%E5%A4%96%E9%81%87%EF%BC%88II%EF%BC%89/PART%20'.$i.'.mp3';
					$js_radio['ogg'] = '';
					$js_radios[]= $js_radio;
				}
				$js_radio['title'] = '第10集';
				$js_radio['artist'] = '如何面对外遇II';
				$js_radio['album'] = '冯志梅:如何面对外遇'.$i;
				$js_radio['cover'] = 'img/ybzx320.jpg';
				$js_radio['mp3'] = 'http://downsmp3.fuyin.tv//n/04%E5%A9%9A%E5%A7%BB%E5%AE%B6%E5%BA%AD/06%E5%84%BF%E7%AB%A5%E7%9B%B8%E5%85%B3/z%E4%B8%BB%E6%97%A5%E5%AD%A6%E7%9B%B8%E5%85%B3mp3/%E5%AE%B6%E5%BA%AD-mp3/%E5%A6%82%E4%BD%95%E9%9D%A2%E5%AF%B9%E5%A4%96%E9%81%87%EF%BC%88II%EF%BC%89/PART%209a.mp3';
				$js_radio['ogg'] = '';
				$js_radios[]= $js_radio;
			$playlist = json_encode($js_radios);
		?>
		var playlist = <?php echo $playlist;?>;
	</script>
	<script src="js/script.js"></script>
	<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
	</div>
	<?php include('../focus.php');?>
</div>
</body>
</html>
