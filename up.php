<?php
include_once '/lib/php/dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Subir archivos al servidor por el administrador</title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>TuneSource subir 1 archivo </label>
</div>
<div id="body">
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">upload</button>
	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>Cancion Subida...  <a href="view.php">click para escuchar</a></label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Error al subir !</label>
        <?php
	}
	else
	{
		?>
        <label>Se aceptan varios formatos de cancion (mp3, wav, midi, ogg) </label>
    <br></br>    
		   <label>El limite es 40mb </label>
        <?php
	}
	?>
</div>
<div id="footer">
<label>By <a href="http://www.tobon.es">Cobalto</a></label>
</div>
</body>
</html>