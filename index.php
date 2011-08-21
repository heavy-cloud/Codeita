<?php
include('src/inc/globals.inc');
if(!is_file(CONFIG_FILE)){
	header("Location: setup");
}
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
			<div class="row">
				<div class="span7 offset1">
					<br /><br />
					<h1>User Access</h1>
					<p>You be logged in to use Codeita. Enter your username and password to continue.</p>
				</div>

				<div class="span8">
					<br /><br />
					<form action="src/auth/login.php" method="POST">
						<div class="clearfix"> 
							<label for="">Username</label> 
							<div class="input"> 
								<input required name="username" type="text" /> 
							</div> 
						</div> <!-- /clearfix --> 						
						<div class="clearfix"> 
							<label for="">Password</label> 
							<div class="input"> 
								<input required name="password" type="password" /> 
							</div> 
						</div> <!-- /clearfix --> 						
						<div class="clearfix"> 
							<div class="input"> 
								<input class="btn primary" id="submit" type="submit" value="Log In" /> 
							</div> 
						</div> <!-- /clearfix --> 						
					</form>
				</div>

			</div>
			
			
			</section>
		</div>
	</body>
</html>
