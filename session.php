<?php
//starting session
session_start();

//if the session for username has not been set, initialise it
if(!isset($_SESSION['session_user'])){
	$_SESSION['session_user']="";
}
//save username in the session 
$session_user=$_SESSION['session_user'];
$session_id=$_SESSION['session_id'];
$session_password=$_SESSION['session_password'];
$session_name=$_SESSION['session_name'];
$session_DOB=$_SESSION['session_DOB'];
$session_address=$_SESSION['session_address'];
$session_phone=$_SESSION['session_phone'];
		$session_qualification=$_SESSION['session_qualification'];
?>