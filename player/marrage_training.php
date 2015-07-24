<?php 
	$day = (date('z') - 88)%30 + 1;
	$mp3_link = 'http://liangyou.u.qiniudn.com/new/hyfd/mavmc0'.str_pad($day, 2, "0", STR_PAD_LEFT).'.mp3';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>婚姻辅导(<?php echo $day;?>/30)|公众号：永不止息</title>
<meta name="Author" CONTENT="ZETD">
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
				<div class="auther" id="auther"><span id="desc">婚姻辅导-圣洁的渴望(<?php echo $day;?>/30)</span> <span id="timeremain">00:00</span> </div>
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
	<div class="songintro" id="songintro">每日更新，敬请关注,讲义稍后放出！</div>
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
        for ($i=$day; $i >= 1; $i--) { 
        	$desc= '第'.$i.'课';
        	$title = '婚姻与家庭';
        	$mp3_link = 'http://liangyou.u.qiniudn.com/new/hyfd/mavmc0'.str_pad($i, 2, "0", STR_PAD_LEFT).'.mp3';
      ?>
			<dl>
				<a href="javascript:void(0)" current='0'  desc="婚姻辅导-圣洁的渴望(<?php echo $day;?>/30)" src="<?php echo $mp3_link;?>">
				<dt><img src="images/cover.jpg" width=50></dt>
				<dd><h3>第<?php echo $i;?>课</h3></dd>
				<dd>婚姻与家庭</dd>
				<dd><span>良友圣经学院 本科课程</span></dd>
				</a>
			</dl>
      <?php }  ?>
			<dl>
				<a href="javascript:void(0)" current='<?php echo $day +1 ;?>' desc="下期预告-小王子(1/3)" src="http://yongbuzhixi.qiniudn.com/LePetitPrince/0.mp3">
				<dt><img src="images/cover.jpg" width=50></dt>
				<dd><h3>小王子</h3></dd>
				<dd>下期预告1</dd>
				<dd><span>法国经典名著</span></dd>
				</a>
			</dl>
			<dl>
				<a href="javascript:void(0)" current='<?php echo $day +2 ;?>' desc="下期预告-小王子(2/3)" src="http://yongbuzhixi.qiniudn.com/LePetitPrince/01.mp3">
				<dt><img src="images/cover.jpg" width=50></dt>
				<dd><h3>小王子2</h3></dd>
				<dd>下期预告</dd>
				<dd><span>法国经典名著</span></dd>
				</a>
			</dl>
			<dl>
				<a href="javascript:void(0)" current='<?php echo $day +3 ;?>' desc="下期预告-小王子(3/3)" src="http://yongbuzhixi.qiniudn.com/LePetitPrince/02.mp3"  class="last">
				<dt><img src="images/cover.jpg" width=50></dt>
				<dd><h3>小王子3</h3></dd>
				<dd>下期预告</dd>
				<dd><span>法国经典名著</span></dd>
				</a>
			</dl>
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