<!DOCTYPE html>
<?php 
include('db_conn.php');
include("session.php");
?>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   
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
	  			  <?php if($_SESSION['session_user'] == ''){?>
	          <li><a href="webpage.php">Home</a></li>
        <li><a href="UDW.php">Login</a></li>
		<li><a href="register.php">Register</a></li>
		        <li><a href="MyTimetable.php">MyTimetable</a></li>
				      					  <li><a href="units.php">Units Handbook</a></li>
										   <?php }else {?>
										   <li><a href="signin_success.php.php">Home</a></li>
		        <li><a href="MyTimetable.php">MyTimetable</a></li>
				<li><a href="Enrol.php">Enrol</a></li>
				      					  <li><a href="units.php">Units Handbook</a></li>
										  <li><a href="Allocate.php">Units Handbook</a></li> 
						<li><a href="signout.php">Logout</a></li>
						<li><a href="update.php">Update</a></li>
										   <?php } ?>
						

      </ul>
    </div>
  </div>
</nav>
    
	<div class="jumbotron">
        <div class="container">
            <h1 align ="center">Course Units</h1>
        </div>
    </div>
    <center>
     <a href="tute7_view.php" class="btn btn-success" role="button">View Unit details</a>
      <a href="tute7_manage.php" class="btn btn-primary" role="button">Manage Unit details</a>
	  <a href="academic.php" class="btn btn-danger" role="button">Manage Academic Staff</a>
    <br />
    </center>
 </body>  
</html>  
