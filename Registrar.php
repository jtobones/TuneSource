<html>
	<head>
		<title>TicTacToeDev</title>
		<link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
	</head>
	<body> TIC TAC TOE SERVER
		<div id="Registrar">
			<form id="form1" action="" method="post">
				<label for="username">Name : </label><input type="text" name="username"/><br/>
                                <label for="email">Password : </label><input type="password" name="email"/><br/>
				<input type="hidden" name="formType" value="Registrar"/>
				<input type="submit" value="Registrar me"/>
			</form>
		</div>
		
		<div id="feedback">
		<?php
			require("lib/php/CONECTAR_DB.php");
			require("lib/php/INGRESAR.php");
			require("lib/php/REGISTRAR.php");
			if(!empty($_POST["formType"])) {
				if($_POST["formType"] == "Registrar") {
					$username = stripslashes(htmlspecialchars($_POST["username"]));
					$email = stripslashes(htmlspecialchars($_POST["email"]));
					$user = createUser($connect, $username, $email);
					if($user == false) {
						echo "Usuario Existe";
                                                header("Location: Existe.php");
					}
                                        else {
						
						echo "Usuario creado";
						header("Location: Creado.php");
					}
                                        
				}
				else if($_POST["formType"] == "Login") {
					$username = $_POST["username"];
					$email = $_POST["email"];
					$id = loginUser($connect, $username, $email);
					if($id == false) {
						echo "Error en el Nombre de usuario o Password";
					}
					
				}
			}
			else {
				echo "Llenar Informacion";
			}
		?>
		</div>
	</body>
</html>
