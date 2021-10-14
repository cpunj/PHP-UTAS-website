<?php
include('db_conn.php');
$search = $_GET['search'];
$query = "SELECT * FROM units WHERE id LIKE '%$search%' OR unit_code LIKE '%$search%' OR unit_name LIKE '%$search%'";
$result = $mysqli->query($query);
while($row = mysqli_fetch_array($result)){
echo '
<table class="table table-bordered">
<tr>
<td>'.$row["id"].'</td>
<td>'.$row["unit_code"].'</td>
<td>'.$row["unit_name"].'</td>
<td>'.$row["lecturer"].'</td>
<td>'.$row["semester"].'</td>
</tr>
</table>
';
}
?>