var _browseraddr=document.URL.toLowerCase();//来源网址

//弹出提示
function alertText(pNum){
	$("#notice").remove();
    $("body").append('<div id="notice">'+pNum+'</div>')
    $("#notice").fadeOut(2500,function(){$(this).remove();}); 
}
function playerAlert(pNum){
	$("#playerNotice").remove();
    $("body").append('<div id="playerNotice">'+pNum+'</div>')
	$("#playerNotice").css("bottom",$("#cproIframe1Wrap").height()+55);

}

//搜索
$(function(){
	$(".seacrh .soClose").click(function(){
		$(".soText").val("").focus();
	});
	$(".soBtn").click(function(){
		var txt=$(".soText").val();
		if(txt==""||txt=="请输入关键词"){
			alertText("请输入搜索关键词");
			return false;
		}else{
			$(".seacrhTui").hide();
			$(".seacrhBox").show();
		}
	});
});
//标记默认的标题名字
$(function(){
	$(".topTit").attr("defaulttit",$(".topTit").html());
	$(".topBack").attr("defaultback",$(".topBack").attr("href"));
});
//导航悬浮
$(function(){
	if($(".mainNav").length>0){
		var mainNavTop=$(".mainNav").offset().top
       $(window).scroll(function(){
			if($(window).scrollTop()>=mainNavTop){
				$(".mainNav").addClass("mainNavFix");
			}else{
				$(".mainNav").removeClass("mainNavFix");
			} 
       });
  } 
})
//返回顶部按钮
$(function() {
	$("body").append('<div id="backTop"></div>')
		$(window).scroll(function(){
			if ($(window).scrollTop()>100){
			$("#backTop").fadeIn(600);
			}else{
			$("#backTop").fadeOut(600).hide();
			}
		});
		$("#backTop").click(function(){
			$('body,html').animate({scrollTop:0},300);
			return false;
		});
});

$(function(){
	
	$(".tabNav_01").click(function(){
			$(".tabNav_01").addClass("current");
			$(".tabNav_02").removeClass("current");
			$("#jiu").show();
			$("#xin").hide();
	});
	$(".tabNav_02").click(function(){
			$(".tabNav_02").addClass("current");
			$(".tabNav_01").removeClass("current");
			$("#jiu").hide();
			$("#xin").show();
	});
	
	$(".topNavCur").click(function(){
		$(this).hide();
		$(".topNav").show();
		$(".disNav").hide();
	});
	
	$("#topNav_Fuyin").click(function(){
		$(this).hide();
		$(".topNavCur").show();
		m9ku ='1';
		$("body").append('<div class="disNav"><ul class="navList"><li><a href="http://ly.yongbuzhixi.com">良友知音</a></li><li><a href="http://mp.weixin.qq.com/s?__biz=MjM5ODQ4NjU4MA==&mid=400424482&idx=1&sn=a0bc76a3fc8b4cf525a26dab47486d9f#rd">关注微信</a></li><li><a href="http://www.yongbuzhixi.com/photos">永不止息</a></li></ul></div>');
	});
});

function setLangEn(lang){
	addCookie('lang','en',24);
	window.location.reload();
}

function setLangZh(lang){
	addCookie('lang','');
	window.location.reload();
}

function addCookie(objName,objValue,objHours){//添加cookie
	var str = objName + "=" + escape(objValue);
	if(objHours > 0){//为0时不设定过期时间，浏览器关闭时cookie自动消失
		var date = new Date();
		var ms = objHours*3600*1000;
		date.setTime(date.getTime() + ms);
		str += "; expires=" + date.toGMTString();
	}
	document.cookie = str;
}

$( document ).ready(function() {
  $(".fotter").html('<p>永不止息，需要有你！</p><p><a target="_blank" href="http://mp.weixin.qq.com/s?__biz=MjM5ODQ4NjU4MA==&mid=400424482&idx=1&sn=a0bc76a3fc8b4cf525a26dab47486d9f#rd">点解关注我们</a></p>');
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-36975988-3', 'auto');
  ga('send', 'pageview');
});