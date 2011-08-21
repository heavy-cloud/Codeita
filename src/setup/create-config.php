<?php
include('../inc/globals.inc');

$us = $_POST['users'];
$out = array();
while($item = current($us)){
	$it = array('id'=>generateUID(),'username'=>key($us),'password'=>ccrypt($item));
	array_push($out,$it);
	//echo key($us).'-'.$item;
	next($us);
}

if(!is_dir(CONFIG_PATH)){
	mkdir(CONFIG_PATH,0755);
}
if(is_file(CONFIG_FILE)){
	unlink(CONFIG_FILE);
}


if(file_put_contents(CONFIG_FILE,json_encode($out))){

	if(!is_dir(FILES_PATH)){
		mkdir(FILES_PATH,0755);
		recurse_copy('starter-site/',FILES_PATH);
	}
	echo 1;
}else{
	echo 0;
}

function generateUID() {
	return '_'.uniqid();
}

function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
?>