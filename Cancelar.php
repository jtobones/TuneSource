<?php
	include("lib/php/CONECTAR_DB.php");
	include("lib/php/CANCELAR_JUEGO.php");
	include("lib/php/CREAR_JUEGO.php");
	include("lib/php/JUGAR.php");
	
	session_start();
	
	$game_id = $_SESSION["game_id"];
	$player_id = $_SESSION["id"];
	
	$game_data = getGame($connect, $game_id);
	
	if($player_id == $game_data["player1_id"]) {
		cancelar($connect, $game_id, 1);
		$id = $game_data["player2_id"];
		increScore($connect, $id);
	}
	else {
		cancelar($connect, $game_id, 2);
		$id = $game_data["player1_id"];
		increScore($connect, $id);
	}
	
	
	
?>