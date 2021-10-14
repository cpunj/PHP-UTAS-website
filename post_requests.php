<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include('db_conn.php');
$Unitcode=$_POST['unitcode'];
$Unitname= $_POST['unitname'];
$lecturer=$_POST['lecturer'];
$Semester= $_POST['semester'];



$query1 = "INSERT INTO units(unit_code,unit_name,lecturer,semester)
VALUES ('$Unitcode','$Unitname','$lecturer','$Semester')";
$result1 = $mysqli -> query($query1);
echo "Record successfully added";
?>
<html>
<head>
<body>
<a href="tute7_manage.php">Go back to managing</a>
</head>
</body>
</html>



	