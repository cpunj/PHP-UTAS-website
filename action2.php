<?php
include('db_conn.php'); //db connection

$input = filter_input_array(INPUT_POST);

$unit_code = $_POST["Unit_code"];
$unit_name = $_POST["Lecturer"];
$lecturer = $_POST["Lecturer_Availability"];
$semester = $_POST["Tutor"];
$tutor = $_POST["Tutor_Availability"];


if($input["action"] === 'edit')
{
	$sqlQuery = "
		UPDATE academic
	SET Unit_code = '".$unit_code."',
	Lecturer = '".$unit_name."', Lecturer_Availability = '".$lecturer."', Tutor = '".$semester."',Tutor_Availability = '".$tutor."'
		WHERE id = '".$input["id"]."'
	";
	
	$mysqli->query($sqlQuery);
}

if($input["action"] === 'delete')
{
	$sqlQuery = "
		DELETE FROM academic
		WHERE id = '".$input["id"]."'
	";	
	$mysqli->query($sqlQuery);
}

echo json_encode($input);

?>

