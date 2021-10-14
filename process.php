<?php
include('session.php');
include('db_conn.php');

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$senpass = crypt($password,rd);

if(isset($_POST['login']))
{
	$query="SELECT * FROM register WHERE username='".$username."' and password='".$senpass."'";

	$result = mysqli_query($conn,$query);
	
	if($row=mysqli_fetch_assoc($result))
	{
		
		$session_user=$row['username'];
		$_SESSION['session_user']=$session_user;
		header("location:welcome.php");
	}
	else
	{
		header("location:signin.php?Invalid=Please Enter Correct username and password");
	}
	
}
else
{
	echo 'Not working';
}
?>

