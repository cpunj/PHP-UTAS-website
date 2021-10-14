<?php
include('db_conn.php');
if(!empty($_POST))
{
 $output = '';
$unit_code = $_POST["unit_code"];
$unit_name = $_POST["unit_name"];
$lecturer = $_POST["lecturer"];
$semester = $_POST["semester"];
    $query = "
    INSERT INTO units(unit_code, unit_name, lecturer, semester)  
     VALUES('".$unit_code."', '".$unit_name."', '".$lecturer."', '".$semester."')
    ";
    if(mysqli_query($conn, $query))
    {
     //$output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM units";
     $result = $mysqli->query($select_query);
     $output .= '
      <table id="editable_table" class="table table-bordered">  
                   <thead>
				<tr>
					<th>ID</th>
       <th>Unit Code</th>
      <th>Unit Name</th>
	   <th>Lecturer</th>
	    <th>Semester</th>												
				</tr>
			</thead>
			<tbody>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       	<tr>
						<td>'.$row["id"].'</td>
						<td>'.$row["unit_code"].'</td>
						<td>'.$row["unit_name"].'</td>
						<td>'.$row["lecturer"].'</td>
						<td>'.$row["semester"].'</td>
					</tr>
      ';
     }
     $output .= '</tbody></table>';
    }
    echo $output;
}
?>