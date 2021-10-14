<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

$res=mysqli_query($mysqli, "SELECT * FROM students WHERE Email LIKE '$session_user'"); 
if ($res) $rs = mysqli_fetch_array($res);

//if the session for username has not been saved, automatically go back to UDW.php
if ($session_user==""){
	header('Location: UDW.php');
}
?>
<!-- This page is same as default home page but with session -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheet.css">
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
        <li><a href="UDW.php">Login</a></li>
		<li><a href="register.php">Register</a></li>
				<li><a href="Enrol.php">Enrol</a></li>
		        <li><a href="MyTimetable.php">MyTimetable</a></li>
				        <li><a href="units.php">Units Handbook</a></li>
						<li><a href="signout.php">Logout</a></li>
						<li><a href="update.php">Update</a></li>
						

      </ul>
    </div>
  </div>
</nav>
<b>Signed in as!! <?php echo $session_user;?></b>
<div class="jumbotron text-center" style="background-image: url(https://www.murdoch.edu.au/sf-images/default-source/system/backgrounds/360-background-1917x813.jpg?sfvrsn=957c2547_5); background-size: 100%;">>
  <h1>Welcome to UDW</h1>
  <h2>Start your experience today</h2>
  <button type="button" class="btn btn-success"><a href="Register.html" style="color:Black">Register Now!</a></button>
</div>
</div>
<div class="row">
  <div class="col-sm-4 col-md-4">
    <div class="card">
	<img src="34789755-exam-week-background-with-various-study-and-educted-related-items-such-as-a-highlighted-reader-with-.jpg" style="width:100%" >
      <h3 align="left">Enrol Now</h3>
      <p align="left">Start your journey by enroling into your course units now </p>
<button class="btn success"><a href="Enrol.html">Enrol Now</a></button>

    </div>
  </div>

  <div class="col-sm-4 col-md-4">
    <div class="card">
		<img src="download.jpg" style="width:100%">
      <h3 align="left">MyTimetable</h3>
      <p align="left">Access your timetable by clicking the view timetable option</p>
<button class="btn success"><a href="MyTimetable.html">View timetable</a></button>
    </div>
  </div>
  
  <div class="col-sm-4 col-md-4">
    <div class="card">
			<img src="pexels-photo-853168.jpeg" style="width:100%">
      <h3 align="left">Unit details</h3>
      <p align="left">View the units handbook from here</p>
<button class="btn success"><a href="Unitoutline.html">Unit details</a></button>
    </div>
  </div>
</body>

</html>


	<!--if the user clicks "sign out" button, go to signout.php-->
