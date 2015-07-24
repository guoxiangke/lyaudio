<pre>
<?php
require 'vendor/autoload.php';
require_once('vendor/mgargano/simplehtmldom/src/simple_html_dom.php');

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


$file_path = dirname(__FILE__).'/cron/nzzlist/';
$file_key = $file_path . date('Ymd') . '.md3';
// $file_store_key = $file_path .'/store/'. date('Ymd') . '.txt';
// chmod($file_store_key, 0777); 
chmod($file_key, 0777); 
$file = file_get_contents($file_key);
$urls = json_decode($file,TRUE);

$logfile = $file_path.'logs.txt';

foreach ($urls as $url => $value) {

	if(!isset($value['mp3_link'])){
		$link = 'http://liangyou.nissigz.com/'.$url;
        $html = SimpleHtmlDom\file_get_html("$link");
        $meta = $html->find('meta[http-equiv="refresh"]');
        $meta = array_shift($meta)->content;
        $mp3_link = str_replace('1; url=','',$meta);
        $urls[$url]['mp3_link'] = $mp3_link;
        //ignore  when this day no radio.
        if(!strstr($mp3_link, date('ymd'))){
            $urls[$url]['already'] = 'already';
            $urls = json_encode($urls);
            //fails
            file_put_contents( $file_key , $urls);
            continue;            
        }
        // echo $value['title'].'Link is ： ' . $mp3_link;
        // then download & s3

        $local_dir = dirname(__FILE__).'/audios/liangyou/audio/'.date('Ym').'/'.$value['title'];
        if (!is_dir($local_dir)) {
            $oldmask = umask(0);
            mkdir($local_dir,0777,true);
            // chmod($local_dir, 0777);
            umask($oldmask); 
        }
        $tempfile = $local_dir . '/' . date('Ymd') .  '.mp3';

        // Create a stream
        $opts = array(
          'http'=>array(
            'method'=>"GET",
            // 'header'=>"Accept-language: en\r\n" .
                      // "Cookie: foo=bar\r\n"
          )
        );

        $context = stream_context_create($opts);

        // Open the file using the HTTP headers set above
        // $file = file_get_contents('http://www.example.com/', false, $context);
        
        try {
            $file = file_get_contents($mp3_link, false, $context);            
        } catch (Exception $e) {
            $urls = json_encode($urls);
            //fails
            file_put_contents( $file_key , $urls);
            continue;
        }
        
        // $file = @readfile($mp3_link);
        // if(!$file) return '!erro readfile!';
        file_put_contents($tempfile, $file);
        // $file_sh_key = dirname(__FILE__) . '/sh/' . date('Ymd') . '.sh';
        // if(file_exists($file_sh_key))  chmod($file_sh_key, 0777); 
        // $sh = "cd $local_dir && wget -Nc -O ".date('Ymd') .'.mp3'.' '.$mp3_link;
        // file_put_contents($file_sh_key, $sh."\n",FILE_APPEND);

        // var_dump($sh) ;
        // echo $value['title'] . ':' .$mp3_link;
        // return; 6834724
        if(1||filesize($tempfile)>1034724) {
            // Instantiate an S3 client
            $s3 = S3Client::factory(array(
                'key'    => 'AKIAJZSII3KHTLKFGB5A',
                'secret' => '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',
            ));
            echo 'downloaded!!!';
            $my_obj = 'liangyou/audio/'.date('Y').'/'.$value['title'].'/'.date('m').'/'.date('Ymd') .'.mp3';
            try {
                $result = $s3->putObject(array(
                    'Bucket' => 'ybzx',
                    'Key'    => $my_obj,
                    'Body'   => fopen($tempfile, 'r'),
                    'ACL'    => 'public-read',
                ));
                // Access parts of the result object
                echo $result['Expiration'] . "\n";
                echo $result['ServerSideEncryption'] . "\n";
                echo $result['ETag'] . "\n";
                echo $result['VersionId'] . "\n";
                echo $result['RequestId'] . "\n";

                // Get the URL the object can be downloaded from
                echo $result['ObjectURL'] . "\n";

                // unlink($tempfile);               
                file_put_contents($logfile, $my_obj."\n",FILE_APPEND);                

                $urls = json_encode($urls);
                file_put_contents( $file_key , $urls);
            } catch (S3Exception $e) {
                var_dump($e->getMessage());
            }

        }
        //https://s3.amazonaws.com/ybzx/liangyou/audio/2014/晨曦讲座/12/20141227.mp3
    // file_put_contents( $file_store_key, print_r($urls, true)) ;

    break;
	}
}
