<?php

if(isset($_POST['submit'])){

	require 'dbh.inc.php';

	//search 


	 $docid = $_POST['doctor_id'];
	 $feature_count = $_POST['no_of_fields'];

	 if(empty($docid) || empty($feature_count)){
	 	header("Location: ../adminmodify.php?error=emptyfields");
		exit();
	 }
	 else{
	 	//might be an error
	 	$sql = "SELECT * FROM doctorsrecord WHERE doctor_id=?";
	 	$stmt = mysqli_stmt_init($conn);

	 	//mysqli_stmt_prepare() is used for checking if the sql would properly run on database or not
	 	if(!mysqli_stmt_prepare($stmt,$sql)){
	 		header("Location: ../adminmodify.php.php?error=sqlerror");
			exit();
	 	}
	 	else{

	 		// bind the input of the user into the DB
	 		mysqli_stmt_bind_param($stmt,"s",$docid);
	 		mysqli_stmt_execute($stmt);

	 		$result = mysqli_stmt_get_result($stmt);


	 		if($row = mysqli_fetch_assoc($result)){
	 			
	 			
	 				//login into the sys
	 				session_start();
	 				$_SESSION['doctor_id'] = $row['doctor_id'];
	 				$_SESSION['doc_firstname'] = $row['doctor_first_name'];
	 				$_SESSION['doc_lastname'] = $row['doctor_last_name'];
	 				$_SESSION['doc_depr'] = $row['department'];
	 				$_SESSION['doc_speciality'] = $row['speciality'];
	 				$_SESSION['doc_password'] = $row['doc_password'];
	 				$_SESSION['doc_doj'] = $row['date_of_join'];

	 				$_SESSION['doc_gender'] = $row['sex'];
	 				$_SESSION['doc_email'] = $row['email'];
	 				$_SESSION['doc_contact'] = $row['contact'];
	 				$_SESSION['doc_address'] = $row['address'];
	 				$_SESSION['doc_dob'] = $row['date_of_birth'];
	 				$_SESSION['doc_salary'] = $row['salary'];

	 			
	 				header("Location: ../loginaspat.php?login=success");
					exit();

	 		}else{
	 			header("Location: ../adminmodify.php?error=nouserwithenteredcredientials");
				exit();
	 		}
	 	}
	 }

}
else{
	header("Location: ../loginaspat.php");
		exit();
}