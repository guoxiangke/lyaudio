<?php
$ds          = DIRECTORY_SEPARATOR; 
$storeFolder = 'files'; 
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];         
 
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 
         
        $file_name = $_FILES['file']['name'];
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $name = chr( mt_rand( ord( 'a' ) ,ord( 'z' ) ) ) .substr( md5( time( ) ) ,1 );
        $basename = $name . '.' . $extension;

        $targetFile =  $targetPath. $basename;  
         
        $return = move_uploaded_file($tempFile,$targetFile);
        if($return){
            $new_file = $basename;
        };
        header('Content-type: text/json');              //3
        header('Content-type: application/json');
        echo $new_file; return;
} else {                                                           
    $result  = array();
 
    $files = scandir($storeFolder);                 //1

    if ( false!==$files ) {
        foreach ( $files as $file ) {
            if ( '.'!=$file && '..'!=$file) {       //2
                $obj['name'] = $file;
                $obj['size'] = filesize($storeFolder.$ds.$file);
                $result[] = $obj;
            }
        }
    }
     
    $files = $result;
}
//http://html5demos.com/dnd-upload
//http://www.ruanyifeng.com/blog/2012/09/xmlhttprequest_level_2.html
//http://www.uploadify.com/about/
//TODO
  // multiple
  //price http://www.egnyte.com/corp/plans_pricing.html  http://bootflat.github.io/documentation.html
?>
<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>洪恩云图</title>
    <meta name="description" content="Intelligent File Sharing in the Cloud and on Premises, Access, Share and Control 100% of your data from anywhere using any smartphone, tablet or computer.">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="shortcut icon" type="icon" href="favicon.ico">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="html5shiv.min.js"></script>
      <script src="respond.min.js"></script>
    <![endif]--> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.min.js"></script>
    <script src="ZeroClipboard.min.js"></script>
    <style>
      #holder {border: 2px dashed #0087F7;
      border-radius: 5px;
      background: #d9edf7;
      padding: 20px;
      min-height: 150px;
      margin-top: 10px;}
      #holder.hover { border: 5px dashed #0087F7; }
      #holder img { display: block; margin: 10px auto; max-height: 300px; }
      #holder p { margin: 10px; font-size: 14px; }
      progress { width: 100%; }
      progress:after { content: '%'; }
      .fail { background: #c00; padding: 2px; color: #fff; }
      .hidden { display: none !important;}
      /*.info{
        background: url('http://www.abc-chinaedu.com/files/p38e5011772b5f3e22b4bf41e9e1c474.png') no-repeat center right;
        background-size: 252px 192px;
        min-height: 192px;
      }*/

      #click-upload{
        display: block;
        width: 100%;
        min-height: 40px;
        padding: 0;
        margin-bottom: 10px;
      }
      #copy-button{
        display: block;
        margin: 10px 0;
        width: 100%;
      }
      .info {
        padding: 10px;
      }
    </style>
  </head>
  <body>
     <div class="progress">
        <div class="progress-bar  progress-bar-striped" style="width: 30%;" id="uploadprogress" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
          <span>等待图片！</span>
        </div>
      </div>
  <div class="container-fluid">
      <div style="text-align: center;">
        <img  src="p38e5011772b5f3e22b4bf41e9e1c474.png">
      </div>
      <input id="click-upload" type="submit" value="选择图片"  class="btn btn-default btn-danger"/>
      <input  class="hidden" name="file" id="file-input" type="file" accept="image/*"  /> 

      <button id="copy-button"  class="btn btn-default btn-lg btn-success hidden" data-clipboard-text="Copy Me!" title="点击复制链接">上传成功！点击复制链接</button>
             
      <p style="cursor: default;" class="btn btn-default btn-primary hidden-xs"><span class="caret"></span></span>拖到这里</p> 
      
 
    <div id="holder">    <div class="alert alert-info" role="alert">
      <h4>Why</h4>
      <p>更人性的分享(节约流量)</p> 
      <p>更简便的上传(支持微信)</p> 
      <p>像玩魔术一样(拖拽上传)</p> 
      <p>进度条提示上传百分比</p> 
      <pre class="hidden">Some features include:

Multiple File Uploads
Multiple File Uploads
The main benefit of Uploadify is its ability to allow multiple file uploads without the hassle of clicking multiple browse buttons or submitting multiple forms.

drag and Drop Files
Drag and Drop
The HTML5 version of our file uploader (UploadiFive) allows you to drag and drop files onto the queue to add them instantly.

Real-Time Progress Indicators
Real-Time Progress Indicators
While files are being uploaded, progress bars show the current upload progress so your users don’t have to second guess how long uploading files is going to take.

Custom Upload Restrictions
Custom Upload Restrictions
Set file size limits, file count limits, file type limits, and simultaneous upload limits with ease to ensure your servers are free from abuse.</pre>
    </div>
    </div> <br>

    <p id="upload" class="hidden"><label>Drag & drop not supported, but you can still upload via this input field:<br><input type="file"></label></p>
    <p id="filereader">File API & FileReader API not supported</p>
    <p id="formdata">XHR2's FormData is not supported</p>
    <p id="progress">XHR2's upload progress isn't supported</p>
    <!-- <p>Upload progress: <progress id="uploadprogress" min="0" max="100" value="0">0</progress></p> -->
 
