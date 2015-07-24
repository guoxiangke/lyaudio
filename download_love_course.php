<?php
// $xml = 'http://www.w4j.org/MessageCenter/News/W4JPODCastFeed.asp?txtOrgCode=HaoMuRen&Category=17';
// $xmlstring = file_get_contents($xml);
// $xml = simplexml_load_string($xmlstring);
// $json = json_encode($xml);
// $array = json_decode($json,TRUE);
$desc = '公众号：永不止息 莫非单身讲座';
	$radios = array(
		'1'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/01/16/17292106404791046_hd.mp3',
			'title' => '【1】独唱的日子',
			'desc'	=> $desc,			
			),
		'2'=>array(
			'type' => 'audio',
			'url'	=>'http://7xi2dk.com1.z0.glb.clouddn.com/1503/ting.mp3',
			'title' => '【2】那将要来的是你吗？',
			'desc'	=> $desc,			
			),
		'3'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/01/20/17379973919995910_hd.mp3',
			'title' => '【3】人约黄昏后',
			'desc'	=> $desc,			
			),
		'4'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/01/21/17415967087479046_hd.mp3',
			'title' => '【4】合唱的美',
			'desc'	=> $desc,			
			),
		'5'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/01/23/17463010670310918_hd.mp3',
			'title' => '【5】Smart Love',
			'desc'	=> $desc,			
			),
		'6'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/01/28/17567584533557766_hd.mp3',
			'title' => '【6】问世间情为何物',
			'desc'	=> $desc,			
			),
		'7'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/01/31/17636544797095558_hd.mp3',
			'title' => '【7】合唱的美',
			'desc'	=> $desc,			
			),
		'8'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/02/04/17732971913151750_hd.mp3',
			'title' => '【8】寻找金心',
			'desc'	=> $desc,			
			),
		'9'=>array(
			'type' => 'audio',
			'url'	=>'http://cdn.lizhi.fm/audio/2015/02/07/17799135079229702_hd.mp3',
			'title' => '【9】单身老实说',
			'desc'	=> $desc,			
			),

		);
// var_dump($radios);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title> 莫非单身讲座系列下载|公众号：永不止息</title>

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

      <div class="hidden-lg showwx">
        <h4 style="color:#FFF;background-color:black;margin-bottom:0px;">►点击右上角，【在浏览器中打开】↑↑</h4>
        <p class="bg"  style="color:#000;background-color:yellow;">小永提示：微信中不能下载！↑↑↑</p>
      </div>
      <style type="text/css">
        .showwx {
          display: none;
          text-align: right;
        }
      </style>
      <h3>永不止息，需要有你!</h3>
      <div class="hidden-xs">
        <br>
        <h2 style="text-align:center;">► <a style="color:#FFF;background-color:#da2d7b" href="download_play.php">点此在线播放</a></h2>
      </div>

      <p class="bg"><span style="color:#FFF;background-color:red">长按按钮</span>->【保存链接】即可下载节目！</p>
      <p id="bg-info">或者关注服务号 回复编号1-9也可离线播放。</p>
      <ul id="playlist">
        <?php
        $urls = $radios;
        // shuffle($urls);
        // var_dump($radios);
        $count = 0;
        foreach ($urls as $key => $value) {

        if(isset($value['title'])){
          // $id = str_replace('url.asp?id=', '', $url);
          $title = $value['title'];
          
          date_default_timezone_set('Asia/Chongqing');
          $mp3_link = $value['url'] ; 
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
      document.addEventListener("WeixinJSBridgeReady", function onBridgeReady() {
        (function ($) {$('.showwx').slideDown(); }(jQuery));
      });
      $('li a').click(function(e){
      	e.preventDefault();
      });
    </script>
  </body>
</html>