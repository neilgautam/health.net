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
	<main><center>

		<div class="container">
			<form action= "includes/doctorgeneratereport.inc.php" method="POST"> 
			<div class="row">
				<div class="col-25">
	 			<label>Patient ID</label>
	 		    </div>
	 		    <div class ="col-75">
	 			<input type="text" name="id_1"> 
	 			</div>
	 			</div>
	 			 <div class="row">
	 		<button type = "submit" name="search-profile">CHECK PATIENT RECORD</button><br>
	 	       </div>
			</form>
		</div>
</center>
	</main>
	<center>
<?php  
if(isset($_SESSION['pat_fname'])){
	?>

		<table>
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
				<th>Contact</th>
				<th>Gender</th>
			</tr>

			<tr>
				<td><?php echo $_SESSION['pat_fname']; ?></td>
				<td><?php echo $_SESSION['pat_lname']; ?></td>
				
				<td><?php echo $_SESSION['pat_age']; ?></td>
				<td><?php echo $_SESSION['contact']; ?></td>
				<td><?php echo $_SESSION['pat_sex']; ?></td>
				

			</tr>
		</table><br>
	

	</center>


<center>
	<?php	
	$sql_pat_appointments = "select * from appointment as a ,diagnosis as d where a.patient_id = d.patient_id  and a.appoint_id  = d.appoint_id and a.status = 'Confirmed' and a.patient_id = ?;";
	$stmt2 = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt2,$sql_pat_appointments)){
		   echo "SQL ERROR 1";
	} 
	else{
		$correct  = "true";
		mysqli_stmt_bind_param($stmt2,"s",$_SESSION['sid']);
		mysqli_stmt_execute($stmt2);
		$table_result1 = mysqli_stmt_get_result($stmt2);
		
		if( mysqli_num_rows($table_result1)>=1){
				$correct ="false";
				#echo "ENTERING LOOP";
			$temp_arr = array();
			while($row = mysqli_fetch_assoc($table_result1)){
				$temp_arr[] = $row;
		}
			#print_r($temp_arr);
			
	}}
	if($correct=="false"){
		foreach($temp_arr as $r){
	}
	?>
		<div class="container">
			
				<form>
					<div class="row">
						<div class="col-25">
					<label>Appointment ID</label>
						</div>
						<div class="col-75">
					<input type="text" name="1" readonly value = <?php echo $r['appoint_id'];  ?>>
						</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Doctor ID</label></div>
    <div class="col-75">
					<input type="text" name="2" readonly value = <?php echo $r['doctor_id'];  ?> >
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Doctor Name</label></div>
    <div class="col-75">
					<input type="text" name="3" readonly value = <?php echo $r['doc_name'];  ?> >
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Department</label></div>
    <div class="col-75">
					<input type="text" name="4" readonly value = <?php echo $r['department'];  ?>>
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Description by Patient</label></div>
    <div class="col-75">
					<input type="text" name="5" readonly value = <?php echo $r['description'];  ?>>
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Appointment Date</label></div>
    <div class="col-75">
					<input type="text" name="6" readonly value = <?php echo $r['appointment_date'];  ?>>
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Meds Prescribed</label></div>
    <div class="col-75">
					<input type="text" name="7" readonly value = <?php echo $r['medicine_prescribed'];  ?>>
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Prescribed Test</label></div>
    <div class="col-75">
					<input type="text" name="8" readonly value = <?php echo $r['prescribed_tests'];  ?>>
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Observational comments by Doc</label></div>
    <div class="col-75">
					<input type="text" name="9" readonly value = <?php echo $r['observation_comments'];  ?>>
					</div>
  					</div>
 						 <div class="row">
  						  <div class="col-25">
					<label>Disease Found</label></div>
    <div class="col-75">
					<input type="text" name="10" readonly value =<?php echo $r['disease'];  ?> >
					</div>
  					</div>
  					<?php
 					echo "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------"; ?><br>
 					<?php
 					echo "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------"; ?><br>
 					<?php
 					echo "-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------"; ?><br>
 
				</form>
			
		</div>

	<?php } ?>
	<?php } ?>
</center>

		

</body>
</html>
