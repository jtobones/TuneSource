<?php
	include ("lib/php/CONECTAR_DB.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Caciones en el servidor </title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Canciones en el servidor</label>
</div>
<div id="body">
	<table width="80%" border="1">
    <tr>
    <th colspan="4">Esto son mis playlist servidor...<label></label></th>
    </tr>
    <tr>
    <td>Nombre Playlist</td>
    <td>Nro canciones</td>
    </tr>
    <?php
	//$user_id  session
	$sql="SELECT playlist_name FROM playlist where pls_id=4 ";
	$result_set=mysqli_query($connect, $sql);
	while($row=mysqli_fetch_array($result_set))
	{
		?>
        <tr>
          
        <td><?php echo $row['playlist_name'] ?></td>
<!--
        <td><a href="editarPL.php?go=<?php echo $row['pls_id'] ?>" target="_blank">Edit Plalis</a></td>
-->
           </tr>
        <?php
	}
	?>
    </table>
    
</div>
</body>
</html>
