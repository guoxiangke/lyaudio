<?php
require_once('../config.php');
date_default_timezone_set('Asia/Shanghai');
require_once('lyfm.inc');
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
    <title>良友电台 <?php echo $index.$radio['title']; ?>|永不止息|良友广播|微信收听直播|良友知音|良友微信|公众号：永不止息主内婚恋网 在线播放</title>
     <meta name="description"  content="<?php echo $radio['desc'];?>关注公众号：永不止息 即可回复编码微信收听！">
     <META NAME="Keywords" CONTENT="良友电台 益友电台 同行频道 良友 益友 电台 福音 广播 短波 中波 节目 收音机 爱广播 基督教 基督徒 良友知音人 知音人 福音广播 慕道 栽培 训练 少数民族 31公尺 9430千赫 1566千赫 1188千赫 生活智慧 关怀辅导 婚恋家庭 慕道探索 生命成长 学习真道 栽培训练 诗歌音乐 中英双语 少数民族 圣经广播剧 微播出炉 绝妙当家 生活无国界 零点零距离 书香园地 今夜心未眠 i-Radio爱广播 i关怀心磁场 空中辅导 无限飞行号 恋爱季节 幸福满家园 亲情不断电 欢乐卡恰碰 现代人的希望 生命的福音 燃亮的一生 施恩座前 这一刻清心 佳美脚踪 生命的四季 拥抱每一天 旷野吗哪 空中崇拜 真理之光 生根建造 信仰百宝箱 真理与柱石 经动人心 真道分解 聆听主道 圣言盛宴 善牧良言 好牧人 与神同行 生活之光 良院精选 接棒人 晨曦讲座 良友圣经学院 基础课程 良友圣经学院 本科文凭课程 进深文凭课程 齐来颂扬 彩虹桥 长夜的牵引 蓝天绿洲 天路导向 粤语 傈僳佳音 傈僳族 恩典与真理 回民 回民广播 穆斯林 爱在人间 云南话 阳光下的喜鹊 白族 祝福康巴 康巴话 维吾尔佳音 维吾尔语 好消息 蒙古话 壮族 程枫 陈婧 陈心洁 丁小农 杜凯船 方华 樊星原 高典 韩美灵 黄燕君 黄以恩 纪天恩 康宁 蓝冰燕 蓝梦远 乐明怡 梁天路 廖光语 李敬天 林诚 淩树树 淩云 李书雅 刘芳 刘佳音 刘文 罗加怡 罗文辉 卢文 米雅 邱海棠 齐云 阮一心 上官娟子 沙韵 沈颖 施雨泽 孙大中 唐华 唐漫 田薇 童真 万峰 王大卫 文惠 武爽 小娟 谢姊妹 许爱琳 徐婷 徐文文 徐小凡 杨东川 杨加美 杨天成 杨羽 颜明 姚谦 叶芳 袁择善 张道明 张大卫 张得仁 章静 张清心 张小环 赵群 郑媛媛 周彩云 周广亮 周素琴 周子禾 庄惠年 李兰 讲道 讲道文章 讲义 诗歌 圣乐 歌谱 网上媒体宣教学院 团契 网上圣经 服侍 宣教 差传 尔道自建 应用程式 多媒体 教牧之道 夫妻营 广播训练  知音同行 每日灵修">
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
  <h1 class="visible-lg hidden-sm">良友电台 <?php echo $radio['title']; ?> </h1>
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
  <style>
    #select{
      width: 50%;
    }
    @media screen and (-webkit-min-device-pixel-ratio:0) {  /*safari and chrome*/
        select {
            height:30px;
            line-height:30px;
            background:#fff;
            color: #000;
        }
    }
    select::-moz-focus-inner { /*Remove button padding in FF*/
        border: 0;
        padding: 0;
    }
    @-moz-document url-prefix() { /* targets Firefox only */
        select {
            padding: 15px 0!important;
        }
    }
    @media screen\0 { /* IE Hacks: targets IE 8, 9 and 10 */
        select {
            height:30px;
            line-height:30px;
        }
    }
  </style>
  <div class="hidden-md visible-xs">
    选择节目：
    <select name="" id="select">
    <?php
      foreach ($radios as $key => $value) {
        ?>
          <option <?php if($key==$index) echo 'selected="selected"'; ?> value="<?php echo $value['index'];?>">【<?php echo $value['index'].'】'.$value['title'];?></option>
        <?php
      }
    ?>
    </select>
  </div>
  <ul class="visible-lg hidden-sm">
  <?php
    foreach ($radios as $key => $value) {
      ?>
        <li class="alert alert-danger" role="alert">
        <a href="http://ly.yongbuzhixi.com/fm/lyfm.php?fm=<?php echo $value['index'];?>">【<?php echo $value['index'].'】'.$value['title'];?></a></li>
      <?php
    }

  ?>
  </ul>
  <script src="js/jquery-ui-1.8.17.custom.min.js"></script>
  <script type="text/javascript">
    <?php
      $i = 0;
      $js_radios = array();
      $max = 1;
      // if($radio['day'] == '15') $max = 8;
      // if($radio['day'] == '67'||$radio['day'] == '135') $max = 13;
      // if($radio['day'] == '7' || $radio['day'] == '6') $max = 29;

        // if have bce link! use bce!
        // else use 700/nissgzz
        $ori_title = $radio['title'];//$liangyou_audio_list_info['title'];
        $code = $radio['code'];
        // $lywx = $radio['lywx'];
        // http://lywxaudio.b0.upaiyun.com/2016/zz/zz160205.mp3
        // $dir_stru = 'liangyou/nissigz/'.$title.'/'.date('Ym');

        $upyun_bucket_name = 'lywxaudio';
        $cdnlink = $upyun_bucket_name.'.b0.upaiyun.com';
        $offset=0;
        while ($offset <= 7) {
          $date = date('ymd',time()-$offset*86400);
          $path = '/'.date('Y').'/'.$code.'/'.$code.$date.'.mp3';
          $musicurl = 'http://'.$cdnlink.$path.upyun_get_token($path);
          $temp = @get_headers($musicurl);
          if($temp[0] == 'HTTP/1.1 200 OK'){//远程有!!!
            $radio_url = $musicurl;
            break;
          }
          $offset++;
        }

        $js_radio['title'] = '良友电台-'.$radio['title'].'-'.$date;
        $js_radio['artist'] = 'FM'.$index;
        $js_radio['album'] = '回复【'.$index.'】给永不止息微信收听';
        $js_radio['cover'] = 'img/ybzx320.jpg';
        $js_radio['mp3'] = $radio_url;
        $js_radio['ogg'] = '';
        $js_radios[]= $js_radio;
      $playlist = json_encode($js_radios);
    ?>
    var playlist = <?php echo $playlist;?>;
  </script>
  <script src="js/script.js"></script>
  <script>
    (function($){
        $('#select').on('change', function() {
          window.location.href = "http://ly.yongbuzhixi.com/fm/lyfm.php?fm="+this.value;
        });
    })(jQuery);
  </script>
  <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
  </div>
  <?php include('../focus.php');?>
</div>
</body>
</html>
