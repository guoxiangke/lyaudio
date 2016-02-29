<?php
// $xml = 'http://www.w4j.org/MessageCenter/News/W4JPODCastFeed.asp?txtOrgCode=HaoMuRen&Category=17';
// $xmlstring = file_get_contents($xml);
// $xml = simplexml_load_string($xmlstring);
// $json = json_encode($xml);
// $array = json_decode($json,TRUE);
	$radios = array(
		'ir'=>array(
			'title'	=>	'i-Radio愛廣播',
			'desc'	=>	'唐华、康宁、徐婷、万峰。 资讯导航节目，良友电台最新消息。'),
		'yu'=>array(
			'title'	=>	'絕妙當家',
			'desc'	=>	'孙大中、杨加美、高典主持。 没有理由，不需要理由，你就是主角。绝对唯一，绝对独特，你是无可取代。'),
		'gv'=>array(
			'title'	=>	'生活無國界',
			'desc'	=>	'颜明、叶芳、黄青、樊星原、施雨泽主持。 天南地北、古今中外，一扇开阔你视野的窗口──精彩世界看得见。 '),
		'zz'=>array(
			'title'	=>	'零點零距離',
			'desc'	=>	'乐明怡、陈心洁、杜凯船、韩美灵、周子禾、许爱琳主持。 让你吃好、玩好、与神和好、与人和好！'),
		'se'=>array(
		  'title'	=>	'戀愛季節（周1-5）',
			'desc'	=>	 '张大卫、徐凡、黄以恩、 徐文文、李书雅、廖光语主持。 欢迎孤男寡女、一男一女、已婚男女、不分男女，一起沉浸在《恋爱季节》！ '),
		'up'=>array(
			'title'	=>	'親情不斷電（周1-5）',
			'desc'	=>	'上官娟子、蓝梦远、李敬天、凌树树主持。 有一种情，与你一起出死入生，既塑造你的个性，又激发你的人生；既要你学会舍，又要你珍惜得。这就是── 我们的亲情。 '),
		'bc'=>array(
			'title'	=>	'書香園地（周1-5）',
			'desc'	=>	'刘文主持。 打开心灵的窗户，让书香的味道飘洒进来；走进繽纷的园地，让生命的色彩丰富起来。 '),
		'gn'=>array(
			'title'	=>	'現代人的希望',
			'desc'	=>	'米雅、庄惠年、张得仁主持。 唯有来自永恒的声音，才能抚慰虚空的心灵。圣经是迷途者的指南，耶穌是现代人的希望。'),
		'hg'=>array(
			'title'	=>	'歡樂卡恰碰',
			'desc'	=>	'李佩吉、高典、袁择善主持。 和我们一起，唱歌、听故事、培养好品格 GO GO GO ！！！'),
		'im'=>array(
			'title'	=>	'i 關懷心磁場',
			'desc'	=>	'携手，关爱同行！'),
		'ib'=>array(
			'title'	=>	'無限飛行號',
			'desc'	=>	'罗文辉、丁小农主持。 《无限飞行号》，与你同飞行！ '),
		'tg'=>array(
			'title'	=>	'施恩座前',
			'desc'	=>	'周彩云、周广亮主持。 通过介绍有关祷告的圣经真理、分享信徒祷告的见证、实际祷告操练与代祷。'),

		'bv'=>array(
			'title'	=>	'靈命日糧',
			'desc'	=>	'孙大中主持。 每天一篇喻道故事，每天一段经文，餵养你的属灵生命。带领你与主更亲近'),

		'be'=>array(
			'title'	=>	'真道分解',
			'desc'	=>	'圣经66卷书的讲解和教导，与你一起查经、读经、研经,让神的话语扎根，更新和转化我们的生命'),
	'cc'=>array(
			'title'	=>	'空中輔導',
			'desc'	=>	'周素琴、丁小农、杨天成主持。 细心聆听你的苦闷心声， 真诚关怀你的内心感受，借着圣经和祷告给你回应，为你指引成长的途径。'),
		'ee'=>array(
			'title'	=>	'擁抱每一天',
			'desc'	=>	'凌云主持。 生命能够成长，因为我们愿意放下昨天；生命那么美好，因为我们依然拥有今天；生命充满希望，因为我们可以计划明天！'),
		'tr'=>array(
			'title'	=>	'彩虹橋',
			'desc'	=>	'田薇、杨羽、梁艺主持。 这是学习唱诗赞美的时刻，这是学习灵修分享的时刻，是你我和神见面的时刻。'),
		'cw'=>array(
			'title'	=>	'齊來頌揚',
			'desc'	=>	'方华主持。 严选古今中外讚美圣诗，带领信徒齐来敬拜，同心颂扬万王之王，万主之主！'),
		'ws'=>array(
			'title'	=>	'長夜的牽引',
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
			'title'	=>	'晨曦講座',
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
    <title>精选良友节目下载|公众号：永不止息 微信收听-良友直播-良友知音-良友电台-空中辅导-灵命日粮-旷野吗哪-在线播放-良友微信|公众号：永不止息</title>
     <meta name="description"  content="良友电台为基督教福音电台，一直致力向中国内地广播福音信息，并教导圣经真理、训练基督工人，是同胞的良朋益友。 良友电台的口号是“知音‧牵手‧同行”，我们盼望与听众互为知音，彼此牵手，在人生、信仰路上并肩同行。">
     <META NAME="Keywords" CONTENT="良友电台 益友电台 同行频道 良友 益友 电台 福音 广播 短波 中波 节目 收音机 爱广播 基督教 基督徒 良友知音人 知音人 福音广播 慕道 栽培 训练 少数民族 31公尺 9430千赫 1566千赫 1188千赫 生活智慧 关怀辅导 婚恋家庭 慕道探索 生命成长 学习真道 栽培训练 诗歌音乐 中英双语 少数民族 圣经广播剧 微播出炉 绝妙当家 生活无国界 零点零距离 书香园地 今夜心未眠 i-Radio爱广播 i关怀心磁场 空中辅导 无限飞行号 恋爱季节 幸福满家园 亲情不断电 欢乐卡恰碰 现代人的希望 生命的福音 燃亮的一生 施恩座前 这一刻清心 佳美脚踪 生命的四季 拥抱每一天 旷野吗哪 空中崇拜 真理之光 生根建造 信仰百宝箱 真理与柱石 经动人心 真道分解 聆听主道 圣言盛宴 善牧良言 好牧人 与神同行 生活之光 良院精选 接棒人 晨曦讲座 良友圣经学院 基础课程 良友圣经学院 本科文凭课程 进深文凭课程 齐来颂扬 彩虹桥 长夜的牵引 蓝天绿洲 天路导向 粤语 傈僳佳音 傈僳族 恩典与真理 回民 回民广播 穆斯林 爱在人间 云南话 阳光下的喜鹊 白族 祝福康巴 康巴话 维吾尔佳音 维吾尔语 好消息 蒙古话 壮族 程枫 陈婧 陈心洁 丁小农 杜凯船 方华 樊星原 高典 韩美灵 黄燕君 黄以恩 纪天恩 康宁 蓝冰燕 蓝梦远 乐明怡 梁天路 廖光语 李敬天 林诚 淩树树 淩云 李书雅 刘芳 刘佳音 刘文 罗加怡 罗文辉 卢文 迈克 米雅 Charles Morris 邱海棠 齐云 阮一心 上官娟子 沙韵 沈颖 施雨泽 孙大中 唐华 唐漫 田薇 童真 万峰 王大卫 文惠 武爽 小娟 小四 谢姊妹 许爱琳 徐婷 徐文文 徐小凡 杨东川 杨加美 杨天成 杨羽 颜明 姚谦 叶芳 袁择善 张道明 张大卫 张得仁 章静 张清心 张小环 赵群 郑媛媛 周彩云 周广亮 周素琴 周子禾 庄惠年 李兰 讲道 讲道文章 讲义 诗歌 圣乐 歌谱 网上媒体宣教学院 团契 网上圣经 网上书房 电子刊物 参与 服侍 宣教 差传 尔道自建 mp3 播放器 手机 应用程式 多媒体 教牧之道 夫妻营 广播训练  同行 每日灵修">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

      <div class="hidden-lg" id="showwx">
        <h4 style="color:#FFF;background-color:black">►点击右上角，【在浏览器中打开】↑↑</h4>
      </div>
      <style type="text/css">
        #showwx {
          display: none;
        }
      </style>
      <h3>永不止息，需要有你!</h3>
      <p class="bg">小永提示：微信中不能下载！</p>
      <p class="bg"><span style="color:#FFF;background-color:red">长按按钮</span>->【保存链接】即可下载节目！</p>
      <p id="bg-info"></p>
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
          $mp3_link =  str_replace('150205', date('ymd'), 'http://media.febcchinese.org/Streaming/'.$key.'/'.$key.'150205.mp3');
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
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      document.addEventListener("WeixinJSBridgeReady", function onBridgeReady() {
        (function ($) {$('#showwx').slideDown(); }(jQuery));
      });
    </script>
  </body>
</html>
