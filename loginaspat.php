<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Patient login</title>
	<meta charset="utf-8">
</head>
<body>
	<h2> LOGIN AS PATIENT </h2>
	<?php
		if(isset($_SESSION['patient_id'])){
			echo '<h3>You are currently logged in!</h3>';
		}else{
			echo '<h3>You are currently logged out!</h3>';
		}

	?>
	<form action="includes/loginaspat.inc.php" method="post">
		<input type="text" name="uname" placeholder="ENTER USERNAME">
		<input type="password" name="pwd" placeholder="ENTER PASSWORD">
		<button type = "submit" name="login-submit">LOGIN</button>

	</form>
		<a href="signupaspat.php">New User? Signup</a>
</body>
</html>