<?php

if(isset($_POST['login-submit'])){

	require 'dbh.inc.php';

	 $mailuid = $_POST['uname'];
	 $password = $_POST['pwd'];

	 //empty fields
	 if(empty($mailuid) || empty($password)){
	 	header("Location: ../doctorlogin.php?error=emptyfields");
		exit();
	 }

	 else{
	 	//might be an error
	 	$sql = "SELECT * FROM doctorsrecord WHERE doctor_id=?";
	 	$stmt = mysqli_stmt_init($conn);

	 	//mysqli_stmt_prepare() is used for checking if the sql would properly run on database or not
	 	if(!mysqli_stmt_prepare($stmt,$sql)){
	 		header("Location: ../doctorlogin.php?error=sqlerror");
			exit();
	 	}
	 	else{

	 		// bind the input of the user into the DB
	 		mysqli_stmt_bind_param($stmt,"s",$mailuid);
	 		mysqli_stmt_execute($stmt);

	 		$result = mysqli_stmt_get_result($stmt);
	 		if($row = mysqli_fetch_assoc($result)){
	 			
	 			if($password!= $row['doc_password']){
	 				header("Location: ../doctorlogin.php?error=wrongpwd1");
					exit();
	 			}
	 			else if($password == $row['doc_password']){
	 				//login into the sys
	 				session_start();
	 				$_SESSION['doc_fname'] = $row['doctor_first_name'];
	 				$_SESSION['doc_lname'] = $row['doctor_last_name'];
	 				$_SESSION['doc_dept'] = $row['department'];
	 				$_SESSION['doc_spec'] = $row['speciality'];
	 				$_SESSION['doc_doj'] = $row['date_of_join'];
	 				$_SESSION['doc_sex'] = $row['sex'];
	 				$_SESSION['doc_email'] = $row['email'];
	 				$_SESSION['doc_contact'] = $row['contact'];
	 				$_SESSION['doc_address'] = $row['address'];
	 				$_SESSION['doc_dob'] = $row['date_of_birth'];
	 				$_SESSION['doc_salary'] = $row['salary'];

	 				header("Location: ../doctorafterlogin.php?login=success");
					exit();

	 			}else{
	 				//in case of any discrepancy
	 				header("Location: ../doctorlogin.php?error=wrongpwd");
					exit();
	 			}

	 		}else{
	 			header("Location: ../doctorlogin.php?error=nouserwithenteredcredientials");
				exit();
	 		}
	 	}
	 }

}
else{
	header("Location: ../doctorlogin.php");
		exit();
}