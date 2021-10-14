<?php
include('db_conn.php'); //db connection

$input = filter_input_array(INPUT_POST);

$unit_code = $_POST["Email"];
$unit_name = crypt($_POST["password"],rd);
$lecturer = $_POST["DOB"];
$semester = $_POST["address"];
$tutor = $_POST["phone"];




if($input["action"] === 'edit')
{

	$sqlQuery = "
		UPDATE students
	SET Email = '".$unit_code."',
	password = '".$unit_name."', DOB = '".$lecturer."', address = '".$semester."',phone = '".$tutor."'
		WHERE ID = '".$input["ID"]."'
	";
	
	$mysqli->query($sqlQuery);
}
echo json_encode($input);

?>