<?php
 include("lib/php/CONECTAR_DB.php");
?>

<html>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Crear Usuario </title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label> Registrarse </label>
</div>
	<head>
		<link rel="stylesheet" type="text/css" href="menu.css">
	</head>

			<font face="Times New Roman" >
			<h1 class="Title">Tune Source User Mode</h1>
			</font>	
	<body>


<?php
 include("lib/php/CONECTAR_DB.php");

?>
	<body>

			<font face="Times New Roman" size="+1" >

			</font>	
				<h2 class="Title"> REGISTRAR TUNE SOURCE SERVER </h2>
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
