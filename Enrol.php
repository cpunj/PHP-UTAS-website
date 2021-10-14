<?php
include('db_conn.php'); // database connection
include("session.php");// for importing the logged in user
?>
<!DOCTYPE html>
<html lang="en">
<head>
	 <!-- Bootstrap for making the site page more user-friendly !-->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Bootstrap Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!--Used the enrol.css stylesheet to design the layout of the webpage-->
  <link rel="stylesheet" href="enrol.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<!-- Only a student can enrol -->
	<?php if($_SESSION['session_qualification'] != 'Student'){?>
	<script>alert("Only a student has access"); window.location.href = "UDW.php";</script>
	<?php }else {?>
<body>


<!--Put the navigation bar in Enrolment page to ease the navigation navigation bar is put here-->
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
	<!-- navigation bar changes according to the login of the user -->
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
<!--Used the collapsible bars so that the user will be able to make enrolment details go away by pressing the bars. the default view of the 
bars will be hidden-->
<h1>University of Dowell</h1>
<h2>73T Bachelor of Information and Communication Technology - Study Plan Details</h2>
<button type="button" class="collapsible">Year 1</button>
<div class="content">
			
		<?php
		//include_once("inc/db_connect.php");
		$query = "SELECT * FROM units where id between 1 and 32";
		$result = $mysqli->query($query) or die("database error:". mysqli_error($conn));
		?>
		<div id="units_detail" class="table-responsive">
			<table class="table table-bordered" id="editable_table">
			<thead>
				<tr>
					<th>ID</th>
       <th>Unit Code</th>
      <th>Unit Name</th>
	   <th>Unit co-ordinator</th>
	    <th>Availability</th>	
	
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($result)) 
				{ 
					echo '
					<tr>
						<td>'.$row["id"].'</td>
						<td>'.$row["unit_code"].'</td>
						<td>'.$row["unit_name"].'</td>
						<td>'.$row["lecturer"].'</td>
						<td>'.$row["semester"].'</td>
					</tr>
					';
				 } ?><br><br>
			</tbody>
		</table>	
		<!-- Used checkboxes to make the process of enrolment easier -->
		<form id="form" onsubmit="return validate();" action="Enrol.php" method="POST">
		Enrol:<br> <input type="checkbox" name="kit1" value="KIT202" />KIT202<br /><br>
								<input type="checkbox" name="kit2" value="KIT710" />KIT710<br /><br>
												<input type="checkbox" name="kit3" value="KIT406" />KIT406<br /><br>
																<input type="checkbox" name="kit4" value="KIT307" />KIT307<br />
																 <input type="submit" id="b_submit" value="Confirm" name="submit" />
																 <?php
																 
$units=$_POST['kit1'];
$units2=$_POST['kit2'];
$units3=$_POST['kit3'];
$units4=$_POST['kit4'];
$query = "INSERT INTO enrol(units,session_user)
VALUES ('$units','$session_user')";
$result = $mysqli -> query($query);
$query2 = "INSERT INTO enrol(units,session_user)
VALUES ('$units2','$session_user')";
$result2 = $mysqli -> query($query2);
$query3 = "INSERT INTO enrol(units,session_user)
VALUES ('$units3','$session_user')";
$result3 = $mysqli -> query($query3);
$query4 = "INSERT INTO enrol(units,session_user)
VALUES ('$units4','$session_user')";
$result4 = $mysqli -> query($query4);
?>
																</form>
		</div>



</div>
<button type="button" class="collapsible">Year 2</button>
<div class="content">
<?php
		$query = "SELECT * FROM units where id between 33 and 56";
		$result = $mysqli->query($query) or die("database error:". mysqli_error($conn));
		?>
		<div id="units_detail" class="table-responsive">
			<table class="table table-striped table-bordered" id="editable_table">
			<thead>
				<tr>
					<th>ID</th>
       <th>Unit Code</th>
      <th>Unit Name</th>
	   <th>Unit co-ordinator</th>
	    <th>Availability</th>												
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($result)) 
				{ 
					echo '
					<tr>
						<td>'.$row["id"].'</td>
						<td>'.$row["unit_code"].'</td>
						<td>'.$row["unit_name"].'</td>
						<td>'.$row["lecturer"].'</td>
						<td>'.$row["semester"].'</td>
					</tr>
					';
				 } ?>
				 
			</tbody>
		</table>
		<form id="form" onsubmit="return validate();" action="Enrol.php" method="POST">		
		Enrol:<br> <input type="checkbox" name="kit5" value="KIT101" />KIT101<br /><br>
								<input type="checkbox" name="kit6" value="KIT102" />KIT102<br /><br>
												<input type="checkbox" name="kit7" value="KIT303" />KIT303<br /><br>
																<input type="checkbox" name="kit8" value="KIT303" />KIT303<br />
																 <input type="submit" id="b_submit1" value="Confirm" name="submit1" />
																 <?php
																 $units5=$_POST['kit5'];
$units6=$_POST['kit6'];
$units7=$_POST['kit7'];
$query5 = "INSERT INTO enrol(units,session_user)
VALUES ('$units5','$session_user')";
$result5 = $mysqli -> query($query5);
$query6 = "INSERT INTO enrol(units,session_user)
VALUES ('$units6','$session_user')";
$result6 = $mysqli -> query($query6);
$query7 = "INSERT INTO enrol(units,session_user)
VALUES ('$units7','$session_user')";
$result7 = $mysqli -> query($query7);
?>

																</form>
		</div>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="collapse.js"></script><!-- used for collapsable bars -->
	  <!-- Shows successful enrolment message once enrolled -->
	  <script>
	  
function validate(){
    if(document.getElementById('b_submit').clicked == true){
		alert("Successfully enrolled");
	}
   else{
	   alert("Successfully enrolled");
   }
}

</script>

	<?php } ?>

</body>

</html>