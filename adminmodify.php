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
		<nav class = "head-master">
				<ul class = "head-ulist">
					<li class ="head-list"><a href="index.php" class = "head-a">HOME</a></li>
					<li class ="head-list"><a href="demographics.php" class = "head-a">DEMOGRAPHICS</a></li>
					<li class ="head-list"><a href="doctorschedule.php" class = "head-a">DOCTOR SCHEDULES</a></li>
					<li class ="head-list"><a href="loginandappointment.php" class = "head-a">BOOK APPOINTMENT</a></li>
					<li class ="head-list"><a href="loginandappointment.php" class = "head-a">LOGIN</a></li>
				</ul>
		</nav>		
	</header>
	<main>
			<form action = "admimodify.inc.php">
				
					<label for="doctor_id">Enter Doctor's id which has any discripancy :</label>
					<input type="text" name="doctor_id" placeholder="Enter doctor's id">
					
					<button type="submit">submit</button>


					<label for="doctor_id">Enter no of attributes that require changes :</label>
					<input type="text" name="no_of_fields" placeholder="no of fields">

			</form >


			?>
	</main>
</body>
</html>


