<?php
	date_default_timezone_set('Asia/Shanghai');
  require_once('../fm/lyfm.inc');
	$day = (date('z'))%5+1;
	// $mp3_link = 'http://bos.yongbuzhixi.com/lyaudio/nizz/cc/1511/cc151102.mp3';
	$mp3str = 151101 + $day;
	// $mp3_link = 'http://lywxaudio.b0.upaiyun.com/2015/cc/cc'.$mp3str.'.mp3';

  $upyun_bucket_name = 'lywxaudio';
  $cdnlink = $upyun_bucket_name.'.b0.upaiyun.com';

  $path = '/2015/cc/cc'.$mp3str.'.mp3';
  $mp3_link = 'http://'.$cdnlink.$path.upyun_get_token($path);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>辅导基础(<?php echo $day;?>/5)|空中辅导特辑|公众号：永不止息</title>
<meta name="Author" CONTENT="Dale.guo">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">

<link rel="stylesheet" href="images/common.css">
<link rel="stylesheet" href="custom.css">
<script src="images/jquery-2.0.0.min.js"></script>
<script src="images/move.min.js"></script>
<script src="images/common.js"></script>
</head>

<body>
	<div class="cover_bg">
		<div class="cover_pic" id="cover_pic">
			<a href="javascript:void(0)" id="heartbtn" onclick="like();_gaq.push(['_trackEvent', 'ListAudios', 'Like', 'like it']);" class="heartbtn"></a>
			<a href="javascript:void(0)" id="fmlist" class="homebtn" onclick="_gaq.push(['_trackEvent', 'ListAudios', 'ListAudio', 'numerical data about the user event']);"></a>
			<div class="playbg">
				<div class="songtitle" id="songtitle"></div>
				<div class="auther" id="auther"><span id="desc">辅导基础原则(<?php echo $day;?>/5)</span> <span id="timeremain">00:00</span> </div>
				<div class="progdiv">
					<div class="pgbg">
						<div id="pgbuf" class="pgbuf" style="width: 0%;"></div>
						<div id="pgtime" class="pgtime" style="width: 0%;"></div>
					</div>
				</div>
				<div class="playbtns">
					<a href="javascript:void(0)" id="prevbtn" class="prevbtn disable-button" onclick="prev_song();_gaq.push(['_trackEvent', 'ListAudios', 'next', 'play prev_song']);"></a>
					<a href="javascript:void(0)" id="playbtn" class="playbtn" onclick=";_gaq.push(['_trackEvent', 'ListAudios', 'pause', 'play&pause']);"></a>
					<a href="javascript:void(0)" id="nextbtn" class="nextbtn" onclick="next_song();_gaq.push(['_trackEvent', 'ListAudios', 'next', 'play next_song']);"></a>
				</div>
			</div>
		</div>
	</div>
	<div class="songintro" id="songintro">每日更新，循环播出！敬请关注！</div>
    <audio id="song_player" current='0' src="<?php echo $mp3_link;?>" preload="auto" autoplay="autoplay"></audio>
	<div class="copyright">Powered by： <a href="http://t.cn/RA2GQFq">永不止息</a></div>

<div id="fmlistbox" class="fmlistbox">
	<div class="header">
        <header>
            <a href="javascript:void(0)" id="all_list" class="list_style" onclick="show_all();_gaq.push(['_trackEvent', 'ListAudios', 'show_all', 'show_all']);">已发布的</a>
            <a href="javascript:void(0)" id="like_list" class="list_style no_select" onclick="show_like();_gaq.push(['_trackEvent', 'ListAudios', 'show_like', 'show_like']);">我喜欢的</a>
            <a href="javascript:void(0)" id="fmlista" class="fmlista"></a>
        </header>
    </div>
    <div id="fmlistdiv" class="fmlistdiv">
    	<?php
    		$count = 0;
        for ($i=$day; $i >= 1; $i--) {
        	$desc= '第'.($day-$i).'课';
        	$title = '辅导基础原则';
        	$count ++;
        	$mp3str = 151101 + $count;

        $upyun_bucket_name = 'lywxaudio';
        $cdnlink = $upyun_bucket_name.'.b0.upaiyun.com';

        $path = '/2015/cc/cc'.$mp3str.'.mp3';
        $mp3_link = 'http://'.$cdnlink.$path.upyun_get_token($path);

        	// $mp3_link = 'http://bos.yongbuzhixi.com/lyaudio/nizz/cc/1511/cc'.$mp3str.'.mp3';
      ?>
			<dl>
				<a href="javascript:void(0)" current='0'  desc="辅导基础原则(<?php echo $day;?>/5)" src="<?php echo $mp3_link;?>">
				<dt><img src="images/cover.jpg" width=50></dt>
				<dd><h3>第<?php echo ($day-$i+1);?>课</h3></dd>
				<dd>辅导基础原则</dd>
				<dd><span>良友电台 空中辅导</span></dd>
				</a>
			</dl>
      <?php }  ?>
    </div>
    <nav class="s_page" id="s_page">
			<div class="s_page_div" id="s_page_div">
			<a href="javascript:void(0)" class="first_pg">首页</a>
			<a href="javascript:void(0)" class="prev_pg">上一页</a>
			<a href="javascript:void(0)" class="next_pg">下一页</a>
			<a href="javascript:void(0)" class="end_pg">尾页</a>
			</div>
    </nav>
</div>


<script>
	$(function() {
		initsite();
		$('#fmlist').click(function(){
			move('#fmlistbox').set('left', 0).end();
			return false;
		});
		$('#fmlista').click(function(){
			move('#fmlistbox').sub('left', dwidth).end();
			return false;
		});
		player.init('#song_player');

	});

</script>
<script src="dale.custom.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61326251-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
