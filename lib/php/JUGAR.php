<?php
include("CONECTAR_DB.php");
	function setTileData($connect, $player, $tile, $game_id) {
		if(isTileSettable($connect,$game_id, $tile)) {
			$query = "UPDATE game_data SET Tile_" . $tile . "='$player' WHERE game_id='$game_id' AND game_result=0";
			mysqli_query($connect, $query) or die("Error while setting tile.");
			return true;
		}
		else {
			return false;
		}
	}
	
	function getTileData($connect, $game_id) {
		
		$query = "SELECT * FROM game_data WHERE game_id='$game_id'";
		$result = mysqli_query($connect, $query) or die("Error while getting tile data.");
		$row = mysqli_fetch_array($result);
		return $row;
	}
	
	function getTurn($connect, $game_id) {
		$query = "SELECT turn FROM game_data WHERE game_id='$game_id' AND game_result=0";
		$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
		$row = mysqli_fetch_array($result);
		
		return $row[0];
	}
	
	function setTurn($connect, $game_id) {
		if(getTurn($connect,$game_id) == "1") {
			$query = "UPDATE game_data SET turn=2 WHERE game_id='$game_id' AND game_result=0";
			
		}
		else {
			$query = "UPDATE game_data SET turn=1 WHERE game_id='$game_id' AND game_result=0";
			
		}
		mysqli_query($connect, $query) or die("Error: ".mysqli_error());
	}
	
	function getPlayer($connect, $game_id, $id) {
		$row = getTileData($connect,$game_id);
		
		
		
		if($id == (int)$row["player1_id"]) {
			
			return "1";
		}
		else {
			return "2";
		}
	}
	
	function isTileSettable($connect, $game_id, $tile) {
		
		
		$row = getTileData($connect, $game_id);
		$tilePlayer = "Tile_". $tile;
		if($row[$tilePlayer] == 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function checkDraw($connect, $game_id) {
		$row = getTileData($connect,$game_id);
		
		$tiles = array();
		
		for($i=1; $i<10; $i++) {
			array_push($tiles, $row["Tile_".$i]);
		}
		
		
		for($i=0; $i<count($tiles); $i++) {
			
			if($tiles[$i] == 0) {
				return false;
			}
		}
		setResult($connect, $game_id, -1);
		return true;
	}
	
	
	function gameWin($connect, $game_id) {
		$tile_data = getTileData($connect, $game_id);
		$tile1 = $tile_data["Tile_1"];
		$tile2 = $tile_data["Tile_2"];
		$tile3 = $tile_data["Tile_3"];
		$tile4 = $tile_data["Tile_4"];
		$tile5 = $tile_data["Tile_5"];
		$tile6 = $tile_data["Tile_6"];
		$tile7 = $tile_data["Tile_7"];
		$tile8 = $tile_data["Tile_8"];
		$tile9 = $tile_data["Tile_9"];
		
		if($tile1 == $tile2 && $tile2 == $tile3 && $tile3 !== "0")
		  {
			
			return true;
		  } 
		 
		else if($tile4 == $tile5 && $tile5 == $tile6 && $tile6 !== "0")
		  {
			
			return true;
		  } 
		else if($tile7 == $tile8 && $tile8 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile1 == $tile5 && $tile5 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile1 == $tile4 && $tile4 == $tile7 && $tile7 !== "0")
		  {
			return true;
		  }
		else if($tile2 == $tile5 && $tile5 == $tile8 && $tile8 !== "0")
		  {
			return true;
		  }
		else if($tile3 == $tile6 && $tile6 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile1 == $tile5 && $tile5 == $tile9 && $tile9 !== "0")
		  {
			return true;
		  }
		else if($tile3 == $tile5 && $tile5 == $tile7 && $tile7 !== "0")
		{
			return true;
		}
		else {
			return false;
		}
		
	}
		
	
	function setResult($connect, $game_id, $result) {
		$query = "UPDATE game_data SET game_result='$result' WHERE game_id='$game_id' AND game_result=0";
		mysqli_query($connect, $query) or die("Error: ".mysqli_error());
	}
	
	function getResult($connect, $game_id) {
		$query = "SELECT game_result FROM game_data WHERE game_id='$game_id'";
		$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
		
		$row = mysqli_fetch_array($result);
		return $row[0];
	}
		
	
	function increScore($connect, $id) {
		$query = "SELECT * FROM user_data WHERE user_id='$id'";
		$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
	
		$row = mysqli_fetch_array($result);
		$score = $row["Score"];
		
		$score++;
		
		$query = "UPDATE user_data SET Score='$score' WHERE user_id='$id'";
		mysqli_query($connect, $query) or die("Error: ".mysqli_error());
	
	}
	
?>