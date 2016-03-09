<?php
include_once '/lib/php/dbconfig.php';
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
    <th colspan="4">Estos archivos estan ya en el servidor...<label><a href="index.php">Subir mas archivos....</a></label></th>
    </tr>
    <tr>
    <td>Nombre Archivo</td>
    <td>Artista</td>
    <td>Album</td>
    <td>Nombre</td>
    <td>Tipo</td>
    <td>File Size(KB)</td>
    <td>Play</td>
    </tr>
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($connect, $sql);
	while($row=mysqli_fetch_array($result_set))
	{
		?>
        <tr>
          
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['artist'] ?></td>
        <td><?php echo $row['album'] ?></td>
        <td><?php echo $row['songname'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">Play</a></td>
        <td><a href="uploads/<?php 
		
		echo $row['file'];	
//        $sql="DELETE FROM tbl_uploads WHERE file='{$row['file']}'";
//        if (mysqli_query($conn, $sql)) 
//        {
//        echo "Record deleted successfully";
//        } else 
//        {
//          echo "Error deleting record: " . mysqli_error($conn);
//        }
//        
//        mysqli_close($conn);
		
//        $path=$folder.$row['file'];
//        if(@unlink($path)) {echo "Deleted file "; }
//        else{echo "File can't be deleted";}
		

        
	?>        
        "target="_blank">delete</a></td>
        </tr>
        <?php
	}
	?>
    </table>
    
</div>
</body>
</html>