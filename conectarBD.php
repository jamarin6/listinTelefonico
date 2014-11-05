<?php
	$con=mysqli_connect("localhost","root","","listin"); // conectar (host,user,password,database)
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>