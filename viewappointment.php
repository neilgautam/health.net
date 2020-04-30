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
	<style>
		table, th, td {
  		border: 1px solid black;
	}
</style>
</head>
<body>
	<header>
		<div class="upmost">
		<h2 class = "logo">ABC SUPERSPECIALITY <br>HOSPITALS & MEDICAL COLLEGES</h2>
		</div>
		<nav class = "head-master">
				<ul class = "head-ulist">
					<li class ="head-list"><a href="patientafterlogin.php" class = "head-a">PROFILE</a></li>
					<li class ="head-list"><a href="viewappointment.php" class = "head-a">VIEW APOINTMENTS</a></li>
					<li class ="head-list"><a href="appointment.php" class = "head-a">BOOK APPOINTMENT</a></li>
					<li class ="head-list"><a href="#.php" class = "head-a">DOCTOR GENERATED REPORT</a></li>
					<li class ="head-list"><a href="#.php" class = "head-a">LOGOUT</a></li>
				</ul>
			</nav>		
	</header>
	<main>
		
 <?php
     $sql = "select * from appointment where patient_id = ? ;";
	$pid  = $_SESSION["patient_id"];
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
 			echo "SQL ERROR";
      }
      mysqli_stmt_prepare($stmt,$sql);
      mysqli_stmt_bind_param($stmt,"s",$pid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      $arr = array();

      while($row = mysqli_fetch_assoc($result)){
      	$arr[] = $row;
      }
      echo "<table>";
      echo"<tr>";
      echo "<th>Appointment</th>";
      echo "<th>Doctor ID</th>";
      echo "<th>Doctor Name</th>";
      echo "<th>Department</th>";
      echo "<th>Description</th>";
      echo "<th>Appointment Time</th>";
      echo "<th>Appointment Date</th>";
      echo "<th>Status</th>";
      echo"</tr>";
      foreach($arr as $row ){
      	echo "<tr><td>".$row['appoint_id']."</td><td>".$row['doctor_id']."</td><td>".$row['doc_name']."</td><td>".$row['department']."</td><td>".$row['description']."</td><td>".$row['appointment_time']."</td><td>".$row['appointment_date']."</td><td>".$row['status']."</td><tr>";
      }		
      echo "</table>";

    ?>



	</main>
</body>
</html>