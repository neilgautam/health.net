<?php
include 'includes/dbh.inc.php';
session_start();

?>

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
		<h2 class = "logo">health.NET</h2>
		</div>
		<nav class = "head-master">
				<ul class = "head-ulist">
					<li class ="head-list"><a href="adminafterlogin.php"  style = " padding : 0 105px"  class = "head-a">ADMIN HOME</a></li>
					<li class ="head-list"><a href="adminadddoctor.php"  style = " padding : 0 105px"  class = "head-a">ADD DOCTOR</a></li>
					
					<li class ="head-list"><a href="adminmodify.php"  style = " padding : 0 105px" class = "head-a">MODIFY DATABASE</a></li>
					<li class ="head-list"><a href="includes/logout.inc.php"  style = " padding : 0 105px"  class = "head-a">LOGOUT</a></li>
				</ul>
		</nav>		
	</header>
	<main>
		<center>
			<form action = "includes/adminsearchdata.inc.php" method = "POST">
				
					<label for="doctor_id">Enter Doctor's ID </label><br><br>
					<input type="text" name="doctor_id" placeholder="Enter Doctor's ID"><br><br>
					<button type="submit" name="admin_search_submit">submit</button><br><br><br>
					
					

			</form >
		</center>
	</main>
</body>
</html>