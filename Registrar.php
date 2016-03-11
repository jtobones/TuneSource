		<?php
			require("lib/php/CONECTAR_DB.php");
			require("lib/php/INGRESAR.php");
			require("lib/php/REGISTRAR.php");
			if(!empty($_POST["formType"])) {
				if($_POST["formType"] == "Registrar") {
					$username = stripslashes(htmlspecialchars($_POST["username"]));
					$email = stripslashes(htmlspecialchars($_POST["email"]));
                    $correo = stripslashes(htmlspecialchars($_POST["correo"]));
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