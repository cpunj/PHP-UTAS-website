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
		        <li><a href="MyTimetable.php">MyTimetable</a></li>
				        <li><a href="units.php">Units Handbook</a></li>

      </ul>
    </div>
  </div>
</nav>
<div class="jumbotron text-center" style="background-image: url(https://www.murdoch.edu.au/sf-images/default-source/system/backgrounds/360-background-1917x813.jpg?sfvrsn=957c2547_5); background-size: 100%;">>
  <h1>Welcome to UDW</h1>
  <h2>Start your experience today</h2>
  <button type="button" class="btn btn-success"><a href="register.php" style="color:Black">Register Now!</a></button>
</div>
</div>
<div class="row">
  <div class="col-sm-4 col-md-4">
    <div class="card">
	<img src="34789755-exam-week-background-with-various-study-and-educted-related-items-such-as-a-highlighted-reader-with-.jpg" style="width:100%" >
      <h3 align="left">Enrol Now</h3>
      <p align="left">Start your journey by enroling into your course units now </p>
<button class="btn success"><a href="Enrol.php">Enrol Now</a></button>

    </div>
  </div>

  <div class="col-sm-4 col-md-4">
    <div class="card">
		<img src="download.jpg" style="width:100%">
      <h3 align="left">MyTimetable</h3>
      <p align="left">Access your timetable by clicking the view timetable option</p>
<button class="btn success"><a href="MyTimetable.php">View timetable</a></button>
    </div>
  </div>
  
  <div class="col-sm-4 col-md-4">
    <div class="card">
			<img src="pexels-photo-853168.jpeg" style="width:100%">
      <h3 align="left">Unit details</h3>
      <p align="left">View the units handbook from here</p>
<button class="btn success"><a href="units.php">Unit details</a></button>
    </div>
  </div>
</body>
</html>