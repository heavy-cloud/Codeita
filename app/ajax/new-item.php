<?php
include('../../src/inc/globals.inc');
$data = realpath(CONFIG_PATH.'/../www/');
$path = str_replace('//','/',$data.'/'.$_POST['path']);

switch($_POST['type']){
	case 'dir':
		mkdir($path,0755);
		break;
	case 'file':
		file_put_contents($path,'');
		break;
}

?>