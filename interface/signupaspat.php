<!DOCTYPE html>
<html>
<head>
	<title>patient signup</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="loginstyle.css">



</head>
<body>

	<div class="container">
		<div class="login">
	<h2>Signup as Patient</h2>
	<form action="includes/signupaspat.inc.php" method="post">
		<label for ="fname">First name: </label><br>
		<input type="text" name="fname" placeholder="Enter First name"><br>
		<label for="lname">Last name: </label><br>
		<input type="text" name="lname" placeholder="Enter last name"><br>

		<label>Sex: </label><br>
		  <input type="radio" id="male" name="gender" value="male">
  		  <label for="male">Male</label><br>
 		  <input type="radio" id="female" name="gender" value="female">
 		 <label for="female">Female</label><br>
 		 <input type="radio" id="other" name="gender" value="other">
 		 <label for="other">Other</label><br>

 		 <label for= "age">Age:</label>
 		 <input type="text" name="age" placeholder="Enter age"><br>
 		 <br> 
 		 <label for= "address">Address: </label><br>
 		 <textarea name ="message" placeholder="Enter your address!"></textarea><br>

 		 <input type="text" name="uid" placeholder="choose a username"><br>
 		 <input type="text" name="mail" placeholder="Enter your E-mail id!"><br>
 		 <input type="password" name="pwd" placeholder="choose a password"><br>
 		 <input type="password" name="pwd2" placeholder="repeat password"><br>

 		 <input type="text" name="phone" placeholder="enter mobile no."><br>
 		<p class =submit><button type= "submit" name= "signup-submit">Signup</button></p>

	</form>
</body>
</html>