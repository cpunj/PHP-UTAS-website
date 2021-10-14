<?php
include('db_conn.php'); // database connection
include("session.php"); // for importing the logged in user
?>

<!DOCTYPE html>
<html>
<head>

     <meta charset="utf-8">
	 <!-- Bootstrap for making the site page more user-friendly !-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Link to use the icons for editing(imported from github) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">


    <!-- Javascript for adding the editing options in the academic details table -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
	
	 <script src="js/jquery.tabledit.js"></script>
	 
	
    </head>
	<!-- Check for the session_user. If the user has DC or Unit Co-ordinator,only then he/she will be allowed to make changes to units staff -->
	<?php if($_SESSION['session_qualification'] != 'DC' && $_SESSION['session_qualification'] != 'UC' ){?>
	<script>alert("Not authorized to change unit details"); window.location.href = "tute7_manage.php";</script>
	<?php }else {?>
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
	
	
        <div class ="container">
            <h2 align ="center">Manage Academic Staff</h2>

			
			<div class="row">
			<div class="container">
			<a href="tute7_manage.php">Back to managing unit details</a>
	<div class="row">
			<!-- gets the data from the academic table and shows it to the user -->
		<?php

		$query = "SELECT * FROM academic";
		$result = $mysqli->query($query) or die("database error:". mysqli_error($conn));
		?>
		<div id="units_detail" class="table-responsive">
			<table class="table table-striped table-bordered" id="editable_table">
			<thead>
				<tr>
					<th>ID</th>
       <th>Unit</th>
      <th>Lecturer</th>
	   <th>Lecturer availability</th>
	    <th>Tutor</th>	
<th>Tutor Availability		</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_array($result)) 
				{ 
					echo '
					<tr>
						<td>'.$row["id"].'</td>
						<td>'.$row["Unit_code"].'</td>
						<td>'.$row["Lecturer"].'</td>
						<td>'.$row["Lecturer_Availability"].'</td>
						<td>'.$row["Tutor"].'</td>
						<td>'.$row["Tutor_Availability"].'</td>
					</tr>
					';
				 } ?>
			</tbody>
		</table>	
		</div>
  </div>
</div>


</div>
<!-- Academic page connected with managing to make the navigation easier -->
<a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal" data-whatever="@mdo" role="button">Add Staff</a>

<a href="tute7_manage.php" class="btn btn-danger" role="button">Manage Unit details</a>
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Add Staff</h4>
	   	         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <div class="modal-body">
   <!-- Used to add a new Lecturers and Tutors to the units table -->
    	  <form id="form" action="post_requests1.php" method="POST" onsubmit="return validate();">
	<div class="form-group">
	Unit Code:
	<input type="text" name="unitcode" id="unitcode" class="form-control"/><br>
Lecturer:
<input type="text" name="unit" id="unitname" class="form-control"/><br>
<br>
Lecturer Availability:
<input type="text" name="lecturer" id="lecturer" class="form-control"/><br>

Tutor:
<input type="text" name="semester" id="semester" class="form-control"/><br>

Tutor Availability:
<input type="text" name="tutor" id="tutor" class="form-control"/><br>
<br>


	</div>
<a href="academic.php"><input type="submit" value="Add" /></a>
	</form>
	<div id="add-results"></div>
	</div>
   </div>
  </div>
 </div>
</div>

        </div>
    </body> 


<?php } ?>	
</html>
<!-- Editing options available to the users -->
<script>
	$(document).ready(function(){
		$('#editable_table').Tabledit({
			url:'action2.php',
			columns:{
					identifier:[0, "id"],
					editable:[[1, 'Unit_code'], [2, 'Lecturer'], [3, 'Lecturer_Availability'], [4, 'Tutor'],[5,'Tutor_Availability']]
			},
			restoreButton:false,
			onSuccess:function(data, textStatus, jqXHR)
			{
				if(data.action == 'delete')
				{
					$('#'+data.id).remove();
				}
			}
		});
		
	});
	
	
</script> 
<script>
function validate(){
	console.log("button clicked");

   if($('#unitcode').val() == ''){
      alert('Enter unitcode');
	  	  return false;
   }
      else if($('#unitname').val() == ''){
      alert('Enter lecturer name');
	  return false;
	  
   }
         else if($('#lecturer').val() == ''){
      alert('Enter lecturer availability');
	  	  return false;
   }
         else if($('#semester').val() == ''){
      alert('Enter Tutor name');
	  	  return false;
 }
 else if($('#tutor').val() == ''){
      alert('Enter Tutor availability');
	  	  return false;
 }
}
   
 

</script> 