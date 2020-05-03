<?php
		
	require 'includes/dbh.inc.php'; 
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css"  href="style.css">
	<title>ABC Hospital</title>
	<style >
	body  {
  
 background-color: 	#E6E6FA;
}
</style>
</head>


<body>
	<header>
		<div class="upmost">
		<h2 class = "logo">health.NET</h2>
		</div>
	
		<nav class = "head-master">
				<ul class = "head-ulist">
					<li class ="head-list"><a href="patientafterlogin.php" class = "head-a">PROFILE</a></li>
					<li class ="head-list"><a href="viewappointment.php" class = "head-a">VIEW APOINTMENTS</a></li>
					<li class ="head-list"><a href="appointment.php" class = "head-a">BOOK APPOINTMENT</a></li>
					<li class ="head-list"><a href="patientgeneratedreport.php" class = "head-a">DOCTOR GENERATED REPORT</a></li>
					<li class ="head-list"><a href="includes/logout.inc.php" class = "head-a">LOGOUT</a></li>
				</ul>
				
		</nav>

	</header>
	<center>
		<?php
		
				if(isset($_SESSION['patient_update'])) {?>
						<h4 style="color:#7CFC00;"> Patient Details updated successfully. </h4> 
				<?php  }?>
			
		<img src="https://clipartart.com/images/clipart-profile-2.jpg" alt = "profile_img" width = 200 height = 200>
		

	<!--				$_SESSION['patient_id'] = $row['patient_id'];
	 				$_SESSION['firstname'] = $row['first_name'];
	 				$_SESSION['lastname'] = $row['last_name'];
	 				$_SESSION['gender'] = $row['sex'];
	 				$_SESSION['patientage'] = $row['age'];
	 				$_SESSION['patientaddress'] = $row['address'];
	 				
	 				$_SESSION['mail'] = $row['email'];
	 				$_SESSION['phoneno'] = $row['contact']; 
		-->
				<div class="container">
	 			<form action= "includes/patientafterlogin.inc.php" method="POST"> 
	 				<div class="row">
    <div class="col-25">
	 			<label>Patient ID</label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_1" value = "<?php echo $_SESSION['patient_id'] ?>" /> 
	 			<br><br>
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>first name</label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_2" value = "<?php echo $_SESSION['firstname'] ?>" /> 
	 			<br><br>
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>last name</label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_3" value = "<?php echo $_SESSION['lastname'] ?>" /> 
	 			<br><br>
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>gender</label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_4" value = "<?php echo $_SESSION['gender'] ?>" /> 
	 			<br><br>
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Patient Age</label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_5" value = "<?php echo $_SESSION['patientage'] ?>" /> 
	 			<br><br>
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Address</label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_6" value = "<?php echo $_SESSION['patientaddress'] ?>" /> 
	 			<br><br>
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Email</label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_7" value = "<?php echo $_SESSION['mail'] ?>" /> 
	 			<br><br>
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Contact </label><br>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_8" value = "<?php echo $_SESSION['phoneno'] ?>" /> 
	 			<br><br>
</div>
  </div>
  <div class="row">
	 			<button type = "submit" name="edit-profile">EDIT</button>
				</form>

				

	</center>
	<main>
		
	

	</main>
</body>
</html>

