<?php
include("CONECTAR_DB.php");
	function makeGame($connect, $player1, $player2) {
		
		$query = "INSERT INTO game_data SET player1_id='$player1', player2_id='$player2'";
		mysqli_query($connect, $query) or die("Error: ". mysqli_error());
		
		$query = "UPDATE user_data SET is_playing=1 WHERE user_id='$player1' OR user_id='$player2'";
		mysqli_query($connect, $query) or die("Error: ".mysqli_error());
		
		$query = "SELECT game_id FROM game_data WHERE player1_id='$player1' AND player2_id='$player2' AND game_result=0";
		$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
		
		$row = mysqli_fetch_array($result);
		
		return $row[0];
		
	}
	
	function getGame($connect, $game_id) {
		
		$query = "SELECT * FROM game_data WHERE game_id='$game_id'";
		$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
		
		$row = mysqli_fetch_array($result);
		
		return $row;
	}
	
	function destroyGame($connect, $player1, $player2=null) {
		$query = "UPDATE user_data SET is_playing=0 WHERE user_id='$player1' OR user_id='$player2'";
		mysqli_query($connect, $query) or die("Error: ".mysqli_error());
	}
	
?>