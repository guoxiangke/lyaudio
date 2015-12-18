<?php
function liangyou_audio_list_bytitle(){
	$audios = liangyou_audio_list();
	foreach ($audios as $code => $audio) {
		$audios[$audio['title']] = $audios[$code];
		unset($audios[$code]); 
	}
	return $audios;
}

function liangyou_audio_list(){
  $prefix['32'] = 'http://liangyou2.nissigz.com/';
  $prefix['33'] = 'http://liangyou3.nissigz.com/';
    return  array(
    'ib'=>array(
      'title' =>'无限飞行号',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcjm-3b2p38',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>601,
      'desc'=>'在这里，有与你遭遇相连的他和她；在这里，有渴望关心残疾人的你和我；在这里，有神与我们同飞行。突破身体心灵缺陷，发掘生命蕴藏的更美本质，一起登上属于你和我的《无限飞行号》',
      ),
    'im'=>array(
      'title' =>'心磁场',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njchy-3b2ozw',
      'prefix'=>$prefix['32'],
      'day'=>'74',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>602,//74 周五周六无,
      'desc'=>'人是身心灵的集合体，由外而内，我们看到光鲜亮丽背后的破碎；由内向外，我们看到伤心流泪后的希望'
      ),
    'cc'=>array(
      'title' =>'空中辅导',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njci2-3b2p04',
      'prefix'=>$prefix['33'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>603,
      'desc'=>'聆听听众各类苦闷心声，以圣经和祷告回应。在对话过程中，表达体会和盼望，指引成长的方向',
      ),
    'se'=>array(
      'title' =>'恋爱季节',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njci0-3b2p00',
      'prefix'=>$prefix['32'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>604,
      'desc'=>'有人说：“最完美的爱情在小说里，最完美的婚姻在梦境里！”难道希望拥有完美的恋爱、婚姻，只是一个梦想吗？
  请立刻收听《恋爱季节》，梦想就要成真！
  欢迎孤男寡女、一男一女、已婚男女、不分男女，一起沉浸在《恋爱季节》',
      ),
    'bf'=>array(
      'title' =>'幸福满家园',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njci6-3b2p0c',
      'prefix'=>$prefix['33'],
      'day'=>'67',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>605,
      'desc'=>'幸福人生是我们的希望，美满家庭是我们的追求；在家园里学习爱和关怀，在家园里学习耕耘和灌溉；让爱的种子生长、开花、结果，让我们的家庭成为合神心意的基督化家庭！',
      ),
    'up'=>array(
      'title' =>'亲情不断电',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcil-3b2p16',
      'prefix'=>$prefix['32'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>606,
      'desc'=>'有一种情，从你出生就已经存在；有一种情，就算是死亡也无法割舍；它，塑造我们鲜明的个性；它，教会我们珍惜彼此；它就是亲情，是我们一生的牵挂',
      ),
    'hg'=>array(
      'title' =>'欢乐卡恰碰',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njci4-3b2p08',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>607,
      'desc'=>'小小的扭蛋，大大的欢笑，轻轻转扭的“卡恰”声，“碰”出许多神秘与惊喜！在这个专属儿童的乐园里，你可以和许多小朋友一起欢笑，一起学习！快来加入我们，让我们陪你成长，与你同乐',
      'feearadio'=>'1',
      ),
    'yu'=>array(
      'title' =>'绝妙当家',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njchx-3b2ozu',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>608,
      'desc'=>'没有理由，不需要理由，你就是主角。绝对唯一，绝对独特，你是无可取代',
      'feearadio'=>'1',//http://media.feearadio.net/program/YU/yu-151214.mp3
      ),
    'fc'=>array(
      'title' =>'微播出炉',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcm0-3b2p80',
      'prefix'=>$prefix['32'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>609,
      'desc'=>'把社会话题与福音联系起来，在媒体中发出另一种声音，让听众了解圣经如何处理这些热门话题。',
      ),
    'gv'=>array(
      'title' =>'生活无国界',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njci3-3b2p06',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>610,
      'desc'=>'幽默风趣、欢声笑语，一个快乐你生活的节目，听了做梦都会笑
  天南地北、古今中外，一扇开阔你视野的窗口，精彩世界看得见
  紧密互动、开放参与，一个实现你梦想的平台，下一位DJ就是我
  贴心关怀、专业辅导，一位陪伴你成长的夥伴，与你同行在爱中',
      ),
    'zz'=>array(
      'title' =>'零点零距离',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njciw-3b2p1s',
      'prefix'=>$prefix['32'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>611,
      'desc'=>'透过心灵隽语、诗歌、见证、心身灵健康讨论、时事评论、周末剧场等，让你修复人际关系，提升灵命，在工作场上，无往不利',
      ),
    'bc'=>array(
      'title' =>'书香园地',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njci1-3b2p02',
      'prefix'=>$prefix['32'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>612,
      'desc'=>'打开心灵的窗户，让书香的味道飘洒进来；走进缤纷的园地，让生命的色彩丰富起来。邀请爱书人进入《书香园地》，细细品味书中的芬芳，与刘文和作者一起寻找心灵的交汇点',
      'feearadio'=>'1',
      ),
    'ir'=>array(
      'title' =>'爱广播',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njchu-3b2ozo',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>613,
      'desc'=>'为你带出电台最新消息，最动听节目推介，也替电台寻找听电台、爱电台的知音人，分享生命的故事。台长也会定期出现，分享电台最新的政策，也与听众分享他的个人心声，勉励事奉',
      ),
    'rt'=>array(
      'title' =>'今夜心未眠',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcia-3b2p0k',
      'prefix'=>$prefix['32'],
      'day'=>'67',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>614,
      'desc'=>'冲一壶好茶，选一本好书，细细品读，慢慢分享，一场心与心的对话',
      ),
    'tr'=>array(
      'title' =>'彩虹桥',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njchv-3b2ozq',
      'prefix'=>$prefix['33'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>615,
      'desc'=>'诗歌音乐:《彩虹桥》用诗歌搭起人与神之间的桥梁，带来弟兄姊妹与主更亲近，爱主更深，对主的信心也越发坚强',
      ),
    'ws'=>array(
      'title' =>'长夜的牵引',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njci9-3b2p0i',
      'prefix'=>$prefix['33'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>616,
      'desc'=>'诗歌音乐:有一束光，用跳跃的音符，带领着你和我穿过长夜。那是牵引，那是爱，进入自由的天地，显明真理。长夜的牵引，和你一起离开黑暗，迎向那光！',
      ),
    'gn'=>array(
      'title' =>'现代人的希望',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcif-3b2p0u',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>617,
      'desc'=>'疲累、焦虑、寂寞、压力，构筑出现代人的共同困境。唯有来自永恒的声音，才能抚慰虚空的心灵。圣经是迷途者的指南，耶稣是现代人的希望。一个给你带来永恒盼望的节目',
      'feearadio'=>1
      ),
    'ns'=>array(
      'title' =>'生命的四季',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njciu-3b2p1o',
      'prefix'=>$prefix['33'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>618,
      'desc'=>'生命的四季',
      ),
    'ee'=>array(
      'title' =>'拥抱每一天',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njchw-3b2ozs',
      'prefix'=>$prefix['33'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>619,
      'desc'=>'生命能够成长，因为我们愿意放下昨天；生命是那么的美好，因为我们拥有今天；生命充满希望，因为我们可以计划明天',
      ),
    'mw'=>array(
      'title' =>'旷野吗哪',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcly-3b2p7w',
      'prefix'=>$prefix['33'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>620,
      'desc'=>'与你分享灵修材料，以亲切并深入关怀生活层面的讲解，为你传达明确清晰的圣经信息，帮助你应用于信仰生活上，好叫信徒珍爱灵修，灵命长进！',
      'feearadio'=>1
      ),
    'be'=>array(
      'title' =>'真道分解',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcik-3b2p14',
      'prefix'=>$prefix['33'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>621,
      'desc'=>'透过经卷研读，陪伴你建立真理基础，栽培你灵命成长，帮助你活出信仰',
      ),
    'bs'=>array(
      'title' =>'圣言盛宴',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njci8-3b2p0g',
      'prefix'=>$prefix['33'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>622,
      'desc'=>'透过小组查经的方式与呈现，带领听众明白神的圣言，领受属灵的丰盛筵席',
      'feearadio'=>1,
      ),
    'cw'=>array(
      'title' =>'齐来颂扬',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njchz-3b2ozy',
      'prefix'=>$prefix['33'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>623,
      'desc'=>'诗歌音乐:精选古今中外赞美圣诗，带领信徒齐来敬拜，同心颂扬万王之王，万主之主！',
      'feearadio'=>1,
      ),
    'tg'=>array(
      'title' =>'施恩座前',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njclc-3b2p6o',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>624,
      'desc'=>'一起祷告、学习、分享、互动，培养属灵操练的习惯，建立同心同行的关系',
      ),
    'th'=>array(
      'title' =>'真理之光',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcjh-3b2p2y',
      'prefix'=>$prefix['33'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>625,
      'desc'=>'带领弟兄姊妹更深入认识圣经真理，让神的话语成为我们生命中随时的提醒、帮助、鼓励、安慰和引导，让我们喜乐的事奉神，荣耀神，为神做美好的见证！',
      ),
    'pb'=>array(
      'title' =>'接棒人',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcj9-3b2p2i',
      'prefix'=>$prefix['32'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>626,
      'desc'=>'为教会领袖和事奉人员提供神学和教义训练，着重知识与灵命培育，并装备学员参与事奉与牧养，成为新一代的接棒人',
      ),
    'hw'=>array(
      'title' =>'聆听主道',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njciy-3b2p1w',
      'prefix'=>$prefix['33'],
      'day'=>'67',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>627,
      'desc'=>'神所重用的仆人，为当代信徒讲解圣经真道，让我们一同安静下来，靠近主脚前，用心聆听主道',
      ),
    'aw'=>array(
      'title' =>'空中崇拜',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcir-3b2p1i',
      'prefix'=>$prefix['33'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>628,
      'desc'=>'空中崇拜',
      'feearadio'=>1,
      ),
    'yp'=>array(
      'title' =>'善牧良言',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njciz-3b2p1y',
      'prefix'=>$prefix['33'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>629,
      'desc'=>'透过神所重用的牧者，结合他们多年的牧养、带领，以及丰富的人生历练，融入释经讲道的分享来建造听众，使我们因神的道而成长',
      ),
    'gsa'=>array(
      'title' =>'好牧人',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcix-3b2p1u',
      'prefix'=>$prefix['33'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>630,
      'desc'=>'本节目邀请神的仆人分享，供应神的话语，满足你的灵命需求，使得生命更丰盛',
      ),
    'ba'=>array(
      'title' =>'经动人心',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcis-3b2p1k',
      'prefix'=>$prefix['33'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>631,
      'desc'=>'基于圣经，加上创意，化作动人心弦的圣经广播剧。一起走进圣经人物的生命，体会他们的喜怒哀乐，认识救主耶稣基督，激励我们在生活中实践信仰',
      ),
    'bm'=>array(
      'title' =>'佳美脚踪',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcl2-3b2p64',
      'prefix'=>$prefix['33'],
      'day'=>'6',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>632,
      'desc'=>'佳美脚踪',
      ),
    'hd'=>array(
      'title' =>'蓝天绿洲',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcit-3b2p1m',
      'prefix'=>$prefix['33'],
      'day'=>'67',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>633,
      'desc'=>'中英双语:想谋生？想人生？想生活？想生命？都可以一起来想。爱英语？爱思考？爱音乐？爱真理？也不妨共同去爱！',
      ),
    'sr'=>array(
      'title' =>'给力人生',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcj7-3b2p2e',
      'prefix'=>$prefix['33'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>634,
      'desc'=>'本节目为初信栽培而设，透过不同的课题，包括生命读经，家庭规划，自我探索，让信仰落实到生活的每个层面，为我们的人生给力',
      ),
    'dp'=>array(
      'title' =>'空中门训',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcja-3b2p2k',
      'prefix'=>$prefix['33'],
      'day'=>'15',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>635,
      'desc'=>'空中门训',
      ),
    'bb'=>array(
      'title' =>'生根建造',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcj5-3b2p2a',
      'prefix'=>$prefix['33'],
      'day'=>'135',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>636,
      'desc'=>'生根建造',
      ),
    'tu'=>array(
      'title' =>'信仰百宝箱',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcj8-3b2p2g',
      'prefix'=>$prefix['33'],
      'day'=>'135',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>637,
      'desc'=>'借查考圣经和分享信徒生活专题，让信徒对信仰及生活有更明确的方向，面对生活的种种挑战时，能以圣经真理作行事为人的基础',
      ),
    'iv'=>array(
      'title' =>'生活之光',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcjc-3b2p2o',
      'prefix'=>$prefix['33'],
      'day'=>'67',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>638,
      'desc'=>'本节目是史温道牧师（Charles Swindoll）30多年来之讲道选集。节目包含三个讲道系列：在恩典中觉醒、奏出原本婚姻的乐章和旧约圣经人物的奇妙故事。讲道以圣经真理为基础，并融汇历代基督徒作家、神学家和知名牧者的观点论据，配合生活化的例子和个人经历，深入浅出，历久弥新，对信徒与非信徒的生命必能有所造就。',
      ),
    'gl'=>array(
      'title' =>'生命的福音',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcjb-3b2p2m',
      'prefix'=>$prefix['33'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>639,
      'desc'=>'生命的福音',
      ),
    'mp'=>array(
      'title' =>'清心',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcld-3b2p6q',
      'prefix'=>$prefix['32'],
      'day'=>'67',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>640,
      'desc'=>'这一刻，清心',
      ),
    'jckc'=>array(
      'title' =>'良院基础',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njck8-3b2p4g',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>640,
      'desc'=>'良院（基础课程）为装备教会义工而设，适合初信者和预备报读本科文凭课程的信徒收听',
      ),
    'a0'=>array(
      'title' =>'良院本科一',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njck9-3b2p4i',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>642,
      'desc'=>'良院（本科一套）为装备服侍教会的领袖而设，适合传道人修读',
      ),
    'b0'=>array(
      'title' =>'良院本科二',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcka-3b2p4k',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>643,
      'desc'=>'良院（本科二套）为装备服侍教会的领袖而设，适合传道人修读',
      ),
    'c0'=>array(
      'title' =>'良院进深一',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njckb-3b2p4m',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>644,
      'desc'=>'良院（进深一套）适合本科毕业生或传道人修读',
      ),
    'f0'=>array(
      'title' =>'良院进深二',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njckc-3b2p4o',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>645,
      'desc'=>'良院（进深二套）适合本科毕业生或传道人修读',
      ),
    'ds'=>array(
      'title' =>'晨曦讲座',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcji-3b2p30',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>646,
      'desc'=>'拓展视野，关心教会发展，按照真理共建神家，放眼世界禾场，努力实践晨曦异象',
      ),
    'vx'=>array(
      'title' =>'良院精选',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njclb-3b2p6m',
      'prefix'=>$prefix['32'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>647,
      'desc'=>'良院精选',
      ),
    'wa'=>array(
      'title' =>'天路导向',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcj3-3b2p26',
      'prefix'=>$prefix['32'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>648,
      'desc'=>'中英双语:以主题信息讲座的方式，配以诗歌、祷告、内容简介和扼要总结，让信息传达更清晰，使记忆更深刻。逐句英译中讲道方式，灵性造就的同时，英文水平也得到操练与提高',
      ),
    'cwa'=>array(
      'title' =>'天路导向2',
      'bce' => 0,
      'txly'=>'http://www.txly1.net/program/1njcj2-3b2p24',
      'prefix'=>$prefix['32'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>649,
      'desc'=>'中英双语:天路导向（粤语）以主题信息讲座的方式，配以诗歌、祷告、内容简介和扼要总结，让信息传达更清晰，使记忆更深刻。逐句英译中讲道方式，灵性造就的同时，英文水平也得到操练与提高',
      ),
    'gt'=>array(
      'title' =>'恩典与真理',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcj0-3b2p20',
      'prefix'=>$prefix['32'],
      'day'=>'7',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>650,
      'desc'=>'少数民族:恩典与真理（回民）《恩典与真理》，引导你走上正义之路。愿你得着真主给你的色俩麦提和瑞孜给，因沙安拉。',
      ),
    'ynf'=>array(
      'title' =>'爱在人间',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njcj1-3b2p22',
      'prefix'=>$prefix['32'],
      'day'=>'17',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>651,
      'desc'=>'少数民族:爱在人间（云南话）谈天说地、细数民俗、倾听民歌、谈论信仰 ... 汇集成为彩云之南的特色节目，把主耶稣的爱向各族人民传讲',
      ),
    'ls'=>array(
      'title' =>'燃亮的一生',
      'bce' => 1,
      'txly'=>'http://www.txly1.net/program/1njclz-3b2p7y',
      'prefix'=>$prefix['32'],
      'day'=>'67',//17=>1-7 15=>1-5 67=>weekend 7=>7 6=>6 135=>135
      'index'=>652,
      'desc'=>'与你分享宣教士的生平和服侍，让我们一同体会信仰的生命力，盼望你与我们一起多关心宣教，一同活出燃亮的生命！',
      ),
  );

}