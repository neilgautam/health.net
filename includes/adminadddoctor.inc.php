<?php

if(isset($_POST['signup-submit'])){

  require 'dbh.inc.php';


		//fetching the info from form
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$dept = $_POST['dept'];

		$speciality = $_POST['spec'];
		$doj = $_POST['date_of_join'];

		$sex = $_POST['gender'];
		$age = $_POST['dob'];
		$address = $_POST['address'];
		$salary = $_POST['Salary'];
		$email = $_POST['mail'];
		$password= $_POST['pwd'];
		$passwordRepeat = $_POST['pwd2'];
		$mobile =$_POST['phone'];

		//error handelers

		//1. empty fields error
		if(empty($firstname) || empty($lastname) ||empty($sex) ||empty($age) ||empty($address) || empty($email) ||empty($password) || empty($passwordRepeat) || empty($mobile)){
			header("Location: ../adminadddoctor.php?error=emptyfields&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&address=".$address."&mail=".$email."&phone=".$mobile);
			exit();
		} 

		//for invalid email
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location: ../adminadddoctor.php?error=invalidemail&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&address=".$address."&phone=".$mobile);
			exit();
		}

		

		//password matching
		else if($password !== $passwordRepeat){
			header("Location: ../adminadddoctor.php?error=passwordcheck&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&address=".$address."&mail=".$email."&phone=".$mobile);
			exit();
		}

		//if user already exists or not
		else {
			$sql = "insert into doctorsrecord(doc_password, doctor_first_name, doctor_last_name,department,speciality,date_of_join,sex,email,contact,address,date_of_birth,salary) values( ?, ?, ?, ?, ?,?,?,?,?,?,?,?);";
			$stmt = mysqli_stmt_init($conn);

			//if the connection fails
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../adminadddoctor.php?error=sqlerror1");
			exit();
			}
			else{
				//binding the data sent by the user to the database 
				session_start();
				mysqli_stmt_bind_param($stmt,"ssssssssssss",$password,$firstname,$lastname,$dept,$speciality,$doj,$sex,$email,$mobile,$address,$age,$salary);
				mysqli_stmt_execute($stmt);
				$sql1 = "select doctor_id from doctorsrecord where contact==$mobile and email==$email;";
				$id= mysqli_execute($sql1);
				header("Location: ../adminadddoctor.php");
				exit();


				}
			}
		}
		/*		//storing the result from the database back in the variable stmt
				mysqli_stmt_store_result($stmt);

				//count of how many rows of result do we get from database
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck >0){
					header("Location: ../signupaspat.php?error=usernametaken&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&message=".$address."&uid=".$username."&mail=".$email."&phone=".$mobile);
					exit();
				}
				else{
					//inserting into database
					$sql = "INSERT INTO patientsignup (fname,lname,sex,age,address,userid,email,pwd,mobile) VALUES (?,?,?,?,?,?,?,?,?)";
					$stmt = mysqli_stmt_init($conn);

						//if the connection fails(if the sql statement does not run properly)
					if(!mysqli_stmt_prepare($stmt,$sql)){
						header("Location: ../signupaspat.php?error=sqlerror");
						exit();
					}
					else{
						//binding the data sent by the user to the database 
						//hashing the password
						$hashedPwd = password_hash($password,PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt,"sssisssss",$firstname,$lastname,$sex,$age,$address,$username,$email,$hashedPwd,$mobile);
						mysqli_stmt_execute($stmt);

						//success message
						header("Location: ../signupaspat.php?signup=success");
						exit();
					}

				}
			}

		}
		//closing all the connection to the database
		mysqli_stmt_close($stmt);
		mysqli_close(conn);
	}else{
		//if the havent accesed the page by clicking the signup button
		header("Location: ../signupaspat.php");
		exit();

	}
 




}
*/