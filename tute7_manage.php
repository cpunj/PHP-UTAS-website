<?php
include('db_conn.php'); //db connection
include("session.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	 <!-- Bootstrap for making the site page more user-friendly !-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Link to use the icons for editing(imported from github) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	


   <!-- Javascript for adding the editing options in the academic details table -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> 
	
	 <script src="js/jquery.tabledit.js"></script>
	 

	
    </head>
	<!-- checks if the user is DC -->
	<?php if($_SESSION['session_qualification'] != 'DC'){?>
	<script>alert("Not authorized to change unit details"); window.location.href = "units.php";</script>
	<?php }else {?>
    <body>
	
	
        <div class ="container">
            <h2 align ="center">Manage Unit details</h2>

			
			<div class="row">
			<div class="container">
			<a href="units.php">Back to main page</a>
	<div class="row">
			
		<?php
		//include_once("inc/db_connect.php");
		$query = "SELECT * FROM units";
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
		</div>
  </div>
</div>


</div>

<a href="" class="btn btn-primary" data-toggle="modal" data-target="#add_data_Modal" data-whatever="@mdo" role="button">Add New Unit</a>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#searchModal">
  Search
</button>

<a href="academic.php" class="btn btn-danger" role="button">Manage Academic Staff</a>
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Add Unit</h4>
	   	         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
   </div>
   <div class="modal-body">
    	  <form id="form" action="post_requests.php" method="POST" onsubmit="return validate();">
	<div class="form-group">
	Unit Code:
	<input type="text" name="unitcode" id="unitcode" class="form-control"/><br>
Unit Name:
<input type="text" name="unitname" id="unitname" class="form-control"/><br>
<br>
Unit co-ordinator:
<input type="text" name="lecturer" id="lecturer" class="form-control"/><br>

Availability:
<input type="text" name="semester" id="semester" class="form-control"/><br>
<br>

	</div>
<a href="tute7_manage.php"><input type="submit" class="btn btn-primary" value="Add" /></a>
	</form>
	<div id="add-results"></div>
	</div>
   </div>
  </div>
 </div>
</div>

        </div>
    </body> 

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
<!-- Used action.php file to use editing option for managing table -->
<script>
	$(document).ready(function(){
		$('#editable_table').Tabledit({
			url:'action.php',
			columns:{
					identifier:[0, "id"],
					editable:[[1, 'unit_code'], [2, 'unit_name'], [3, 'lecturer'], [4, 'semester']]
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
      alert('Enter unitname');
	  return false;
	  
   }
         else if($('#lecturer').val() == ''){
      alert('Enter your mail');
	  	  return false;
   }
         else if($('#semester').val() == ''){
      alert('Enter semester');
	  	  return false;
 }
}
   
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
