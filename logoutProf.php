<?php
	
	include("lib/php/CONECTAR_DB.php");
	include("lib/php/INGRESAR.php");
	
	session_start();
	$id = $_SESSION["id"];
	logoutUser($connect, $id);
	
	
	
?>
