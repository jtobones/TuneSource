
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Ejecutar Generador de playlist</title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>General el playlist de MySQL</label>
</div>
<div id="body">
    <form action="playlist.php" method="post" >
<button type="submit" name="btn-upload">Crear Playlist</button>



	</form>
    <br /><br />
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>Playlist creado...  <a href="play.php">click para escuchar</a></label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Error  !</label>
        <?php
	}
	else
	{
		?>
        
        <?php
	}
	?>
</div>
<div id="footer">
<label>By <a href="http://www.tobon.es">Cobalto</a></label>
</div>
</body>
</html>