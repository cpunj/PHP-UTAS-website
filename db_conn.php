<?php
//connect to mysql
$mysqli = new mysqli('localhost', 'cpunj', '502183', 'cpunj');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>