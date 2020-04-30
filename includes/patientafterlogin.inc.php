<?php

session_start();

if(isset($_POST['edit-profile'])){

	require 'dbh.inc.php';

	$patient_id = $_POST['id_1'];
	 $firstname = $_POST['id_2'];;
	  $lastname =$_POST['id_3'];
	 	$gender =$_POST['id_4'];
	 	$patientage =$_POST['id_5'];
	 	$patientaddress =$_POST['id_6'];		
	 	$mail = $_POST['id_7'];
	 	$phoneno = $_POST['id_8']; 

	 	if(empty($patient_id) || empty($firstname) ||empty($lastname) ||empty($gender) ||empty($patientage) ||empty($patientaddress) ||empty($mail) ||empty($phoneno )){
	 		header("Location: ../patientafterlogin.php?error=emptyfields");
	 	}else{
	 		$sql = "update patientlogin set first_name =?, last_name = ?, age = ?, sex= ? ,address = ?,email = ?,contact = ? where patient_id = ?;";
	 		$stmt = mysqli_stmt_init($conn);

	 		if(!mysqli_stmt_prepare($stmt,$sql)){
	 			header("Location: ../patientafterlogin.php?error=sqlerror");
	 			exit();
	 		}else{
	 			mysqli_stmt_bind_param($stmt,"ssisssis",$firstname,$lastname,$patientage,$gender,$patientaddress,$mail,$phoneno,$patient_id);
	 			mysqli_stmt_execute($stmt);
	 			$_SESSION['patient_update'] = "true";
	 			header("Location: ../patientafterlogin.php?status=updatedsuccessfully");
	 			exit();
	 		}

	 	}


}else{
	header("Location: ../patientafterlogin.php?error=invalidaccess");
	exit();
}


