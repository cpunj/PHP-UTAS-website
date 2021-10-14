<?php
include 'session.php';
include 'db_conn.php';
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
  <!--Used the ICT.css stylesheet to design the layout of the webpage-->
  <link rel="stylesheet" href="ICT.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  </style>
</head>
<body>


<!--Put the navigation bar in ICT allocation tutorial selection as this is separate from other pages. To ease the navigation navigation bar is put here-->
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
<!-- Tutorial allocation design made similar to that of UTAS older ICT allocation system. Easy selection options provided and template data provided to 
show how the page will look when data interaction will take place-->
<h1><strong>Tutorial Allocation System</strong></h1>
<p><label for="allocate">Logged in as:<?php echo $session_name;?></p>
<p><label for="email">Email address:<?php echo $session_user;?></p>
<p><label for="email">ID:<?php echo $session_id;?></p>


<br><br><br>
	<?php
	$query = "SELECT * FROM units,enrol where units.unit_code=enrol.units and session_user='$session_user'";
if($result = $mysqli->query($query)){
    if(mysqli_num_rows($result) > 0){
	?>
	<div class="container">

   
	<table class="table table-striped table-bordered">
   <thead>
    <tr>
		<th scope="col">ID</th>
       <th scope="col">Unit Code</th>
      <th scope="col">Unit Name</th>
	   <th scope="col">Unit co-ordinator</th>
	    <th scope="col">Availability</th>
		
     
    </tr>
  </thead>
  <?php
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['unit_code'] . "</td>";
                echo "<td>" . $row['unit_name'] . "</td>";
                echo "<td>" . $row['lecturer'] . "</td>";
				echo "<td>" . $row['semester'] . "</td>";

				

		
          
        }
		?>
		<!-- Used combo boxes to make the process simpler for students to allocate -->
		<tr scope="col">
		<th>Timings
		<td> <form id='form' onsubmit='return validate();' action='ICT.php' method='POST'><select id='Choose an option' name='select'>
		 <option>--Choose an option--</option>
   <option value='Lecture Monday 1:00 PM, Cent272'>Monday 1:00 PM, Cent272 </option>
  <option value='Friday 10:00 AM, Cent272'>Friday 10:00 AM, Cent272</option>
    <option value='Thursday 1:00 PM, Cent272'>Thursday 1:00 PM, Cent272</option>
	    <option value='Wednesday 2:00 PM, Cent272'>Wednesday 2:00 PM, Cent272</option>
			    <option value='Tuesday 2:00 PM, Cent272'>Tuesday 2:00 PM, Cent272</option>
</select></td>
<td><select id='Choose an options' name='select1'>
		 <option>--Choose an option--</option>
   <option value='Monday 1:00 PM, Cent272'>Monday 1:00 PM, Cent272 </option>
  <option value='Friday 11:00 AM, Cent272'>Friday 11:00 AM, Cent272</option>
    <option value='Thursday 3:00 PM, Cent272'>Thursday 3:00 PM, Cent272</option>

</select></td>
<td><select id='Choose an options' name='select2'>
		 <option>--Choose an option--</option>
   <option value='Monday 1:00 PM, Cent272'>Monday 1:00 PM, Cent272 </option>
  <option value='Friday 11:00 AM, Cent272'>Friday 11:00 AM, Cent272</option>
    <option value='Thursday 3:00 PM, Cent272'>Thursday 3:00 PM, Cent272</option>
	    <option value='Wednesday 2:00 PM, Cent272'>Wednesday 2:00 PM, Cent272</option>
			    <option value='Tuesday 2:00 PM, Cent272'>Tuesday 2:00 PM, Cent272</option>
</select></td>
<td><select id='Choose an options' name='select3'>
		 <option>--Choose an option--</option>
   <option value='Monday 1:00 PM, Cent272'>Monday 1:00 PM, Cent272 </option>
  <option value='Friday 11:00 AM, Cent272'>Friday 11:00 AM, Cent272</option>
    <option value='Thursday 3:00 PM, Cent272'>Thursday 3:00 PM, Cent272</option>
	    <option value='Wednesday 2:00 PM, Cent272'>Wednesday 2:00 PM, Cent272</option>
			    <option value='Tuesday 2:00 PM, Cent272'>Tuesday 2:00 PM, Cent272</option>
</select></td>
</tr>
</th>
		<?php
		  echo "</tr>";
        echo "</table>";
 echo "<input type='submit' id='b_submit1' value='Confirm' name='submit1' />";	
echo "</form>"; 
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records were found for this user.";
    }
} else{
    echo "ERROR: Failed to execute $sql. ";
}
 ?>
 
	<?php

	$select=$_POST['select'];
	$select2=$_POST['select1'];
	$select3=$_POST['select2'];
	$select4=$_POST['select3'];
	$query5 = "INSERT INTO Allocation(Allocated_Timings,unit_code,session_user)
VALUES ('$select','KIT202','$session_user')";
$result5 = $mysqli -> query($query5);
$query6 = "INSERT INTO Allocation(Allocated_Timings,unit_code,session_user)
VALUES ('$select2','KIT710','$session_user')";
$result6 = $mysqli -> query($query6);
$query7 = "INSERT INTO Allocation(Allocated_Timings,unit_code,session_user)
VALUES ('$select3','KIT406','$session_user')";
$result7 = $mysqli -> query($query7);
$query8 = "INSERT INTO Allocation(Allocated_Timings,unit_code,session_user)
VALUES ('$select4','KIT307','$session_user')";
$result8 = $mysqli -> query($query8);
	
   ?>
	
  </tbody>
</table>
</div>
  <script>
function validate(){
    if(document.getElementById('b_submit1').clicked == true){
		alert("Successfully allocated");
	}
}

</script>
	  <br>
	  <br><br>
	  <p> For more enquiries please visit <a href="ICThelp.com">ICT help desk</p>
</body>
</html>