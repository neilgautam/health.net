<?php 
	
	if(isset($_POST['signup-submit'])){

		require 'dbh.inc.php';

		//fetching the info from form
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$sex = $_POST['gender'];
		$age = $_POST['age'];
		$address = $_POST['message'];
		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password= $_POST['pwd'];
		$passwordRepeat = $_POST['pwd2'];
		$mobile =$_POST['phone'];

		//error handelers

		//1. empty fields error
		if(empty($firstname) || empty($lastname) ||empty($sex) ||empty($age) ||empty($address) ||empty($username) || empty($email) ||empty($password) || empty($passwordRepeat) || empty($mobile)){
			header("Location: ../signupaspat.php?error=emptyfields&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&message=".$address."&uid=".$username."&mail=".$email."&phone=".$mobile);
			exit();
		} 

		else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header(("Location: ../signupaspat.php?error=invalidmailanduid"));
			exit();
		}

		//for invalid email
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			header("Location: ../signupaspat.php?error=invalidemail&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&message=".$address."&uid=".$username."&phone=".$mobile);
			exit();
		}

		//check for valid username by using search pattern
		else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header("Location: ../signupaspat.php?error=invaliduid&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&message=".$address."&mail=".$email."&phone=".$mobile);
			exit();
		}

		//password matching
		else if($password !== $passwordRepeat){
			header("Location: ../signupaspat.php?error=passwordcheck&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&message=".$address."&uid=".$username."&mail=".$email."&phone=".$mobile);
			exit();
		}

		//if user already exists or not
		else {
			$sql = "SELECT patient_id FROM patientlogin WHERE patient_id =?";
			$stmt = mysqli_stmt_init($conn);

			//if the connection fails
			if(!mysqli_stmt_prepare($stmt,$sql)){
				header("Location: ../signupaspat.php?error=sqlerror1");
			exit();
			}
			else{
				//binding the data sent by the user to the database 
				mysqli_stmt_bind_param($stmt,"s",$username);
				mysqli_stmt_execute($stmt);

				//storing the result from the database back in the variable stmt
				mysqli_stmt_store_result($stmt);

				//count of how many rows of result do we get from database
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck >0){
					header("Location: ../signupaspat.php?error=usernametaken&fname=".$firstname."&lname=".$lastname."&gender=".$sex."&age=".$age."&message=".$address."&uid=".$username."&mail=".$email."&phone=".$mobile);
					exit();
				}
				else{
					//inserting into database
					$sql = "INSERT INTO patientlogin(password,first_name,last_name,age,sex,address,email,contact,patient_id) VALUES (?,?,?,?,?,?,?,?,?);";
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
						mysqli_stmt_bind_param($stmt,"sssisssis",$hashedPwd,$firstname,$lastname,$age,$sex,$address,$email,$mobile,$username);
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
 