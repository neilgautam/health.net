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
					<li class ="head-list"><a href="doctorafterlogin.php" class = "head-a">DOCTOR HOME</a></li>
					<li class ="head-list"><a href="doctorpatientfillup.php" class = "head-a">PATIENT FILLUP</a></li>
					<li class ="head-list"><a href="doctorgeneratereport.php" class = "head-a">GENERATE PATIENTS REPORT</a></li>
					<li class ="head-list"><a href="doctorappointment.php" class = "head-a">APPOINTMENTS</a></li>
					<li class ="head-list"><a href="includes/logout.inc.php" class = "head-a">LOGOUT</a></li>
				</ul>
		</nav>		
	</header>
		<main>
			<div class = "wrap-image">
			<center>
		
				
			
		<img src="https://clipartart.com/images/clipart-profile-2.jpg" alt = "profile_img" width = 200 height = 200>
		

	
			<div class="container">
	 			<form action= "" method="POST"> 
	 			<div class="row">
    				<div class="col-25">
	 			<label>Your ID</label>
	 				</div>
    <div class="col-75">
	 			<input type="text" name="id_1" value = "<?php echo $_SESSION['doci_id'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>first name</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_2" value = "<?php echo $_SESSION['doc_fname'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>last name</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_3" value = "<?php echo $_SESSION['doc_lname'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>gender</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_4" value = "<?php echo $_SESSION['doc_sex'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Date Of Birth</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_5" value = "<?php echo $_SESSION['doc_dob'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Address</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_6" value = "<?php echo $_SESSION['doc_address'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Email</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_7" value = "<?php echo $_SESSION['doc_email'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Contact </label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_8" value = "<?php echo $_SESSION['doc_contact'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Your Salary</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_9" value = "<?php echo $_SESSION['doc_salary'] ?>" /> 
	 			</div>
  </div>
  <div class="row">
    <div class="col-25">
	 			<label>Date Of Joining</label>
	 			</div>
    <div class="col-75">
	 			<input type="text" name="id_10" value = "<?php echo $_SESSION['doc_doj'] ?>" /> 
	 			
	 		<!--	<button type = "submit" name="edit-profile">EDIT</button>   -->
				</form>

				

	</center>




</div>
		</main>
</body>
</html>