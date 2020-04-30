<?php

if(isset($_POST['admin_modify_submit'])){

	require 'dbh.inc.php';

	//search 


	 $docid = $_POST['doctor_id'];
	 

	 if(empty($docid)){
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
	 		mysqli_stmt_bind_param($stmt,"i",$docid);
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
	 				
	 				$_SESSION['doc_doj'] = $row['date_of_join'];

	 				$_SESSION['doc_gender'] = $row['sex'];
	 				$_SESSION['doc_email'] = $row['email'];
	 				$_SESSION['doc_contact'] = $row['contact'];
	 				$_SESSION['doc_address'] = $row['address'];
	 				$_SESSION['doc_dob'] = $row['date_of_birth'];
	 				$_SESSION['doc_salary'] = $row['salary'];

	 			
	 				header("Location: ../adminmodify.php?doc_id_submit=success");
					exit();

	 		}else{
	 			header("Location: ../adminmodify.php?error=nouserwithenteredcredientials");
				exit();
	 		}
	 	}
	 }

}
else if(isset($_POST['admin_edit'])){
	
	session_start();
	require 'dbh.inc.php';

	$d_fn = $_POST['doc_1'];
	$d_ln = $_POST['doc_2'];
	$d_dept = $_POST['doc_3'];

	$d_spec = $_POST['doc_4'];
	$d_doj = $_POST['doc_5'];
	$d_sex = $_POST['doc_6'];
	$d_email = $_POST['doc_7'];
	$d_contact = $_POST['doc_8'];
	$d_address = $_POST['doc_9'];
	$d_dob = $_POST['doc_10'];
	$d_salary = $_POST['doc_11'];
	

	$sql= "update doctorsrecord set doctor_first_name = ?,doctor_last_name = ?,department = ?, speciality =?,date_of_join =?, sex =? ,email =?,contact =?,address = ?, date_of_birth = ?, salary = ?  WHERE doctor_id = ?;";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$sql)){
		print("SQL ERROR");
		header("Location: ../adminmodify.php?error=sqlerror");
		exit();
	}else{
		
		mysqli_stmt_bind_param($stmt,"sssssssssssi",$d_fn,$d_ln,$d_dept,$d_spec,$d_doj,$d_sex,$d_email,$d_contact,$d_address,$d_dob,$d_salary,$_SESSION['doctor_id']);
		
		mysqli_stmt_execute($stmt);
		
		header("Location: ../adminmodify.php?admin_edit=success");
		exit();
	}

}


else{
	header("Location: ../adminafterlogin.php");
		exit();
}