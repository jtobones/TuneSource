<?php
include("CONECTAR_DB.php");
	function makeGameAndGetId($connect, $user_id, $challenged_id) {
		$query = "INSERT INTO game_data SET player1_id='$user_id',player2_id='$challenged_id'";
		mysqli_query($connect, $query) or die("Error: " . mysqli_error());
		
		$query = "SELECT game_id FROM game_data WHERE player1_id='$user_id' AND player2_id='$challenged_id' AND game_result=0";
		$result = mysqli_query($connect, $query) or die("Error: ". mysqli_error());
		$row = mysqli_fetch_array($result);
		return $row[0];
		
		
	}
	
	function getGameIdFromUserId($connect, $user_id) {
		$query = "SELECT game_id FROM game_data WHERE player2_id='$user_id' AND game_result=0";
		$result = mysqli_query($connect, $query) or die("Error: " . mysqli_error());
		
		$row = mysqli_fetch_array($result);
		return $row[0];
	}
	
	
	function getChallengerIdByGameId($connect, $game_id) {
		$query = "SELECT player1_id FROM game_data WHERE game_id='$game_id'";
		$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
		$row = mysqli_fetch_array($result);
		return $row[0];
	}
	
	
	
	
	
	
	
	
?>