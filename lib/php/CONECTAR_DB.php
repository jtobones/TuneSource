<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$database = "jtobones";
	$connect = mysqli_connect($host, $username, $password, $database);
        
        // Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
        //or die("Error while connecting to local server");
	//mysql_select_db($database, $connect) or die("Error connecting to database");
?>
	
