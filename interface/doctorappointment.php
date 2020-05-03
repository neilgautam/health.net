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
	table, td, th {  
  	border: 1px solid #ddd;
  	text-align: left;
	}

	table {
  		border-collapse: collapse;
  		width: 100%;
		}

th, td {
  padding: 15px;
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
					<li class ="head-list"><a href="doctorafterlogin.php" class = "head-a">DOCTOR HOME</a></li>
					<li class ="head-list"><a href="doctorpatientfillup.php" class = "head-a">PATIENT FILLUP</a></li>
					<li class ="head-list"><a href="doctorgeneratereport.php" class = "head-a">GENERATE PATIENTS REPORT</a></li>
					<li class ="head-list"><a href="doctorappointment.php" class = "head-a">APPOINTMENTS</a></li>
					<li class ="head-list"><a href="includes/logout.inc.php" class = "head-a">LOGOUT</a></li>
				</ul>
		</nav>		
	</header>
		<main>


			<div id ="sec_1" >
				<table>
					<tr>
						<th>Appointment ID</th>
						<th>first Name </th>
						<th>Last Name </th>
						<th>Age</th>
						<th>Sex</th>
						<th>Contact</th>
						<th>Issue</th>
						<th>Appointment Date</th>
						<th>Status</th>
					</tr>





			
			<?php

				include "includes/dbh.inc.php";
				$sql = "select ap.appoint_id,pt.first_name , pt.last_name, pt.age,pt.sex,pt.contact,ap.description,ap.appointment_date,ap.status from patientlogin as pt , appointment as ap where ap.doctor_id = ? and ap.status = 'Pending' and pt.patient_id=ap.patient_id;";

				$stmt = mysqli_stmt_init($conn);
				mysqli_stmt_prepare($stmt,$sql);
				
				

				mysqli_stmt_bind_param($stmt,"i",$_SESSION['doci_id']);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				
				if(mysqli_num_rows($result)>=1){
					{
		
				$count = 0;
				$arr = array();
				while($row = mysqli_fetch_assoc($result)){
						 
						$arr[] = $row;
				}
				
			}

			?>


			
			<?php		
			
			foreach($arr as $r){
			?>
					<tr>

						<td><?php echo $r['appoint_id']; ?></td>
						<td><?php echo $r['first_name']; ?></td>
						<td><?php echo $r['last_name']; ?></td>
						<td><?php echo $r['age']; ?></td>
						<td><?php echo $r['sex']; ?></td>
						<td><?php echo $r['contact']; ?></td>
						<td><?php echo $r['description']; ?></td>
						<td><?php echo $r['appointment_date']; ?></td>
						<td><?php echo $r['status']; ?></td>
					</tr>
				<?php }} ?>	

				</table>
				
			</div>

			<center>
			<form action="includes/doctorappointment.inc.php" method="POST">
				<br><br>
				<label> Enter appointment ID :</label><br><br>
				<input type="text" name="app_id"><br><br>
				<label>Enter Appointment Date :</label><br><br>
				<input type="date" name="app_date"><br><br>
				<label>Enter Appointment Time :</label><br><br>
				<input type="time" name="app_time"><br><br>
				<button type= "submit" name="app_accept">Accept</button>
				<button type= "submit" name="app_decline">Decline</button>
			</form>
			</center>

			
		</main>
</body>
</html>