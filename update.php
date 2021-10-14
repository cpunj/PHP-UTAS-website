<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

$res=mysqli_query($mysqli, "SELECT * FROM students WHERE Email LIKE '$session_user'"); 
if ($res) $rs = mysqli_fetch_array($res);

//if the session for username has not been saved, automatically go back to signin_form.php
if ($session_user==""){
	header('Location: UDW.php');
	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Link to use the icons for editing(imported from github) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">-->


  <!-- Javascript for adding the editing options in the academic details table -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
	
	 <script src="js/jquery.tabledit.js"></script>
	 <!-- Check for the session_user. All users can update their details from this page-->
	 <!-- A sidenote though. The password field is encrypting itself again and again even when it is not changed :( . Rest is working perfectly -->
	
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
		<!-- navigation bar changes according to the login of the user -->
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
	  			  <?php if($_SESSION['session_user'] == ''){?>
	          <li><a href="webpage.php">Home</a></li>
        <li><a href="UDW.php">Login</a></li>
		<li><a href="register.php">Register</a></li>
		        <li><a href="MyTimetable.php">MyTimetable</a></li>
				      					  <li><a href="units.php">Units Handbook</a></li>
										   <?php }else {?>
										   <li><a href="signin_success.php">Home</a></li>
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
	
	
        <div class ="container">
            <h2 align ="center">Manage your details</h2>

			
			<div class="row">
			<div class="container">
	<div class="row">
			
		<?php
		//include_once("inc/db_connect.php");
		$query = "SELECT * FROM students where Email like '$session_user'";
		$result = $mysqli->query($query) or die("database error:". mysqli_error($conn));
		?>
		<div id="units_detail" class="table-responsive">
			<table class="table table-striped table-bordered" id="editable_table">
			<thead>
				<tr>
				<th>ID</th>
					<th>Email</th>
       <th>password</th>
      <th>DOB</th>
	   <th>address</th>
	    <th>phone</th>		
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($result)) 
				{ 
					echo '
					<tr>
					<td>'.$row["ID"].'</td>
						<td>'.$row["Email"].'</td>
						<td>'.$row["password"].'</td>
						<td>'.$row["DOB"].'</td>
						<td>'.$row["address"].'</td>
						<td>'.$row["phone"].'</td>
					</tr>
					';
				 } ?>
			</tbody>
		</table>	
		</div>
  </div>
</div>
</div>
<h3> User Timetable</h3>
<div class="col-sm-8" id="gol">
	<div class="table-responsive">
	  <?php
	$query = "SELECT * FROM enrol,Allocation where session_user='$session_user' and enrol.units=Allocation.unit_code";
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

    </body> 



</html>

<script>
	$(document).ready(function(){
		$('#editable_table').Tabledit({
			url:'action1.php',
			columns:{
					identifier:[0, "ID"],
					editable:[[1, 'Email'], [2, 'password'], [3, 'DOB'], [4, 'address'],[5,'phone']]
			},
			restoreButton:false,

		});
		
	});
	
	
</script> 


