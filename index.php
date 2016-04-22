<?php
 include("lib/php/CONECTAR_DB.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  

<link rel="stylesheet" href="lib/css/inicio.css" type="text/css" />

</head>


<body>
<div id="header">
<label>Canciones en el servidor</label>

			<font face="Times New Roman" size="+1" >
			<h1 class="Title">Tune Source General</h1>
			</font>	

		
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
					$type = superUser($connect, $username, $email);
					if($id == false) {
						echo "Error al Ingreso";
					}
					else {
						if($type == "0") {				
							session_start();
							$_SESSION["id"] = $id;
							header("Location: menu.php");
						}
						else{
							session_start();
							$_SESSION["id"] = $id;
							header("Location: usermenu.php");
						}
					}
				}
			}
			else {
				echo "Llenar informacion ingreso";
			}
		?>
		</div>
    <div id="u104">
	      <!-- custom html -->
    </div>
	</body>
</html>
