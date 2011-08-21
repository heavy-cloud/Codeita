<?php
include_once('src/inc/globals.inc');
?><!doctype html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="src/css/bootstrap/bootstrap-1.0.0.css" />
		<link rel="stylesheet" type="text/css" href="src/css/main.css" />
		<script type="text/javascript" src="src/js/jquery.js"></script>
	</head>
	<body>
		<div class="content">
			<header>
				<img class="logo" src="src/img/logo_sm.png" alt="Codeita" />
			</header>
			<section id="page" class="container">
				<?php
					switch($_GET['step']){
						case 2:
							include('src/setup/step-2.php');
							break;
						default:
							include('src/setup/step-1.php');
							break;
					}
				?>
			</section>
		</div>
	</body>
</html>
