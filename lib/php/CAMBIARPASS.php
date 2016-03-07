<?php
        include("CONECTAR_DB.php");
        function cambiarPass($connect, $username, $email, $correo) {
           
		$query = "INSERT INTO user_data SET pass='$email'";
		mysqli_query($connect,$query) or die("Error: " . mysqli_error());
		return true;
		
        }

?>