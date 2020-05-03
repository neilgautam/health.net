<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css"  href="style.css">
	<title>ABC Hospital</title>
	<style>
		table, th, td {
  		border: 1px solid black;
	}
</style>
</head>
<body>
	<header>

		<center>
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
	</center>
	</header>
		<main>
			<center>
			<div class="container">
			<form action = "includes/doctorpatientfillup.inc.php" method = "POST">
				<div class="row">			
    <div class="col-25">
					<label for="appointment_id">Enter Appointment ID </label> </div>

    <div class="col-75">
					<input type="text" name="appointment_id" placeholder="Enter appointment id">
					    </div>
   <div class="row">
					<button type="submit" name="doctor_patient_fillup">submit</button><br><br><br>
</div>
</div>
			</form >
			
<?php 	
if( isset($_SESSION['app_id'])){ 
 	?>
 	
<table>
      <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Contact</th>
      <th>Email</th>
      <th>Address</th>
      <th>Gender</th>
     </tr>

     <tr>
     <td><?php echo $_SESSION['PAT_ID']; ?></td>
    <td><?php echo $_SESSION['PAT_FN']; ?></td>
    <td><?php echo $_SESSION['PAT_LN']; ?></td>
    <td><?php echo $_SESSION['PAT_AGE']; ?></td>
    <td><?php echo $_SESSION['PAT_CONTACT']; ?></td>
    <td><?php echo $_SESSION['PAT_EMAIL']; ?></td>
    <td><?php echo $_SESSION['PAT_ADDRESS']; ?></td>
    <td><?php echo $_SESSION['PAT_SEX']; ?></td>
    
    
    
  </tr>      
	</table>
<?php } ?>


			<div class="container">
				<form action="includes/doctorpatientfillup.inc.php" method="POST"><div class="row">
    <div class="col-25">
				<label >Medicine Prescribed</label>
				</div>
    <div class="col-75">
					<input name="med_pres" placeholder="Enter Medicine Prescribed "></div>
  </div>
  <div class="row">
    <div class="col-25">
					<label >Tests Prescribed</label>
					</div>
    <div class="col-75">
					<input name="tests_pres" placeholder="Enter Tests Prescribed ">
					</div>
  </div>
  <div class="row">
    <div class="col-25">
					
					<label >Observational comments</label>
					</div>
    <div class="col-75">
					<input name="observ_commt" placeholder="Enter comments ">
					</div>
  </div>
  <div class="row">
    <div class="col-25">
					<label >Disease</label>
					</div>
    <div class="col-75">
					<input name="disease" placeholder="Enter disease ">
					</div>
  </div>
  <div class="row">
					<button type="submit" name="doc_fill">Submit</button>
				</form>
			

</center>
		</main>
</body>
</html>