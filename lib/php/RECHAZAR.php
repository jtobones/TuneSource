<?php
include("CONECTAR_DB.php");
	function rejectGame($connect, $game_id, $user_id, $challenger_id) {
		$query = "UPDATE game_data SET game_result=-1 WHERE game_id='$game_id'";
		mysqli_query($connect, $query) or die("Error: ".mysqli_error());
	
		$query = "UPDATE user_data SET is_playing=0 WHERE user_id='$user_id' OR user_id='$challenger_id'";
		mysqli_query($connect, $query) or die("Error: ".mysqli_error());
	}
?>