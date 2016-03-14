<?php
	$host = "mysql.hostinger.es";
	$username = "u944924796_root";
	$password = "root.2016";
	$database = "u944924796_ts";
	$connect = mysqli_connect($host, $username, $password, $database);
	$folder="uploads/";
        
        // Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
        //or die("Error while connecting to local server");
	//mysql_select_db($database, $connect) or die("Error connecting to database");
?>