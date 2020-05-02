<?php
 session_start();

 if(isset($_POST['doctor_patient_fillup'])){
 	require 'dbh.inc.php';
 	$appoint_id = $_POST['appointment_id'];
 	$_SESSION['app_id'] = $appoint_id;
 	if(empty($appoint_id)){
 		header("Location: ../doctorpatientfillup.php?error=emptyfields!");
 		exit();
 	}else{
 		$sql = "select  patient_id,first_name,last_name,age,sex,contact,email,address from patientlogin where patient_id in (select patient_id from appointment where appoint_id = ? and doctor_id = ?);";
 		$stmt = mysqli_stmt_init($conn);
 		if(!mysqli_stmt_prepare($stmt,$sql)){
 			echo "SQL ERROR ";
 		}
 		else{
 			mysqli_stmt_bind_param($stmt,"ii",$appoint_id,$_SESSION['doci_id']);
 			mysqli_stmt_execute($stmt);
 			$result = mysqli_stmt_get_result($stmt);
 			$row = mysqli_fetch_assoc($result);

 			$_SESSION['PAT_FN'] = $row['first_name'];
 			$_SESSION['PAT_LN'] = $row['last_name'];
 			$_SESSION['PAT_AGE'] = $row['age'];
 			$_SESSION['PAT_SEX'] = $row['sex'];
 			$_SESSION['PAT_ADDRESS'] = $row['address'];
 			$_SESSION['PAT_EMAIL'] = $row['email'];
 			$_SESSION['PAT_CONTACT'] = $row['contact'];
 			$_SESSION['PAT_ID'] = $row['patient_id'];
 			header("Location: ../doctorpatientfillup.php?success");
 			exit();

 		}

 	}

 }else if(isset($_POST['doc_fill'])){
 		require 'dbh.inc.php';
 		$med_pres = $_POST['med_pres'];
 		$test_pres = $_POST['tests_pres'];
 		$observ_commt = $_POST['observ_commt'];
 		$disease = $_POST['disease'];
 		$stmt = mysqli_stmt_init($conn);
 		$aid = $_SESSION['app_id'];
 		$pid = $_SESSION['PAT_ID'];

 		$sql = "insert into diagnosis(patient_id,appoint_id,medicine_prescribed,prescribed_tests,observation_comments,disease)values (?,?,?,?,?,?);";

 		if(!mysqli_stmt_prepare($stmt,$sql)){
 			echo "SQL ERROR ";
 		}else{
 			mysqli_stmt_bind_param($stmt,"sissss",$pid,$aid,$med_pres,$test_pres,$observ_commt,$disease);
 			mysqli_stmt_execute($stmt);
 			header("Location: ../doctorpatientfillup.php?insert=success");
 			exit();
 		}

 }
 else{
 	header("Location: ../doctorpatientfillup.php?invalid_access");
 	exit();
 }
?>