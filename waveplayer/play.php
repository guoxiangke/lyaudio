<meta charset="UTF-8">
<!DOCTYPE html>
<html lang="en">
<header>
<link rel="stylesheet" href="./fmplayer.css">
<script src="../js/jquery.min.js"></script>
<script src="jquery-ui-v1.9.2.min.js"></script>
<!-- <script src="wavesurfer.min.js"></script> -->
<?php //?url=http%3A%2F%2Flywxaudio.b0.upaiyun.com%2F2016%2Fcw%2Fcw160826.mp3&_upt=70a7d0231472290065
// ?url=http://wxresources.yongbuzhixi.com/500/507/04.mp3?_upt=241fe1bb1483169356
?>
</header>
<body>
  <div class="ybzx-audio-wrapper">
        <div id="ybzx-wave-player" class="audio state-stop" role="application" aria-label="media player">
            <div class="play-control control">
                <button class="play button" role="button" aria-label="play" tabindex="0"></button>
            </div>
            <div class="bar">
                <div class="seek-bar seek-bar-display loaded" style="width: 0%;"></div>
                <div class="seek-bar pprogress" style="width: 100%;">
                    <div class="play-bar" style="width: 0%; overflow: hidden;">
                    </div>
                    <div class="details">
                        <span class="title" aria-label="title">永不止息 - 需要有你</span>
                    </div>
                    <div id="waveform" class="slider"></div>
                    <div class="timing">
                        <span class="duration" role="timer" aria-label="duration">0:00</span>
                    </div>
                </div>
            </div>
            <div class="no-solution" style="display: none;">出错啦<br>请使用谷歌浏览器</div>
            <div id="player" style="display: none;">
            </div>
        </div>
        <div id="playlist"  style="display: none;"></div>
    </div>
    <script>
        var playlist = [
                {
                    title: '永不止息',
                    artist: '',
                    album: '',
                    cover:'',
                    mp3: "<?php echo $_GET['url'];?>",
                    ogg: ''
                }
            ];
        var autoplay = true;
        var continous = true;//loop
        //wave begin know issues:
        //mp3 loaded twice....
    </script>
    <script>

        // Settings
        var repeat = localStorage.repeat || 0,
            shuffle = localStorage.shuffle || 'false',
            continous = localStorage.continous || 'false',
            autoplay = localStorage.autoplay || window.autoplay || 'false',
            playlist = window.playlist,
            debug = true;


        // Load playlist
        for (var i=0; i<playlist.length; i++){
            var item = playlist[i];
            $('#playlist').append('<li>'+item.artist+' - '+item.title+'</li>');
        }

        var time = new Date(),
            currentTrack = shuffle === 'true' ? time.getTime() % playlist.length : 0,
            trigger = false,
            audio, timeout, isPlaying, playCounts;

        var play = function(){
            audio.play();
            if(debug)console.log('play');
            $('.playback').addClass('playing');
            timeout = setInterval(updateProgress, 500);
            isPlaying = true;
            $('.audio').removeClass('state-stop');
            $('.audio').addClass('state-playing');

        }

        var pause = function(){
            audio.pause();
            if(debug)console.log('pause');
            $('.playback').removeClass('playing');
            clearInterval(updateProgress);
            isPlaying = false;
            $('.audio').addClass('state-stop');
            $('.audio').removeClass('state-playing');
        }

        // Update progress
        var setProgress = function(value){
            var currentSec = parseInt(value%60) < 10 ? '0' + parseInt(value%60) : parseInt(value%60),
                ratio = value / audio.duration * 100;

            $('.timing .duration').html(parseInt(value/60)+':'+currentSec);
            $('.play-bar').css('width', ratio + '%');
            $('#waveform wave wave').css('width', ratio + '%');
            $('.pprogress .slider a').css('left', ratio + '%');
        }

        var updateProgress = function(){
            setProgress(audio.currentTime);
        }

        // Progress slider
        $('.pprogress .slider').slider({step: 0.1, slide: function(event, ui){
            $(this).addClass('enable');
            setProgress(audio.duration * ui.value / 100);
            clearInterval(timeout);
            play();
        }, stop: function(event, ui){
            audio.currentTime = audio.duration * ui.value / 100;
            $(this).removeClass('enable');
            timeout = setInterval(updateProgress, 500);
        }});

        // Volume slider
        var setVolume = function(value){
            audio.volume = localStorage.volume = value;
            $('.volume .pace').css('width', value * 100 + '%');
            $('.volume .slider a').css('left', value * 100 + '%');
        }

        var volume = localStorage.volume || 0.5;

        $('.volume .slider').slider({max: 1, min: 0, step: 0.01, value: volume, slide: function(event, ui){
            setVolume(ui.value);
            $(this).addClass('enable');
            $('.mute').removeClass('enable');
        }, stop: function(){
            $(this).removeClass('enable');
        }}).children('.pace').css('width', volume * 100 + '%');

        $('.mute').click(function(){
            if ($(this).hasClass('enable')){
                setVolume($(this).data('volume'));
                $(this).removeClass('enable');
            } else {
                $(this).data('volume', audio.volume).addClass('enable');
                setVolume(0);
            }
        });

        // Switch track
        var switchTrack = function(i){
            if (i < 0){
                track = currentTrack = playlist.length - 1;
            } else if (i >= playlist.length){
                track = currentTrack = 0;
            } else {
                track = i;
            }

            $('audio').remove();
            loadMusic(track);
            if (isPlaying == true) play();
        }


        // Fire when track ended
        var ended = function(){
            pause();
            audio.currentTime = 0;
            playCounts++;
            if (continous == true) isPlaying = true;
            if (repeat == 1){
                play();
            } else {
                if (shuffle === 'true'){
                    shufflePlay();
                } else {
                    if (repeat == 2){
                        switchTrack(++currentTrack);
                    } else {
                        if (currentTrack < playlist.length) switchTrack(++currentTrack);
                    }
                }
            }
        }




        var beforeLoad = function(){
            // var endVal = this.seekable && this.seekable.length ? this.seekable.end(0) : 0;
            // $('.loaded').css('width', (100 / (this.duration || 1) * endVal) +'%');
              var buffered = audio.buffered;
          var loaded;
          // var played;

          if (buffered.length) {
            loaded = 100 * buffered.end(0) / audio.duration;
            // played = 100 * audio2.currentTime / audio2.duration;
            $('.loaded').attr('style','width: ' + loaded.toFixed(0) + '%');

          }
        }

        // Fire when track loaded completely
        var afterLoad = function(){
            if (autoplay == true) play();
            // $('.cover img').rotate();
        }

        // Load track
        var loadMusic = function(i){
            var item = playlist[i];

            newaudio = $('<audio>').html('<source src="'+item.mp3+'"><source src="'+item.ogg+'">').appendTo('#player');
            $('.details .title').html(item.title);
            // $('.audio').removeClass('state-playing').eq(i).addClass('state-playing');

            audio = newaudio[0];
            audio.volume = $('.mute').hasClass('enable') ? 0 : 0.5;
            audio.addEventListener('progress', beforeLoad, false);
            audio.addEventListener('durationchange', beforeLoad, false);
            audio.addEventListener('canplay', afterLoad, false);
            audio.addEventListener('ended', ended, false);
        }

        loadMusic(currentTrack);

        $('.play-control button').on('click', function(){
            if(debug)console.log('播放暂停键 click');
            if ($(this).parents('.audio').hasClass('state-playing')){
                $(this).parents('.audio').removeClass('state-playing');
                pause();
            } else {
                $(this).parents('.audio').addClass('state-playing');
                play();
            }
        });

        $('#playlist li').each(function(i){
            var _i = i;
            $(this).on('click', function(){
                switchTrack(_i);
            });
        });

    </script>
</body>
</html>
