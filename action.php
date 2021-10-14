<?php
include('db_conn.php'); //db connection

$input = filter_input_array(INPUT_POST);

$unit_code = $_POST["unit_code"];
$unit_name = $_POST["unit_name"];
$lecturer = $_POST["lecturer"];
$semester = $_POST["semester"];

if($input["action"] === 'edit')
{
	$sqlQuery = "
		UPDATE units
	SET unit_code = '".$unit_code."',
	unit_name = '".$unit_name."', lecturer = '".$lecturer."', semester = '".$semester."'
		WHERE id = '".$input["id"]."'
	";
	
	$mysqli->query($sqlQuery);
}

if($input["action"] === 'delete')
{
	$sqlQuery = "
		DELETE FROM units
		WHERE id = '".$input["id"]."'
	";	
	$mysqli->query($sqlQuery);
}

echo json_encode($input);

?>

