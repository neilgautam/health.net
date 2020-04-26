<?php
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
					<li class ="head-list"><a href="adminsearchdata.php" class = "head-a">SEARCH DATABASES</a></li>
					<li class ="head-list"><a href="adminmodifydata.php" class = "head-a">MODIFY DATABASE</a></li>
					<li class ="head-list"><a href="loginandappointment.php" class = "head-a">LOGOUT</a></li>
				</ul>
		</nav>


	</header>

	<main>

		<!--error-->
		<?php
		if(isset($_POST['signup-submit'])){
			if($id != Null){
			echo '<h3 style="color: green">new record of doctor successfully added in DATABASE!</h3>';
			}
		}
		?>
		<form action="includes/adminadddoctor.inc.php" method="post">
		<label for ="fname">First name: </label><br>
		<input type="text" name="fname" placeholder="Enter First name"><br>
		<label for="lname">Last name: </label><br>
		<input type="text" name="lname" placeholder="Enter last name"><br>

		<label>Sex: </label><br>
		  <input type="radio" id="male" name="gender" value="male">
  		  <label for="male">Male</label><br>
 		  <input type="radio" id="female" name="gender" value="female">
 		 <label for="female">Female</label><br>
 		 <input type="radio" id="other" name="gender" value="other">
 		 <label for="other">Other</label><br>

 		 <label for= "dob">Date of Birth</label>
 		 <input type="text" name="dob" placeholder="yyyy/mm/dd"><br>
 		 <br> 
 		 <label for= "address">Address: </label><br>
 		 <textarea name ="address" placeholder="Enter your address!"></textarea><br>

 		 <label for= "dept">Department: </label>
 		 <input type="text" name="dept" placeholder="enter the Department!"><br>
 		 <br>
 		 <label for= "speciality">Speciality: </label>
 		 <input type="text" name="spec" placeholder="Speciality of Doctor"><br>
 		 <br>
 		 <label for= "dateofjoin">Date of Joining: </label>
 		 <input type="text" name="date_of_join" placeholder="yyyy/mm/dd"><br>
 		 <br>
 		 <label for= "salary">Salary: </label>
 		 <input type="text" name="Salary" placeholder="Enter Salary Amount!"><br>
 		 <br>
 		 <input type="text" name="mail" placeholder="Enter your E-mail id!"><br>
 		 <input type="password" name="pwd" placeholder="choose a password"><br>
 		 <input type="password" name="pwd2" placeholder="repeat password"><br>

 		 <input type="text" name="phone" placeholder="enter mobile no."><br>
 		 <button type= "submit" name= "signup-submit">Signup</button>
 		 <?php 

		if(isset($_POST['signup-submit'])){
			if($id != Null){
			echo '<h3 style="color: green">new record of doctor successfully added in DATABASE!</h3>';
			}
		}
		?>

	</form>


	</main>


</body>


</html>