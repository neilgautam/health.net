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
		<h2 class = "logo">ABC SUPERSPECIALITY <br>HOSPITALS & MEDICAL COLLEGES</h2>
		</div>
		<nav class = "head-master">
				<ul class = "head-ulist">
					<li class ="head-list"><a href="adminafterlogin.php" class = "head-a">ADMIN HOME</a></li>
					<li class ="head-list"><a href="adminadddoctor.php" class = "head-a">ADD DOCTOR</a></li>
				
					<li class ="head-list"><a href="adminmodify.php" class = "head-a">MODIFY DATABASE</a></li>
					<li class ="head-list"><a href="includes/logout.inc.php" class = "head-a">LOGOUT</a></li>
				</ul>
		</nav>		
	</header>
	<main>
		<center>
			<form action = "includes/adminmodify.inc.php" method = "POST">
				
					<label for="doctor_id">Enter Doctor's id which has any discripancy :</label><br><br>
					<input type="text" name="doctor_id" placeholder="Enter doctor's id"><br><br>
					
					<button type="submit" name="admin_modify_submit">submit</button><br><br><br>

			</form >
		</center>

		<center>

			
				


					<form action="includes/adminmodify.inc.php" method="POST">
						<label> DOCTOR'S FIRST NAME :</label>
						<input type="text" name="doc_1" value="<?php echo $_SESSION['doc_firstname']; ?>">
						<label> DOCTOR'S LAST NAME :</label>
						<input type="text" name="doc_2" value="<?php echo $_SESSION['doc_lastname']; ?>"><br><br>
						<label> DOCTOR'S DEPARTMENT :</label><br><br>
						<input type="text" name="doc_3" value="<?php echo $_SESSION['doc_depr']; ?>"><br><br>
						<label> DOCTOR'S SPECIALITY :</label><br><br>
						<input type="text" name="doc_4" value="<?php echo $_SESSION['doc_speciality']; ?>"><br><br>
						<label> DOCTOR'S DATE OF JOINING :</label><br><br>
						<input type="text" name="doc_5" value="<?php echo $_SESSION['doc_doj']; ?>"><br><br>
						<label> DOCTOR'S SEX :</label><br><br>
						<input type="text" name="doc_6" value="<?php echo $_SESSION['doc_gender']; ?>"><br><br>
						<label> DOCTOR'S EMAIL :</label><br><br>
						<input type="text" name="doc_7" value="<?php echo $_SESSION['doc_email']; ?>"><br><br>
						<label> DOCTOR'S CONTACT :</label><br><br>
						<input type="text" name="doc_8" value="<?php echo $_SESSION['doc_contact']; ?>"><br><br>
						<label> DOCTOR'S ADDRESS :</label><br><br>
						<input type="text" name="doc_9" value="<?php echo $_SESSION['doc_address']; ?>"><br><br>
						<label> DOCTOR'S DATE OF BIRTH :</label><br><br>
						<input type="text" name="doc_10" value="<?php echo $_SESSION['doc_dob']; ?>"><br><br>

						<label> DOCTOR'S SALARY :</label><br><br>
						<input type="text" name="doc_11" value="<?php echo $_SESSION['doc_salary']; ?>"><br><br>
						<button type = "submit" name="admin_edit">EDIT</button>
					</form>

				</center>
	</main>
</body>
</html>


