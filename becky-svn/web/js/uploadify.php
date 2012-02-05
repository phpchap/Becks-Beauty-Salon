<?php

if (!empty($_FILES)) {
    
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
    $filename = $_FILES['Filedata']['name'];
    $targetFile =  str_replace('//','/',$targetPath) . $filename;
    
	$ext = substr($targetFile, strrpos($targetFile, '.') + 1);

	$valid_ext[]="jpg";
	$valid_ext[]="jpeg";
	$valid_ext[]="gif";
	$valid_ext[]="png";
	
	if(in_array($ext, $valid_ext)) {
	    //Avoid files Overwrite
	    while(file_exists($targetFile)) {
	        $user = "g".rand(0,100);
	        $filename = $user."-". $_FILES['Filedata']['name'];
	        $targetFile =  str_replace('//','/',$targetPath) . $filename;
	    } 
	    move_uploaded_file($tempFile, $targetFile);
		echo $filename;
		
	} else {
		echo "error";
	}
}
?>