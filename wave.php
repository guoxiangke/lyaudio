<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>公众号：永不止息</title>

    <!-- Bootstrap -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="wavesurfer.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">

      <div class="hidden-lg">
        <br>
        <p class="bg-primary">►点击右上角，在浏览器中打开即可后台播放！↑↑↑</p>
      </div>

      
      <p id="bg-info"></p>    


            <div id="demo">
                <div id="waveform">
                    <div class="progress progress-striped active" id="progress-bar">
                        <div class="progress-bar progress-bar-info"></div>
                    </div>

                    <!-- Here be the waveform -->
                </div>
                
                <div class="controls row">
                  <ul>
                    <li class="">
                    <button class="btn btn-primary" data-action="back">
                        <i class="glyphicon glyphicon-step-backward"></i>
                    </button></li> 
                    <li class="">
                    <button class="btn btn-primary col-md-3" data-action="play">
                        <i class="glyphicon glyphicon-play"></i>
                        /
                        <i class="glyphicon glyphicon-pause"></i>
                    </button></li> 
                    <li class="">
                    <button class="btn btn-primary col-md-3" data-action="forth">
                        <i class="glyphicon glyphicon-step-forward"></i>
                    </button></li> 
                    <li class="">
                    <button class="btn btn-primary col-md-3" data-action="toggle-mute">
                        <i class="glyphicon glyphicon-volume-off"></i>
                    </button></li> 
                  </ul>
                </div>
                <style type="text/css">
                  .controls ul li{
                    display: inline;
                    list-style: none;
                  }
                </style>
            </div>



      <?php include('focus.php');?>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.9.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      'use strict';

      // Create an instance
      var wavesurfer = Object.create(WaveSurfer);

      // Init & load audio file
      document.addEventListener('DOMContentLoaded', function () {
          var options = {
              container     : document.querySelector('#waveform'),
              waveColor     : 'violet',
              progressColor : 'purple',
              cursorColor   : 'navy'
          };

          if (location.search.match('scroll')) {
              options.minPxPerSec = 100;
              options.scrollParent = true;
          }

          // Init
          wavesurfer.init(options);
          // Load audio from URL
          wavesurfer.load('<?php echo isset($_GET["mp3"])?$_GET["mp3"]:"http://77g6cj.com1.z0.glb.clouddn.com/lyad.mp3"; ?>');

          // Regions
          if (wavesurfer.enableDragSelection) {
              wavesurfer.enableDragSelection({
                  color: 'rgba(0, 255, 0, 0.1)'
              });
          }
      });

      // Play at once when ready
      // Won't work on iOS until you touch the page
      wavesurfer.on('ready', function () {
          //wavesurfer.play();
      });

      // Report errors
      wavesurfer.on('error', function (err) {
          console.error(err);
      });

      // Do something when the clip is over
      wavesurfer.on('finish', function () {
          console.log('Finished playing');
      });


      /* Progress bar */
      document.addEventListener('DOMContentLoaded', function () {
          var progressDiv = document.querySelector('#progress-bar');
          var progressBar = progressDiv.querySelector('.progress-bar');

          var showProgress = function (percent) {
              progressDiv.style.display = 'block';
              progressBar.style.width = percent + '%';
          };

          var hideProgress = function () {
              progressDiv.style.display = 'none';
          };

          wavesurfer.on('loading', showProgress);
          wavesurfer.on('ready', hideProgress);
          wavesurfer.on('destroy', hideProgress);
          wavesurfer.on('error', hideProgress);
      });


      // Drag'n'drop
      document.addEventListener('DOMContentLoaded', function () {
          var toggleActive = function (e, toggle) {
              e.stopPropagation();
              e.preventDefault();
              toggle ? e.target.classList.add('wavesurfer-dragover') :
                  e.target.classList.remove('wavesurfer-dragover');
          };

          var handlers = {
              // Drop event
              drop: function (e) {
                  toggleActive(e, false);

                  // Load the file into wavesurfer
                  if (e.dataTransfer.files.length) {
                      wavesurfer.loadBlob(e.dataTransfer.files[0]);
                  } else {
                      wavesurfer.fireEvent('error', 'Not a file');
                  }
              },

              // Drag-over event
              dragover: function (e) {
                  toggleActive(e, true);
              },

              // Drag-leave event
              dragleave: function (e) {
                  toggleActive(e, false);
              }
          };

          var dropTarget = document.querySelector('#drop');
          Object.keys(handlers).forEach(function (event) {
              dropTarget.addEventListener(event, handlers[event]);
          });
      });



var GLOBAL_ACTIONS = {
    'play': function () {
        wavesurfer.playPause();
    },

    'back': function () {
        wavesurfer.skipBackward();
    },

    'forth': function () {
        wavesurfer.skipForward();
    },

    'toggle-mute': function () {
        wavesurfer.toggleMute();
    }
};


// Bind actions to buttons and keypresses
document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('keydown', function (e) {
        var map = {
            32: 'play',       // space
            37: 'back',       // left
            39: 'forth'       // right
        };
        var action = map[e.keyCode];
        if (action in GLOBAL_ACTIONS) {
            if (document == e.target || document.body == e.target) {
                e.preventDefault();
            }
            GLOBAL_ACTIONS[action](e);
        }
    });

    [].forEach.call(document.querySelectorAll('[data-action]'), function (el) {
        el.addEventListener('click', function (e) {
            var action = e.currentTarget.dataset.action;
            if (action in GLOBAL_ACTIONS) {
                e.preventDefault();
                GLOBAL_ACTIONS[action](e);
            }
        });
    });
});


// Misc
document.addEventListener('DOMContentLoaded', function () {
    // Web Audio not supported
    if (!window.AudioContext && !window.webkitAudioContext) {
        var demo = document.querySelector('#demo');
        if (demo) {
            demo.innerHTML = '<img src="/example/screenshot.png" />';
        }
    }


    // Navbar links
    var ul = document.querySelector('.nav-pills');
    var pills = ul.querySelectorAll('li');
    var active = pills[0];
    if (location.search) {
        var first = location.search.split('&')[0];
        var link = ul.querySelector('a[href="' + first + '"]');
        if (link) {
            active =  link.parentNode;
        }
    }
    active && active.classList.add('active');
});


    </script>
  </body>
</html>