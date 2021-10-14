<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

//receive the username data from the form (in UDW.php)
$Email=$_POST['Email'];
//receive the password data from the form (in UDW.php)
$password=$_POST['password'];
$hash = crypt($password,rd);

//query to check whether username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM students WHERE Email='$Email' AND password='$hash' ";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

//if the username from table is not same as the username data from the form(from UDW.php)
if($row['Email']!=$Email || $Email=="")
{
	//automatically go back to signin_form and pass the error message
	header('Location: ./UDW.php?error=invalid_username_or_password');
}
//if the username is same as the username data from the form(from UDW.php) 
else {
	//if the password from table is same as the password data from the form(from UDW.php)
	if($row['password']==$hash) {
		//save the username in the session
		$session_user=$row['Email'];
		$session_id=$row['ID'];
		$session_password=$row['password'];
		$session_name=$row['Name'];
		$session_qualification=$row['qualification'];
		$session_DOB=$row['DOB'];
		$session_phone=$row['phone'];
		$session_address=$row['address'];
		$_SESSION['session_user']=$session_user;
		$_SESSION['session_qualification']=$session_qualification;
				$_SESSION['session_name']=$session_name;
					$_SESSION['session_id']=$session_id;
		//automatically go to signin_success.php
		header('Location: ./signin_success.php');
	
	}//if the password from table does not match with the password data from the signin form
	else{

		//automatically go back to signin_form and pass the error message
		header('Location: ./UDW.php?error=invalid_password');
	}
}
?>