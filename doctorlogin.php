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
			
			
	
	<center>
		<h2 > LOGIN AS DOCTOR </h2>
		<form action="includes/doctorlogin.inc.php" method="POST">
		<input type="text" name="uname" placeholder="ENTER USERNAME"><br>
		<input type="password" name="pwd" placeholder="ENTER PASSWORD"><br>
		<button type = "submit" name="login-submit">LOGIN</button>

	</form>
	</center>
	<? php 
	echo "hello ";
	?>
	
	</header>
	</body>	
</html>	