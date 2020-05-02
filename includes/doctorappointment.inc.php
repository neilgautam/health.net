<?php

require 'dbh.inc.php';
session_start();

if(isset($_POST['app_decline'])){

	$curr_status = "Cancelled";
	$app_id = $_POST['app_id'];

	$stmt = mysqli_stmt_init($conn);
	$sql = "update appointment set status = ? where appoint_id = ?;";

	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "SQL ERROR";
	}
	mysqli_stmt_bind_param($stmt,"si",$curr_status,$app_id);
	mysqli_stmt_execute($stmt);
	echo("Appointment Cancelled!");


}else if(isset($_POST['app_accept'])){
	
	$app_id = $_POST['app_id'];
	$app_date = $_POST['app_date'];
	$app_time = $_POST['app_time'];
	$curr_status = "Confirmed";
	$stmt = mysqli_stmt_init($conn);
	$sql = "update appointment set appointment_date = ?, appointment_time = ? ,status = ? where appoint_id = ?;";
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "SQL ERROR";
	}
	mysqli_stmt_bind_param($stmt,"sssi",$app_date,$app_time,$curr_status,$app_id);
	mysqli_stmt_execute($stmt);
	echo("Appointment Confirmed !");
}else{
	header("Location: ../doctorappointment.php?error=invalidaccess");
	exit();
}