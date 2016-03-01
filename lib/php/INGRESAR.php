<?php
	include("CONECTAR_DB.php");
	function loginUser($connect, $username, $email) {
		if(checkExistingUser($connect, $username, $email)) {
			$query = "UPDATE user_data SET is_logged_in=1 WHERE user_name='$username' AND pass='$email'";
			mysqli_query($connect, $query) or die("Error: " . mysqli_error());
			$query = "SELECT user_id FROM user_data WHERE user_name='$username' AND pass='$email'";
			$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
			$row = mysqli_fetch_array($result);
			return $row[0];
		}
		else {
			return false;
		}
	}
	
	function checkExistingUser($connect, $username, $email) {
		$query = "SELECT * FROM user_data WHERE user_name='$username'";
		$result = mysqli_query($connect, $query) or die("Error while checking database");
		$row = mysqli_fetch_array($result);
		if($row['pass'] == $email) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function logoutUser($connect, $id) {
		$query = "UPDATE user_data SET is_logged_in=0 WHERE user_id='$id'";
		mysqli_query($connect, $query) or die("Error: " . mysqli_error());
		return true;
	}
?>