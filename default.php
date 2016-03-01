<html>
	<head>
		<title>Tic Tac Toe</title>
		<link rel="stylesheet" type="text/css" href="lib/css/styles.css"/>
	</head>
	<body> TIC TAC TOE
		
		<div id="login">
		<form id="form2" action="" method="post">
			<label for="username">Name : </label><input type="text" name="username"/><br/>
                        <label for="email">Password : </label><input type="password" name="email"/><br/>
			<input type="hidden" name="formType" value="Login"/>
			<input type="submit" value="Login"/>
                          <div id="Registrar">
                    <a href="Registrar.php"> Registro</a>
		</div>
                       
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
						echo "Usuario Existe.";
                                                header("Location: Existe.php");
					}
				}
				else if($_POST["formType"] == "Login") {
					$username = $_POST["username"];
					$email = $_POST["email"];
					$id = loginUser($connect, $username, $email);
					if($id == false) {
						echo "Error al Ingreso";
					}
					else {
						
						session_start();
						$_SESSION["id"] = $id;
						header("Location: Triqui.php");
					}
				}
			}
			else {
				echo "Llenar informacion ingreso";
			}
		?>
		</div>
	</body>
</html>
