<?php
$from = $_POST['from'];
$to = $_POST['to'].'/'.basename($from);
rename($from,$to);
?>