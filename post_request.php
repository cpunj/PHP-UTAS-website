<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

include('db_conn.php');
include("session.php");
$Name=$_POST['Name'];
$Email= $_POST['Email'];
$password=$_POST['password'];
$semester= $_POST['semester'];
$phone $_POST['phone'];

$hash=crypt($password,rd);



$query1 = "UPDATE students SET Name='$Name',Email='$Email',password='$hash',semester='$semester',phone='$phone' where Email like '$session_user'";
$result1 = $mysqli -> query($query1);
echo "Record successfully updated";
?>
