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
		<h2 class = "logo">ABC SUPERSPECIALITY <br>HOSPITALS & MEDICAL COLLEGES</h2>
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
	<main>
		<?php
		$sql = "select a.doc_name,a.appointment_date,a.appoint_id,d.medicine_prescribed,d.prescribed_tests,d.disease,d.observation_comments from appointment as a , diagnosis as d where a.patient_id =d.patient_id and a.status = 'Confirmed' and a.patient_id = ?;";
		$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
	 		header("Location: ../patientgeneratedreport.php?error=sqlerror");
			exit();
	 	}
		
		mysqli_stmt_bind_param($stmt,"s",$_SESSION['patient_id']);
		mysqli_stmt_execute($stmt);
		$result =  mysqli_stmt_get_result($stmt);
		$arr= array();
		while($row = mysqli_fetch_assoc($result)){
			$arr[] = $row;
		}
		?>
	</main>
	<center>
	<table>
		<tr>
			<th>Appointment ID</th>
			<th>Doctor Name</th>
			<th>Appointment Date</th>
			<th>Medicine Prescribed</th>
			<th>Observational Comments</th>
			<th>Disease</th>
		</tr>

<?php foreach ($arr as $r) {
	
?>
	<tr>
		<th><?php echo $r['appoint_id']; ?></th>
		<th><?php echo $r['doc_name']; ?></th>
		<th><?php echo $r['appointment_date']; ?></th>
		<th><?php echo $r['medicine_prescribed']; ?></th>
		<th><?php echo $r['observation_comments']; ?></th>
		<th><?php echo $r['disease']; ?></th>
	</tr>
<?php
} ?>

	</table>

</center>
</body>
</html>