<meta charset="UTF-8"><pre><?php
/*
* Copyright (c) 2014 Baidu.com, Inc. All Rights Reserved
*
* Licensed under the Apache License, Version 2.0 (the "License"); you may not
* use this file except in compliance with the License. You may obtain a copy of
* the License at
*
* Http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
* WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
* License for the specific language governing permissions and limitations under
* the License.
*/
// function uploadbce(){
    include 'BaiduBce.phar';
    require 'SampleConf.php';

    use BaiduBce\BceClientConfigOptions;
    use BaiduBce\Util\Time;
    use BaiduBce\Util\MimeTypes;
    use BaiduBce\Http\HttpHeaders;
    use BaiduBce\Services\Bos\BosClient;
    use BaiduBce\Services\Bos\CannedAcl;
    use BaiduBce\Services\Bos\BosOptions;
    use BaiduBce\Auth\SignOptions;

    use BaiduBce\Log\LogFactory;
    //调用配置文件中的参数
    global $BOS_TEST_CONFIG;
    //新建BosClient
    $client = new BosClient($BOS_TEST_CONFIG);

    // $bucketName = "buckettestguo";

    // //Bucket是否存在，若不存在创建Bucket
    // $exist = $client->doesBucketExist($bucketName);
    // if(!$exist){
    //     $client->createBucket($bucketName);
    //     print 'createBucket '.$bucketName.'<br>';
    //     $response = $client->listBuckets();
    //     foreach ($response->buckets as $bucket) {
    //         print $bucket->name.'<br>';
    //     }
    // }else{
    //     $client->deleteBucket($bucketName);
    //     print 'deleteBucket '.$bucketName.'<br>';
    //     $response = $client->listBuckets();
    //     foreach ($response->buckets as $bucket) {
    //         print $bucket->name.'<br>';
    //     }
    // }
    $bucketName = "729ly";
    if(count($_POST)){
        $objectKey = ($_POST['key']);
        $fileName = ($_POST['fileName']);
        // $options = array(
        //     BosOptions::MAX_KEYS=>1,
        //     BosOptions::PREFIX=>"729ly/",
        //     BosOptions::MARKER=>$objectKey,
        //     BosOptions::DELIMITER=>"/",
        // );
        // $lists = $client->listObjects($bucketName,$options);
        // var_dump('log begin:');var_dump($lists);
        
        try {
            $response = $client->getObjectMetadata($bucketName, $objectKey);
            var_dump('1');//exits!!
            // var_dump($response);
                // array(7) {
                //   ["contentType"]=>
                //   string(10) "audio/mpeg"
                //   ["contentLength"]=>
                //   int(7044768)
                //   ["contentMd5"]=>
                //   string(24) "R55juD5sQxYIObAcWa08xQ=="
                //   ["date"]=>
                //   object(DateTime)#49 (3) {
                //     ["date"]=>
                //     string(26) "2015-09-25 15:05:00.000000"
                //     ["timezone_type"]=>
                //     int(2)
                //     ["timezone"]=>
                //     string(3) "GMT"
                //   }
                //   ["etag"]=>
                //   string(32) "479e63b83e6c43160839b01c59ad3cc5"
                //   ["lastModified"]=>
                //   object(DateTime)#50 (3) {
                //     ["date"]=>
                //     string(26) "2015-09-25 09:26:09.000000"
                //     ["timezone_type"]=>
                //     int(2)
                //     ["timezone"]=>
                //     string(3) "GMT"
                //   }
                //   ["userMetadata"]=>
                //   array(0) {
                //   }
                // }
            return;
        } catch (\BaiduBce\Exception\BceBaseException $e) {
            // echo 'Caught exception: ',  $e->getMessage(), "\n";
            // var_dump('Exception Noexits!!');
            // var_dump($e->getMessage());//"Not Found [requestId: status:404 code:]"
        }
        // $client->putObjectFromFile($bucketName, $objectKey, $fileName);
        // file_put_contents( 'log.txt' , json_encode($_POST)); 
        $user_meta = (array)json_decode(($_POST['user_meta']));
        $client->putObjectFromFile($bucketName, $objectKey, $fileName,array('userMetadata'=>$user_meta));
        
        // $response = $client->getObjectMetadata($bucketName, $objectKey);
        // var_dump($response);

        // $lists = $client->listObjects($bucketName,$options);
        // var_dump('log begin:');var_dump($lists);
        var_dump('1');

    }
    // $objectKey = '/lyaudio/nizz/gsa/1509/gsa150925.mp3';
    
// }
// uploadbce();
