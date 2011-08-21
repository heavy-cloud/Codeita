<?php
$file = $_POST['filename'];
$data = $_POST['data'];
if(file_put_contents($file,$data)){
	echo 1;
}
?>