<?php

if(isset($_POST['login-submit'])){

	require 'dbh.inc.php';

	 $mailuid = $_POST['uname'];
	 $password = $_POST['pwd'];

	 if(empty($mailuid) || empty($password)){
	 	header("Location: ../loginaspat.php?error=emptyfields");
		exit();
	 }
	 else{
	 	//might be an error
	 	$sql = "SELECT * FROM patientlogin WHERE patient_id=? OR email =?";
	 	$stmt = mysqli_stmt_init($conn);

	 	//mysqli_stmt_prepare() is used for checking if the sql would properly run on database or not
	 	if(!mysqli_stmt_prepare($stmt,$sql)){
	 		header("Location: ../loginaspat.php?error=sqlerror");
			exit();
	 	}
	 	else{

	 		// bind the input of the user into the DB
	 		mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
	 		mysqli_stmt_execute($stmt);

	 		$result = mysqli_stmt_get_result($stmt);
	 		if($row = mysqli_fetch_assoc($result)){
	 			$pwdCheck = password_verify($password, $row['password']);
	 			if($pwdCheck == false){
	 				header("Location: ../loginaspat.php?error=wrongpwd1");
					exit();
	 			}
	 			else if($pwdCheck == true){
	 				//login into the sys
	 				session_start();
	 				$_SESSION['patient_id'] = $row['patient_id'];
	 				$_SESSION['firstname'] = $row['first_name'];
	 				$_SESSION['lastname'] = $row['last_name'];
	 				$_SESSION['gender'] = $row['sex'];
	 				$_SESSION['patientage'] = $row['age'];
	 				$_SESSION['patientaddress'] = $row['address'];
	 				
	 				$_SESSION['mail'] = $row['email'];
	 				$_SESSION['phoneno'] = $row['contact'];
	 				header("Location: ../patientafterlogin.php?login=success");
					exit();

	 			}else{
	 				//in case of any discrepancy
	 				header("Location: ../loginaspat.php?error=wrongpwd");
					exit();
	 			}

	 		}else{
	 			header("Location: ../loginaspat.php?error=nouserwithenteredcredientials");
				exit();
	 		}
	 	}
	 }

}
else{
	header("Location: ../loginaspat.php");
		exit();
}