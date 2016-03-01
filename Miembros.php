<?php
	include("lib/php/PERFIL.php");
	include("lib/php/CONECTAR_DB.php");
	
        session_start();
        $id = $_SESSION["id"];

	$member_online = getPeopleOnline($connect);
	
	for($i = 0; $i<count($member_online);$i++) {
		
		$profile_info = getProfile($connect, $member_online[$i]);
		$profile_id = $profile_info[0];
                if($profile_id !== $id) {
		    $profile_name = $profile_info[1];
		
		    echo "<div><a href=GAME.php?mode=0&challenged_id=$profile_id>$profile_name</a></div>";
                }
	}
?>	