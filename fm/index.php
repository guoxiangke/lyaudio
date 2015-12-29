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
    <title>FM<?php echo $index.' '.$radio['title']; ?>|公众号：永不止息</title>

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
	<script type="text/javascript">
		<?php
			$i = 0;
			$js_radios = array();
			$max = 6;
			if($radio['day'] == '15') $max = 8;
			if($radio['day'] == '67'||$radio['day'] == '135') $max = 13;
			if($radio['day'] == '7' || $radio['day'] == '6') $max = 29;
			while ($i <= $max) {
				$time = time()-86400*$i;
				$i++;
				$date = date('ymd',$time);
				$date_z = date('N',$time);//1-7
				if($radio['day'] == '15'){
					if($date_z>5) continue;
				}
				if($radio['day'] == '67'){
					if($date_z<=5) continue;
				}
				if($radio['day'] == '6'){
					if($date_z!=6) continue;
				}
				if($radio['day'] == '7'){
					if($date_z!=7) continue;
				}
				if($radio['day'] == '135'){
					if($date_z!=1&&$date_z!=3&&$date_z!=5) continue;
				}
				if(isset($radio['feearadio'])){
					$radio_url = 'http://www.feearadio.net/downloads/program/'.strtoupper($radio['code']).'/'.$radio['code'].'-'.$date.'.mp3';
				}else{
					// if have bce link! use bce!
					// else use 700/nissgzz
					continue;
				}

				$js_radio['title'] = $radio['title'].'-'.$date;
				$js_radio['artist'] = '【'.$index.'】';
				$js_radio['album'] = '良友电台FM'.$index;
				$js_radio['cover'] = 'img/ybzx320.jpg';
				$js_radio['mp3'] = $radio_url;
				$js_radio['ogg'] = '';
				$js_radios[]= $js_radio;
			}
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