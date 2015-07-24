<?php
$ds          = DIRECTORY_SEPARATOR; 
 
$storeFolder = 'uploads';  

    var_dump($_FILES);
 
if (!empty($_FILES)) {
 
    $tempFile = $_FILES['file']['tmp_name'];         
 
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds; 

 		 
 		$file_name = $_FILES['file']['name'];
 		$extension = pathinfo($file_name, PATHINFO_EXTENSION);
 		$name = chr( mt_rand( ord( 'a' ) ,ord( 'z' ) ) ) .substr( md5( time( ) ) ,1 );
		$basename = $name . '.' . $extension;

 		$targetFile =  $targetPath. $basename;  
    $return = move_uploaded_file($tempFile,$targetFile);
    header('Content-type: text/json');              //3
    header('Content-type: application/json');
    $result['img']	= $basename;
    echo json_encode($result);
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
     
    header('Content-type: text/json');              //3
    header('Content-type: application/json');
    echo json_encode($result);
}
?>