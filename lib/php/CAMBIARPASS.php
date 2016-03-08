<?php
        include("CONECTAR_DB.php");
        function cambiarPass($connect, $username, $email, $correo) {
            if(checkAvailability($connect, $username)) {
		$query = "INSERT INTO user_data SET pass='$email'";
		mysqli_query($connect,$query) or die("Error: " . mysqli_error());
		return true;
	    }
		
	    else {
	        return false;
	    }
        }
        function checkAvailability($connect, $username) {
		$query = "SELECT * FROM user_data WHERE user_name='$username'";
		$result = mysqli_query($connect,$query);
		$row = mysqli_fetch_array($result);
		if($row['user_name'] == $username) {
			return true;
		}
		else {
			return false;
		}
	}

?>