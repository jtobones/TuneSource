<?php
	include("CONECTAR_DB.php");
	function getProfile($connect, $id) {
		$query = "SELECT * FROM user_data WHERE user_id='$id'";
		$result = mysqli_query($connect, $query) or die("Error : ". mysqli_error());
		$row = mysqli_fetch_array($result);
		return $row;
	}
	
	function getPeopleOnline($connect) {
		$query = "SELECT user_id FROM user_data WHERE is_logged_in=1 AND is_playing=0";
		$result = mysqli_query($connect, $query) or die("Error: ". mysqli_error());
		$row_array = array();
		while($row = mysqli_fetch_array($result)) {
			array_push($row_array, $row[0]);
		}
		return $row_array;
	}
	
	
	
?>