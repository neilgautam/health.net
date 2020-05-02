<?php
include 'includes/dbh.inc.php';
	session_start();
	$_SESSION['dept'] = 'None';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css"  href="style.css">
	<title>ABC Hospital</title>
	<style >
		background-image: url("images/docpic.jpg");
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
		<center>
		<form action = "includes/appointment.inc.php " method = "POST">
					<label for="dept"style = "padding: 30px auto;">Choose Department</label>
					<br>
						<select id="" name="dept">
  							  <option value="ENT">ENT</option>
 							  <option value="Neurology">Neurology</option>
 							  <option value="Neuroanat">Neuroanat</option>
 							  <option value="Opthalomogist">Opthalmologist</option>
							  <option value="Pediatrics">Pediatrics</option>
							  <option value="gynaecology">Gynacology</option>
							  <option value="Dental Care">Dental Care</option>
							  <option value="General Physician">General Physician</option>
							  <option value="Endocrinology">Endocrinology</option>
						</select>

						<button type = submit name = "appoint-abc">Submit </button>

				</form>


				</center>
				<center>
					<br>

					<form action="includes/appointment.inc.php"  method="POST">
					<label style="padding: 30px auto">Choose Your Doctor in <?php echo $_SESSION['dept'];?></label>
					<br>
					<select name="doctor-selection">
        				<option selected="selected">Choose one</option>
					<?php
						foreach($_SESSION['doc-name'] as $item){
					?>
					<option value=<?php echo $item['docid']; ?>><?php echo $item['docname']; ?></option>
					<?php
       					 }
       				 ?>
  				 	 </select>
  				 	 <br>
  				 	 <br>
  				 	 <label> Enter The Date of Appointment</label>
  				 	 <br>
  				 	 <input type="Date" name="date_of_appointment">
  				 	 <br><br>
  				 	 <label> Description :</label><br>
  				 	 <input type="text" name="descrip" placeholder="Describe your problem : " style= "height:100px; width:500px; font-size:10pt;" ><br><br>

   					 <button type="submit" name="Submit-appointment" >Submit</button> 
   					 </form>
				</center>
	</main>
</body>
</html>

