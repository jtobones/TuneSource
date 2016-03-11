<?php
        include("CONECTAR_DB.php");
        function cambiarPass($connect, $username, $email, $correo) {
            if(checkAvailability($connect, $username, $correo)) {
		$query = "INSERT INTO user_data SET pass='$email'";
		mysqli_query($connect,$query) or die("Error: " . mysqli_error());
		return true;
	    }
		
	    else {
	        return false;
	    }
        }
        function checkAvailability($connect, $username, $correo) {
		$query = "SELECT * FROM user_data WHERE user_name='$username' AND correo='$correo'";
		$result = mysqli_query($connect,$query);
		$row = mysqli_fetch_array($result);
		if($row['user_name'] == $username && $row['correo'] == $correo) {
			return true;
		}
		else {
			return false;
		}
	}

?>