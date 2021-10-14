<!DOCTYPE html>
<html lang="en">
<head>

  <title>Bootstrap Website</title>
  <meta charset="utf-8">
  <!--Used bootstrap to make the webpage more responsive and goodlooking while in the mobile view-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  </style>
</head>
<body>
<!-- POST method used to insert all the registration details to the students/staff table -->
<?php

include('db_conn.php');
$ID=$_POST['id'];
$username= $_POST['name'];
$email=$_POST['email'];
$password= $_POST['password'];
$confpass=$_POST['conpassword'];
$qualification=$_POST['RD1'];
$date=$_POST['date'];
$expertise=$_POST['expertise'];
$address=$_POST['address'];
$phone=$_POST['phone'];


// Get the hash, letting the salt be automatically generated. Used for encryption of password
$hash = crypt($password,rd);
$conf= crypt($confpass,rd);


$query = "INSERT INTO students(ID,Name,Email,password,confirm,qualification,DOB,expertise,address,phone)
VALUES ('$ID','$username','$email','$hash','$conf','$qualification','$date','$expertise','$address','$phone')";
$result = $mysqli -> query($query);
?>


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     	  <img src="images.jpg" height="50" width="50">
		  <a class="navbar-brand">University of Dowell</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	          <li><a href="webpage.html">Home</a></li>
        <li><a href="UDW.php">Login</a></li>
		<li><a href="enrol.php">Enrol</a></li>
        <li><a href="register.html">Register</a></li>
		        <li><a href="ICT.php">Allocate</a></li>
		        <li><a href="MyTimetable.html">MyTimetable</a></li>
				        <li><a href="Unitoutline.html">Units Handbook</a></li>
		

      </ul>
    </div>

  </div>
</nav>
    </br>
    <h1>Registration for student/staff</h1>
	<br>
	<div>
	<form id="form" onsubmit="return validate();" action="register.php" method="POST">
	<br>
StudentID/staffID:<input type="text" id="id" name="id"><br>
<br>
Name:<input type="text" id="lname" name="name"><br><br>
Email:<input type="text" id="mail" name="email"><br>
<br>
Password:<input type="password" id="pass" name="password"><br>
<br>
Confirm Password:<input type="password" id="passcon" name="conpassword"><br>
<br>
<p>Position:</p>
Student<input type="radio" id="male" name="RD1" value="Student" required>
<br>
DC<input type="radio" id="female" name="RD1" value="DC" required>
<br>
Unit Co-ordinator<input type="radio" id="unspecified" name="RD1" value="UC" required>
<br>
Lecturer<input type="radio" id="unspecified" name="RD1" value="Lecturer" required><br>
Tutor<input type="radio" id="unspecified" name="RD1" value="Tutor" required><br>
Expertise and qualification:<input type="text" id="expert" name="expertise"><br><br>
DOB(Date of Birth):<input type="date" id="dob" name="date"><br>
<br>
Address:<input type="text" id="add" name="address"><br>
<br>
Phone number:<input type="number" id="phno" name="phone"><br>
<br>
<br>
<input type="submit" id="b_submit" value="submit"/>
</form>
</div>
</div>
<!-- Used javascript to check if the fields have any values in them before submitting the form -->
<script>
function validate(){
			var pass = document.getElementById('pass');
	var upperCase= new RegExp('[^A-Z]');
var lowerCase= new RegExp('[^a-z]');
var numbers = "[^0-9]";
var special= "[!@#$%^&*]";
var pattern="@.";

	console.log("button clicked");

   if($('#id').val() == ''){
      alert('Enter your studentID/staffID');
	  	  return false;
   }
      else if($('#lname').val() == ''){
      alert('Enter your name');
	  return false;
	  
   }
         else if($('#mail').val() == ''){
      alert('Enter your mail');
	  	  return false;
   }
        else if(!mail.value.match(pattern)){
	 alert("email address in wrong format");
	 	  return false;
 }
      else if($('#pass').val() == ''){
      alert('Enter your password');
	  	  return false;
   }
    else if($('#RD1').val() == ''){
      alert('please select your role');
	  	  return false;
   }
    else if($('#passcon').val() == ''){
      alert('Please confirm your password');
	  	  return false;
   }

    else if($('#passcon').val() != $('#pass').val()){
      alert('Wrong password for confirming');
	  	  return false;
   }
   else if(pass.value.length < 6 ||pass.value.length > 12 || !pass.value.match(upperCase)|| !pass.value.match(lowerCase) || !pass.value.match(numbers) ||!pass.value.match(special)){
		 alert("Password has to be more than 6 characters,have one lower case character,one uppercase character and one number");
		 	  return false;
	 }
	 else{
		 alert("Record successfully added");
	 }

}</script>
</body>
</html>