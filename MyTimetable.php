<?php
include 'db_conn.php';
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!--Used bootstrap to make the webpage more responsive and goodlooking while in the mobile view-->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Bootstrap Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!--Used timetable.css to design the layout of the webpage-->
  <link rel="stylesheet" href="timetable.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  </style>
</head>
<body>


<!--Put the navigation bar to ease the navigation from one page to another-->
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
										    <li><a href="ICT.php">Allocate</a></li>
						<li><a href="signout.php">Logout</a></li>
						<li><a href="update.php">Update</a></li>
										   <?php } ?>
		

      </ul>
    </div>

  </div>
</nav>

<h1>University of Dowell</h1>
<div class="container" id="log">
  <div class="row">
    <div class="col-sm-4">
<!--Used labels so that data can be displayed in them once it starts interacting with the database-->
      <h2>About Me</h2>
	  	<img src="account-profile-clipart.jpg"></img>
      <h5>Logged in as:<?php echo $session_name ?></h5>
	  <h5>Email:<?php echo $session_user ?></h5>


      <hr class="d-sm-none">
    </div>
	<!-- Timetable design inspiration taken from the UTAS timetable. Some sample data put inside it to show how it will look with
	database interaction-->
    <div class="col-sm-8" id="gol">
      <h2>MyTimetable</h2>
	 
  </div>
  
    <div class="col-sm-8" id="gol">
	<div class="table-responsive">
	  <?php
	$query = "SELECT * FROM enrol,Allocation where enrol.session_user= Allocation.session_user and enrol.units=Allocation.unit_code";
if($result = $mysqli->query($query)){
    if(mysqli_num_rows($result) > 0){
	?>
	<div class="container">

   
	<table class="table table-striped table-bordered">
   <thead>
    <tr>
		<th scope="col">Units</th>
       <th scope="col">Allocated Timings</th>

		
     
    </tr>
  </thead>
  <?php
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['units'] . "</td>";
                echo "<td>" . $row['Allocated_Timings'] . "</td>";
          
        }
		?>
		<?php
		  echo "</tr>";
        echo "</table>";
echo "</form>"; 
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not execute $sql. " . mysqli_error($link);
}
 ?>
		 <br>
		 <!-- table used as to show how the timetable will look in future with data-->
		 <!-- links to the enrolment page and tutorial allocation page if the user  can't see his/her timetable-->
	  <p><a href="Enrol.php">Not Enrolled yet?<a href="ICT.php">  Not allocated yet?</p>

	  
     
</div>
</div>

</body>
</html>