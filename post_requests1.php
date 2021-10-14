<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include('db_conn.php');
$Unitcode=$_POST['unitcode'];
$Unitname= $_POST['unit'];
$lecturer=$_POST['lecturer'];
$Semester= $_POST['semester'];
$Tutor= $_POST['tutor'];



$query1 = "INSERT INTO academic(Unit_code,Lecturer,Lecturer_Availability,Tutor,Tutor_Availability)
VALUES ('$Unitcode','$Unitname','$lecturer','$Semester','$Tutor')";
$result1 = $mysqli -> query($query1);
echo "Record successfully added";
?>
<html>
<head>
<body>
<a href="academic.php">Go back to add more staff</a>
</head>
</body>
</html>



	