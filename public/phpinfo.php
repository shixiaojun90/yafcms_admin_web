<?php
exit;
//phpinfo();exit;
header("content-type:text/html;charset=utf-8");  
date_default_timezone_set('Asia/Shanghai');  
    
    //$filename="http://www.itdatum.cn:8082/upload/File/1.mp4";
    //$command="ffmpeg -i http://www.itdatum.cn:8082/upload/File/1.mp4 -r 1 -q:v 2 -f image2 http://www.itdatum.cn:8082/upload/File/2.jpg";
    //exec($command);  
    //chmod($filename."8.jpg",0644);
    //print_r($img);exit;
  
    function execCommandLine($file){  
        $result = array();  
  
        $pathParts = pathinfo($file);
        
        $pathurl=$_SERVER['DOCUMENT_ROOT']."/upload/video/";
        $filename=$pathParts['filename'].'.jpg';
        $command = "ffmpeg -i {$pathurl}{$pathParts['basename']} -r 1 -q:v 2 -f image2 {$pathurl}{$filename}";
        exec($command);  
        chmod($pathurl.$filename,777);
        $result['filename']=$filename;
        $result['host']=$pathParts['dirname'].'/'.$filename;
        return $result;
    }
  
    $fileUrl="http://www.itdatum.cn:8082/upload/video/1.mp4";
    $img=execCommandLine($fileUrl);//截取第8、15、25秒为封面图
    $image_size = getimagesize($img['host']);
    $fileurl['witch']=$image_size[0];
    $fileurl['height']=$image_size[1];
    $fileurl['img']=$img['host'];
    print_r($fileurl);
    
?> 