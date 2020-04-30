<?php
session_start();
include "dbh.inc.php";
	$sql = "select * from appointment where patient_id = ? ;";
	$pid  = $_SESSION["patient_id"];
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
 			echo "SQL ERROR";
      }
      mysqli_stmt_prepare($stmt,$sql);
      mysqli_bind_param($stmt,"s",$pid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      

?>