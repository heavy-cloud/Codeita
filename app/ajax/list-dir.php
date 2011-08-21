<?php
header("Content-type: application/json");
include('../../src/inc/globals.inc');

$data = realpath(CONFIG_PATH.'/../www/');
$dir = $_POST['dir'];
if(!is_dir($data)){
	$out = mkdir($data);
}
$getdir = realpath($data.$dir);
$sd = @scandir($getdir);
$sd = array_diff($sd,array('.','..'));
$i=0;

foreach($sd as $file){
	$path = $getdir.'/'.$file;
	if(is_file($path)){ $type = 'file'; }else{ $type = 'dir'; }
	
	$files[$i] = array('filename'=>$file,'type'=>$type,'path'=>$path,'size'=>filesize($path));
	$i++;
}
$out = array('files'=>$files);
$out['filecount'] = count($sd);
echo json_encode($out);
?>