<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type = "text/css"  href="style.css">
	<title>ABC Hospital</title>
	
</head>
<body>
	<header>
		<div class="upmost">
		<h2 class = "logo">health.NET</h2>
		</div>
		<nav class = "head-master">
				<ul class = "head-ulist">
					<li class ="head-list"><a href="adminafterlogin.php"  style = " padding : 0 105px"  class = "head-a">ADMIN HOME</a></li>
					<li class ="head-list"><a href="adminadddoctor.php"  style = " padding : 0 105px"  class = "head-a">ADD DOCTOR</a></li>
				
					<li class ="head-list"><a href="adminmodify.php"  style = " padding : 0 105px"  class = "head-a">MODIFY DATABASE</a></li>
					<li class ="head-list"><a href="includes/logout.inc.php" style = " padding : 0 105px"  class = "head-a">LOGOUT</a></li>
				</ul>
		</nav>


	</header>

	<main>

		<!--error-->
		<?php
		if(isset($_POST['signup-submit'])){
			if($id != Null){
			echo '<h3 style="color: green">new record of doctor successfully added in DATABASE!</h3>';
			}
		}
		?>


		<div class="container">
		<form action="includes/adminadddoctor.inc.php" method="post">
			<div class="row">
    <div class="col-25">
		<label for ="fname">First name: </label><br>
		</div>
    <div class="col-75">
		<input type="text" name="fname" placeholder="Enter First name"><br>    </div>
  </div>
  <div class="row">
    <div class="col-25">
		<label for="lname">Last name: </label><br>
		</div>
    <div class="col-75">
		<input type="text" name="lname" placeholder="Enter last name"><br>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
		<label>Sex: </label><br>
		</div>
  
		  <input type="radio" id="male" name="gender" value="male">    
  
  		  <label for="male">Male</label>
  	
 		  <input type="radio" id="female" name="gender" value="female">

 		 <label for="female">Female</label>
 	
    
 		 <input type="radio" id="other" name="gender" value="other">   
  
    
 		 <label for="other">Other</label><br>    
 
</div>

 
  <div class="row">
    <div class="col-25">

 		 <label for= "dob">Date of Birth</label>
 		 </div>
    <div class="col-75">
 		 <input type="text" name="dob" placeholder="yyyy/mm/dd"><br>
 		 <br>     </div>
  </div>
  <div class="row">
    <div class="col-25">
 		 <label for= "address">Address: </label><br>
 		 </div>
    <div class="col-75">
 		 <textarea name ="address" placeholder="Enter your address!"></textarea><br>    </div>
  </div>
  <div class="row">
    <div class="col-25">

 		 <label for= "dept">Department: </label>
 		 </div>
    <div class="col-75">
 		 <input type="text" name="dept" placeholder="enter the Department!"><br>
 		 <br>    </div>
  </div>
  <div class="row">
    <div class="col-25">
 		 <label for= "speciality">Speciality: </label>
 		 </div>
    <div class="col-75">
 		 <input type="text" name="spec" placeholder="Speciality of Doctor"><br>
 		 <br>    </div>
  </div>
  <div class="row">
    <div class="col-25">
 		 <label for= "dateofjoin">Date of Joining: </label>
 		 </div>
    <div class="col-75">
 		 <input type="text" name="date_of_join" placeholder="yyyy/mm/dd"><br>
 		 <br>    </div>
  </div>
  <div class="row">
    <div class="col-25">
 		 <label for= "salary">Salary: </label>
 		 </div>
    <div class="col-75">
 		 <input type="text" name="Salary" placeholder="Enter Salary Amount!"><br>
 		 <br>
 		 </div>
  </div>
  <div class="row">
    <div class="col-25">
    	<label> Email ID</label>
    	</div>
    <div class="col-75">
 		 <input type="text" name="mail" placeholder="Enter your E-mail id!"><br>
 		     </div>
  </div>
  <div class="row">
    <div class="col-25">

   		<label> Enter Password</label>
   		</div>
    <div class="col-75">
 		 <input type="password" name="pwd" placeholder="choose a password"><br>
 		     </div>
  </div>
  <div class="row">
    <div class="col-25">
 		 <label> Repeat Password</label>
 		 </div>
    <div class="col-75">
 		 <input type="password" name="pwd2" placeholder="repeat password"><br>
		    </div>
  </div>


  <div class="row">
    <div class="col-25">
		<label> Enter Contact NO.</label>
		</div>
    <div class="col-75">
 		 <input type="text" name="phone" placeholder="enter mobile no."><br>
 		 </div>
  </div>
  <div class="row">
 		 <button type= "submit" name= "signup-submit">Signup</button>
 		 </div>
 		 <?php 

		if(isset($_POST['signup-submit'])){
			if($id != Null){
			echo '<h3 style="color: green">new record of doctor successfully added in DATABASE!</h3>';
			}
		}
		?>

	</form>


	</main>


</body>


</html>