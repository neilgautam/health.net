<?php
	session_start();
	include 'dbh.inc.php';

 if(isset($_POST['appoint-abc'])){ 
 	$sql = "select doctor_id,doctor_first_name,doctor_last_name from doctorsrecord where department=?;";
 	
 	$dept = $_POST['dept'];

 	$stmt = mysqli_stmt_init($conn);
 	if(!mysqli_stmt_prepare($stmt,$sql)){
 			echo "SQL ERROR";
      }else{
 		mysqli_stmt_bind_param($stmt,"s",$dept);
 	    mysqli_stmt_execute($stmt);
 		$result = mysqli_stmt_get_result($stmt);
 		$data = array();
 		while ($row = mysqli_fetch_assoc($result)) {
 		 	$data[] = $row;
 		 }
 		$id_name = array();
 		$count = 0;
 		foreach($data as $val){
    //Print out the element if it isn't an array.
        if(!is_array($val)){
            echo $val, '<br>';
        }else{
    	   $temp_first = $val['doctor_first_name'];
    	   $temp_last = $val['doctor_last_name'];
    	   $temp_id = $val['doctor_id'];
    	   $temp_full = $temp_first." ".$temp_last;
    	   $temp_arr  = array("docid"=>$temp_id,"docname"=>$temp_full);
    	   $id_name[] = $temp_arr ;
     	 }
    }
    print_r($id_name);
}	
	
	$_SESSION['doc-name'] = $id_name;
	$_SESSION['dept'] = $dept;
	header("Location: ../appointment.php?dept=success");
		exit();
	
 		//print_r($data);
 }
 else if(isset($_POST['Submit-appointment'])){
 	$description = $_POST['descrip'];
 	$date = $_POST['date_of_appointment'];
 	$doc_id = $_POST['doctor-selection'];
 	$status = "Pending";
 	$dept = $_SESSION['dept'];
 	$pat_id = $_SESSION['patient_id'];


  $d1 = time();
# 1588497425  
  echo $d1;

$d2 = $date;
$d2 = strtotime($d2);

# 1588497425
  if($d1>$d2){
        $_SESSION['fail'] = "true";
         header("Location: ../appointment.php?error=appointmentDateInvalid");
       exit();
   
  }
  else{
    
  



    $sql  = "insert into appointment(doctor_id,patient_id,doc_name,department,description,appointment_date,status) values(?,?,?,?,?,?,?);";
 	$stmt = mysqli_stmt_init($conn);
 	if(!mysqli_stmt_prepare($stmt,$sql)){
 			echo "SQL ERROR";
      }

   
   	$sql_doc_name = "select doctor_first_name ,doctor_last_name from doctorsrecord where doctor_id= ?;";

   	$stmt2 = mysqli_stmt_init($conn);
   	mysqli_stmt_prepare($stmt2,$sql_doc_name);
   	mysqli_stmt_bind_param($stmt2,"i",$doc_id);
   	mysqli_stmt_execute($stmt2);

   	$temp_result = mysqli_stmt_get_result($stmt2);
   	$arr = array();
   	while($row = mysqli_fetch_assoc($temp_result)){
   		$arr[]= $row;
   		  }	
   	$val = $arr[0]["doctor_first_name"]." ".$arr[0]["doctor_last_name"];
   	
   	
   	if(!mysqli_stmt_bind_param($stmt,"issssss",$doc_id,$pat_id,$val,$dept,$description,$date,$status)){

   		echo "error !";
   	}
  	mysqli_stmt_execute($stmt);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  /*       $msg = "hey navdeep it is a demo of mail function!! ssup??";

// use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

// send email
        mail("1998navdeep@gmail.com","My subject",$msg);
///////////////////////////////////////////////////////////////////////////////////////////////////////////////// */

    header("Location: ../appointment.php?success");
    exit();


 }

}
 else{
 	header("Location: ../appointment.php?invalidaccess");
 	exit();
 }



