<?php
$home = realpath(__DIR__.'/../../').'/';
define("DATA_PATH", $home.'data/');
define("CONFIG_PATH", DATA_PATH.'config/');
define("FILES_PATH", DATA_PATH.'www/');
define("CONFIG_FILE", CONFIG_PATH.'config.jdb');

function ccrypt($str){
	return crypt($str, '$6$rounds=500$c0d31t4r0ck5$');
}