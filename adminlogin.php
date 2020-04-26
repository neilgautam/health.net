<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css"  href="style.css">
	<title>ABC Hospital</title>
	
</head>
<body>
	<header>
		<div class="upmost">
		<h2 class = "logo">ABC SUPERSPECIALITY <br>HOSPITALS & MEDICAL COLLEGES</h2>
		</div>
			
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
		<button type = "submit" name="login-submit">LOGIN</button>

	</form>
		


	</header>
	</body>	
</html>			