//单独播放器页面
$(function(){
	$(".openList").click(function(){
		$("#playerLrc").attr("scorllVal",$(document).scrollTop())//记录之前的滚动条位置
		$("#playerLrc").hide();
		$("#playerList").show();
        $("html,body").animate({scrollTop:$("#playerList .current").offset().top-90},600); 
		$(".topBack").addClass("topBackNew");
        })
	$("#closePlayerList").click(function(){
		$(".topBack").removeClass("topBackNew");
		$("#playerList").hide();
		$("#playerLrc").show();
		$("html,body").animate({scrollTop:$("#playerLrc").attr("scorllVal")},600); 
        })
	$(".topBackNew").live("click",function(){
		$(".topBack").removeClass("topBackNew");
		$("#playerList").hide();
		$("#playerLrc").show();
		$("html,body").animate({scrollTop:$("#playerLrc").attr("scorllVal")},600); 
        })	
	
});

//集成到页面的播放器
$(function(){
	$(".openLrc").click(function(){
		if($("#musicList").find(".current").length>0){
		$(".openLrc").attr("scorllVal",$(document).scrollTop());//记录之前的滚动条位置
		$("#songBox").hide();
		$("#viewLrc").show();
		$(".topTit").text($("#musicList li.current strong a").text());
		$(".topBack").addClass("topBackNew");
		}
		else{
		alertText("当前没有歌曲正在播放!")
		}	
      })
	
	$(".topBackNew").live("click",function(){
		$(".topBack").removeClass("topBackNew");
		$("#viewLrc").hide();
		$("#songBox").show();
		$("html,body").animate({scrollTop:$(".openLrc").attr("scorllVal")},600); 
		$(".topTit").text($(".topTit").attr("defaulttit"));
		return false;
        })
	$("#closeLrc").click(function(){
		$(".topBack").removeClass("topBackNew");
		$("#viewLrc").hide();
		$("#songBox").show();
		$("html,body").animate({scrollTop:$(".openLrc").attr("scorllVal")},600); 
		$(".topTit").text($(".topTit").attr("defaulttit"));
		return false;
        })	
		
	$("#musicList li").click(function(){
		$(this).addClass("current").siblings().removeClass("current");
		$("html,body").animate({scrollTop:$("#musicList .current").offset().top-100},400); 
		})	
	//循环模式切换	
	$("#xunShunxu").click(function(){
		$(this).hide();
		$("#xunDanqu").show();
		alertText("已切换到单曲播放")
	});	
	$("#xunDanqu").click(function(){
		$(this).hide();
		$("#xunSuiji").show();
		alertText("已切换到随机播放")
	});
	$("#xunSuiji").click(function(){
		$(this).hide();
		$("#xunShunxu").show();
		alertText("已切换到顺序播放")
	});
	
});