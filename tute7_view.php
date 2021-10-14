<?php
include('db_conn.php'); //database connection 
include("session.php");// session for logged in user
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	 <!-- Bootstrap for making the site page more user-friendly !-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Link to use the icons for editing(imported from github) -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Link to use icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   <!-- Javascript for adding the editing options in the academic details table -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
    </head>
		<?php if($_SESSION['session_user'] == ''){?>
	<script>alert("login is required"); window.location.href = "units.php";</script>
	<?php }else {?>
    <body>
	
	
        <div class ="container">
            <h2 align ="center">Unit details</h2>
			<div class="row">
	<?php
	$query = "SELECT * FROM units";
if($result = $mysqli->query($query)){
    if(mysqli_num_rows($result) > 0){
	?>
	<div class="container">
	<a href="units.php">Back to main</a>
   
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
				
            echo "</tr>";
        }
        echo "</table>"; 
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records were found in the database.";
    }
} else{
    echo "ERROR: Failed to execute $sql. ";
}
 ?>
 
	
   
	
  </tbody>
</table>
    </div>
	
</div>
	
        </div>
    </body>  
	<div class="wrapper">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchModal">
  Search
</button>
	<a href="tute7_manage.php" class="btn btn-primary" role="button">Manage Unit details</a>
	</div>
	<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="Searchbox" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search Unit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form method="GET">
	<div class="form-group">
	<input type="text" id="search" class="form-control" name="search"/>
	</div>
    <button type="button" id="search-button" class="btn btn-primary">Search</button>
	</form>
	<div id="search-results"></div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
}
</style>
<!-- Javascript used to search unit details using get method -->
<script>


$(document).ready(function(){
	$("#search-button").click(function(){
		var searchData = $("#search").serialize();
		$.ajax({
			url:"search.php",
			method:"GET",
			data:searchData,
			dataType:"html",
			success:function(data){
				$("#search-results").html(data);
			}
		})
	})
})
</script>
	<?php } ?>
</html>  
<style>
.wrapper {
	text-align:center;

