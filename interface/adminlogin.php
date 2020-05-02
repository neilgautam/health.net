<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css"  href="loginstyle.css">
	<title>ABC Hospital</title>
	
</head>
<body>
	<header>
		<div class="container">
			<div class="login">
			<h2> LOGIN AS ADMIN </h2>
	
	<?php
	// new session variable as new admin

		if(isset($_SESSION['patient_id'])){
			echo '<h3 class = "login-style">You are currently logged in!</h3>';
		}else{
			echo '<h3 class = "login-style">You are currently logged out!</h3>';
		}

	?> 
	<form action="includes/adminlogin.inc.php" method="post">
		<input type="text" name="uname" placeholder="ENTER USERNAME">
		<input type="password" name="pwd" placeholder="ENTER PASSWORD">
		<p = submit><button type = "submit" name="login-submit">LOGIN</button></p>

	</form>
		
</div>
</div>

	</header>
	</body>	
</html>			