<?php
//include the file session.php
include("session.php");

//if the session for username has been set, automatically go to "signin_success.php"
if($session_user!="") {
	header('location: ./signin_success.php');
}

//if there is any received error message 
if(isset($_GET['error']))
{
	$errormessage=$_GET['error'];
	//show error message using javascript alert
	echo "<script>alert('$errormessage');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Bootstrap Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	    <link rel="stylesheet" href="udw.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  </style>
</head>
<body>



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
	          <li><a href="webpage.php">Home</a></li>
        <li><a href="UDW.html">Login</a></li>
		<li><a href="enrol.html">Enrol</a></li>
        <li><a href="register.php">Register</a></li>
		        <li><a href="MyTimetable.html">MyTimetable</a></li>
				        <li><a href="Unitoutline.html">Units Handbook</a></li>
		

      </ul>
    </div>

  </div>
</nav>
<div class="pageHeader">
    </br>
    <h1><strong>User Login<strong></h1>
	<br>
</div>
<div class="loginInput" id="divi">
    <form action="signin_engine.php" method="post">
    <strong>Email:</strong> <input type="text" id="email" name="Email" required></br> 
	<br>
    <strong>Password:</strong> <input type="password" id="wordpass" name="password" required> </br>
	<br>
<input type="submit" name="bb4" value="Login" class="btn btn-success">
<button type="button" class="btn btn-danger" id="bb2"><a href="register.php" style="color:black">Not registered?</button>
<a href="reset-password.php" style="color:black">Forgot your password?</a>
<br><br>
</div>
	</body>
	</html>


