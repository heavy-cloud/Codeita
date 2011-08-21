<?php
include_once('../src/inc/globals.inc');
if(!is_file(CONFIG_FILE)){ header("Location: ../"); }
if(!isset($_COOKIE['x-codeita-user'])){ header("Location: ../"); }
?><!doctype html>
<html>
	<head>
		<title>Codeita</title>
		<link rel="stylesheet" type="text/css" href="../src/css/bootstrap/bootstrap-1.0.0.css" />
		<link rel="stylesheet" type="text/css" href="../src/css/app.css" />
		<link rel="stylesheet" type="text/css" href="../src/css/jqueryui/jquery.ui.base.css" />
		<link rel="stylesheet" type="text/css" href="../src/css/jqueryui/jquery.ui.tabs.css" />
		<link rel="stylesheet" type="text/css" href="../src/css/jqueryui/jquery.ui.selectable.css" />
		<script src="../src/js/jquery.js" type="text/javascript"></script>
		<script src="../src/js/jquery-ui.js" type="text/javascript"></script>
		<script src="../src/js/disableText.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="main-site">
			<div id="acct-nav">
				<a href="../src/auth/logout.php">Logout</a>
			</div>
			<ul id="main-nav">
				<li class="active"><a href="#tab-edit">Edit</a></li>
				<li><a href="#tab-mysql">MySQL</a></li>
				<li><a href="#tab-ref">Reference</a></li>
			</ul>
			<div id="tab-edit">
				<?php include('pages/edit.php'); ?>
			</div>
			<div id="tab-mysql">
				<?php include('pages/sql.php'); ?>
			</div>
			<div id="tab-ref">
				<?php include('pages/ref.php'); ?>
			</div>
		</div>
		<script>
		$(function(){
			$("#main-site").tabs();
		});
		</script>
	</body>
</html>

