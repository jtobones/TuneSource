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
    <th colspan="4">Estos archivos estan ya en el servidor...</a></label></th>
    </tr>
    <tr>
    
    <td>Artista</td>
    <td>Album</td>
    <td>Nombre</td>
    <td>Genero</td>
    <td>Play</td>
    </tr>


<?php
  if(isset($_POST['submit'])){
  if(isset($_GET['go'])){
  if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
  $name=$_POST['name'];


  //-query  the database table
  $sql="SELECT  id,file, artist, album, songname, genero FROM tbl_uploads WHERE songname LIKE '%" . $name .  "%' OR  artist LIKE '%" . $name ."%' OR  album LIKE '%" . $name ."%'";
  //-run  the query against the mysql query function
  $result=mysqli_query($connect, $sql);

  //-create  while loop and loop through result set
  while($row=mysqli_fetch_array($result)){
          $Songname  =$row['songname'];
          $Artist=$row['artist'];
          $ID=$row['id'];
  //-display the result of the array
    echo "<tr>\n";
  ?>
         
        <td><?php echo $row['artist'] ?></td>
        <td><?php echo $row['album'] ?></td>
        <td><?php echo $row['songname'] ?></td>
        <td><?php echo $row['genero'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">Play</a></td>
  
  <?php

//  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$Songname . " " . $Artist .  "</a></li>\n";
  echo "</tr>";
  }
  }
  else{
  echo  "<p>Please enter a search query</p>";
  }
  }
  }
?>

  </table>
    <h3>Buscar mas Canciones</h3>
    <p> artista, nombre cancion, album</p>
    <form  method="post" action="search.php?go"  id="searchform">
      <input  type="text" name="name">
      <input  type="submit" name="submit" value="Search">
    </form>
</div>
</body>
</html>