<script>
var holder = document.getElementById('holder'),
tests = {
  filereader: typeof FileReader != 'undefined',
  dnd: 'draggable' in document.createElement('span'),
  formdata: !!window.FormData,
  progress: "upload" in new XMLHttpRequest
}, 
support = {
  filereader: document.getElementById('filereader'),
  formdata: document.getElementById('formdata'),
  progress: document.getElementById('progress')
},
acceptedTypes = {
  'image/png': true,
  'image/jpeg': true,
  'image/gif': true
},
progress = document.getElementById('uploadprogress'),
fileupload = document.getElementById('upload');

"filereader formdata progress".split(' ').forEach(function (api) {
if (tests[api] === false) {
support[api].className = 'fail';
} else {
// FFS. I could have done el.hidden = true, but IE doesn't support
// hidden, so I tried to create a polyfill that would extend the
// Element.prototype, but then IE10 doesn't even give me access
// to the Element object. Brilliant.
support[api].className = 'hidden';
}
});

function previewfile(file) {
  if (tests.filereader === true && acceptedTypes[file.type] === true) {
    var reader = new FileReader();
    reader.onload = function (event) {
      var image = new Image();
      image.src = event.target.result;
      image.width = 250; // a fake resize
      holder.appendChild(image);
      holder.innerHTML += '<p class="bg-primary center-block">' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K 上传成功！</p>' : '');
    };

    reader.readAsDataURL(file);
  }  else {
    holder.innerHTML += '<p class="bg-primary">' + file.name + ' ' + (file.size ? (file.size/1024|0) + 'K<br/>上传成功！' : '');
    console.log(file);
  }
}

function readfiles(files) {
    // debugger;
    var formData = tests.formdata ? new FormData() : null;
    // console.log(files);
    for (var i = 0; i < files.length; i++) {
      // console.log(files[i]);
      if (files[i].size > 10485760 ) { alert('文件超过10M，"' + files[i].name + '"上传失败！'  ); return;}
      if (files[i].type.indexOf('image') === -1) { alert('上传失败！不允许上传' + files[i].name ); return;}
      if (tests.formdata) formData.append('file', files[i]);
      previewfile(files[i]);
    }

    // now post a new XHR request
    if (tests.formdata) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'index.php');
      xhr.onload = function() {
        // progress.value = progress.innerHTML = 100;
        $('#uploadprogress').width('100%');
        $('#uploadprogress span').html('100%');
      };

      if (tests.progress) {
        xhr.upload.onprogress = function (event) {
          if (event.lengthComputable) {
            var complete = (event.loaded / event.total * 100 | 0);
            // progress.value = progress.innerHTML = complete;
           $('#uploadprogress').width(progress.value + '%');
           $('#uploadprogress span').html(progress.value + '%');
          }
        }
      }

      xhr.send(formData);
        　xhr.onreadystatechange = function(){
        　　　　if ( xhr.readyState == 4 && xhr.status == 200 ) {
                var a = $("<a>").attr("href", window.location.href + 'files/'+xhr.responseText).attr('title','点击分享...');
                if(files.length){
                    $("#holder img").last().wrap(a);
                }else{            
                    $("#holder img").wrap(a);
                }
                $uri = window.location.href + 'files/' + xhr.responseText;
                $('#copy-button').attr('data-clipboard-text',$uri).removeClass('hidden');

                // alert("上传成功！点击复制图片分享链接到朋友圈...");
        　　　　} else {
                // console.log(xhr.statusText);
                // console.log(xhr.status);
                // alert("上传失败，请重新上传，如果错误依然，请报告给我：Request was unsuccessful: " + xhr.status);
        　　　　}
        　　};
 


    }
}

if (tests.dnd) { 
  holder.ondragover = function () { this.className = 'hover'; return false; };
  holder.ondragend = function () { this.className = ''; return false; };
  holder.ondrop = function (e) {
    this.className = '';
    e.preventDefault();
    readfiles(e.dataTransfer.files);
  }
} else {
  fileupload.className = 'hidden';
  fileupload.querySelector('input').onchange = function () {
    readfiles(this.files);
  };
}

$('#file-input').change(function(){
  readfiles(this.files);
});
$('#click-upload').click(function(){
  $('#file-input').trigger('click');
});

(function ($) {
  document.addEventListener("WeixinJSBridgeReady", function onBridgeReady() {
    // WeixinJSBridge.call("hideOptionMenu");
    $('#copy-button').click(function(){
      window.location = $(this).attr('data-clipboard-text');
    });
  });
}(jQuery));

</script>




    <?php include('../focus.php');?>
    </div>
    <script type="text/javascript">// main.js
      var client = new ZeroClipboard( document.getElementById("copy-button"));
      client.on( "ready", function( readyEvent ) {
        // alert( "ZeroClipboard SWF is ready!" );
        client.on( "aftercopy", function( event ) {
          // `this` === `client`
          // `event.target` === the element that was clicked
          // event.target.style.display = "none"; + event.data["text/plain"] 
          alert("复制成功，去粘贴吧！");
        } );
      } );
    </script>
  </body>
</html>