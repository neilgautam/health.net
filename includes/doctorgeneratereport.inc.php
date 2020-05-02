<?php 

if(isset($_POST['search-profile'])){

	include 'dbh.inc.php';
	session_start();

	$search_id = $_POST['id_1'];
	$_SESSION['sid'] = $search_id;
	$sql_pat_details = "select first_name,last_name,sex,age,contact from patientlogin where patient_id = ?;";
	$sql_pat_appointments = "select * from appointment as a ,diagnosis as d where a.patient_id = d.patient_id  and a.appoint_id  = d.appoint_id and a.status = 'confirmed' and d.patient_id = ?;";
	$stmt1 = mysqli_stmt_init($conn);
	$stmt2 = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt1,$sql_pat_details)){
		echo "SQL ERROR";
	} 
	else{
		mysqli_stmt_bind_param($stmt1,"s",$search_id);
		mysqli_stmt_execute($stmt1);
		$table_result = mysqli_stmt_get_result($stmt1);
		if( mysqli_num_rows($table_result)==1){
			echo "RECORD";
			$temp_arr = array();
		while($row = mysqli_fetch_assoc($table_result)){
				$temp_arr[] = $row;
				$_SESSION['pat_fname'] = $row['first_name'];
				$_SESSION['pat_lname'] = $row['last_name'];
				
				$_SESSION['pat_age'] = $row['age'];
				$_SESSION['contact'] = $row['contact'];
				$_SESSION['pat_sex'] = $row['sex'];
		}}
			print_r($temp_arr);
			header("Location: ../doctorgeneratereport.php?success");
			exit();
	}
		
}

?>