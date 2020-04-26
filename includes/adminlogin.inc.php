<?php

if(isset($_POST['login-submit'])){


	require 'dbh.inc.php';
	echo "1";


	$mailuid = $_POST['uname'];
	$password = $_POST['pwd'];

	if(empty($mailuid) || empty($password)){
		echo "2";
	 	header("Location: ../adminlogin.php?error=emptyfields");
		exit();
	 }
	 else{
	 	//might be an error
	 	echo "3";
	 	$sql = "SELECT * FROM adminloginrecord WHERE user_id=?";
	 	$stmt = mysqli_stmt_init($conn);
	 	echo "4";

	 	//mysqli_stmt_prepare() is used for checking if the sql would properly run on database or not
	 	if(!mysqli_stmt_prepare($stmt,$sql)){
	 		header("Location: ../adminlogin.php?error=sqlerror");
			exit();
	 	}
	 	else{

	 		// bind the input of the user into the DB
	 		mysqli_stmt_bind_param($stmt,"s",$mailuid);
	 		mysqli_stmt_execute($stmt);

	 		$result = mysqli_stmt_get_result($stmt);

	 		if($row = mysqli_fetch_assoc($result)){
	 			$pwdCheck = $password == $row['pwd'];
	 			
	 			
	 			if($password == $row['pwd']){
	 				header("Location: ../adminlogin.php?error=wrongpwd1");
					exit();
	 			}
	 			else if($password != $row['pwd']){
	 				//login into the sys
	 				echo "correct Password";
	 				session_start();

	 				//jump to adminafterlogin.php
	 				header("Location: ../adminafterlogin.php");
	 				exit();
	 		/*		$_SESSION['doctor_id'] = $row['idpat'];
	 				$_SESSION[''] = $row['fname'];
	 				$_SESSION['lastname'] = $row['lname'];
	 				$_SESSION['gender'] = $row['sex'];
	 				$_SESSION['patientage'] = $row['age'];
	 				$_SESSION['patientaddress'] = $row['address'];
	 				$_SESSION['uid'] = $row['userid'];
	 				$_SESSION['mail'] = $row['email'];
	 				$_SESSION['phoneno'] = $row['mobile'];
	 				header("Location: ../loginaspat.php?login=success");
					exit();
*/
	 			}
	 			else{
	 				//in case of any discrepancy
	 				header("Location: ../adminlogin.php?error=wrongpwd");
					exit();
	 			}

	 		}else{
	 			header("Location: ../adminlogin.php?error=nouserwithenteredcredientials");
				exit();
	 		}
	 	}
	 }

}
else{
	header("Location: ../adminlogin.php");
		exit();
}