<?php
	
	$servername = "localhost";
	$username = "root";
	$password = "thisismypassword54321";
	$db="library";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password,$db);

	// Check connection
	if (mysqli_connect_errno()) {
  	  die("Connection failed: " . mysqli_connect_errno());
	} 

	


?>