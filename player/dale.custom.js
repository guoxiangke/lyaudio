function like(){
	$("#heartbtn").toggleClass('loved');
	var current = $('#song_player').attr('current');
	$('#fmlistdiv a[current='+current+']').toggleClass('liked');
}
function prev_song()
{
	var current = parseInt($('#song_player').attr('current'));
	var next = current - 1;

	if(!$('[current='+ next +']').length){return;}
	elem = $('[current='+ next +']')
	var src = elem.attr('src');
	$('#song_player').attr('src',src).attr('current',next);
	if(elem.hasClass('liked')){		
		$('#heartbtn').addClass('loved');
	}else{	
		$('#heartbtn').removeClass('loved');		
	}
	$('#desc').text(elem.attr('desc'));
	$('.nextbtn').addClass('enable-button').removeClass('disable-button');
	next = parseInt($('#fmlistdiv [current='+ next +']').attr('current'));
	if(next==0){
		$('.prevbtn').addClass('disable-button').removeClass('enable-button');
	}
}
function next_song()
{
	var current = parseInt($('#song_player').attr('current'));
	var next = current + 1;
	if(!$('[current='+ next +']').length){return;}
	elem = $('[current='+ next +']')
	var src = elem.attr('src');
	$('#song_player').attr('src',src).attr('current',next);
	if(elem.hasClass('liked')){		
		$('#heartbtn').addClass('loved');
	}else{	
		$('#heartbtn').removeClass('loved');		
	}
	$('#desc').text(elem.attr('desc'));
	$('.prevbtn').addClass('enable-button').removeClass('disable-button');
	if($('#fmlistdiv [current='+ next +']').hasClass('last')){
		$('.nextbtn').addClass('disable-button').removeClass('enable-button');
	}
}

function show_all()
{
	$('#fmlistdiv dl').show();
	$('#like_list').addClass('no_select');
	$('#all_list').removeClass('no_select');
}

function show_like()
{
	$('#fmlistdiv dl').each(function(){
		if(!$(this).find('a').hasClass('liked')){
			$(this).hide();
		}
	});
	$('#like_list').removeClass('no_select');
	$('#all_list').addClass('no_select');
}

function close_list(){
	move('#fmlistbox').sub('left', dwidth).end();
}

$('#fmlistdiv a').click(function(){
	var url = $(this).attr('src');
	$('#song_player').attr('src',url).attr('current',$(this).attr('current'));
	if($(this).hasClass('liked')){		
		$('#heartbtn').addClass('loved');
	}else{	
		$('#heartbtn').removeClass('loved');		
	}

	$('#desc').text($(this).attr('desc'));

	$('.prevbtn').addClass('enable-button').removeClass('disable-button');
	if($(this).hasClass('last')){
		$('.nextbtn').addClass('disable-button').removeClass('enable-button');
		
	}else{
		current = parseInt($(this).attr('current'));
		if(current==0){
			$('.prevbtn').addClass('disable-button').removeClass('enable-button');
			$('.nextbtn').addClass('enable-button').removeClass('disable-button');
		}
	}
	close_list();
});