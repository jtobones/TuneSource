<?php
 include("lib/php/CONECTAR_DB.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="menu.css">
	<font face="Times New Roman" size="+1" >
		<h1 class="Title">Tune Source Admin Mode</h1>
	</font>	

<?php
require("lib/php/INGRESAR.php");
//$id=4;
session_start();
if(!isset($_SESSION["id"])) { echo "Sesion no iniciada.";}
			else {

			$id = $_SESSION["id"];
			echo "El id del user es "." ".$id."<P>";
			$type = typeUser($connect, $id);
			echo "Modo admistrador solo si  0 =="." ".$type;
			if($type != "0"){
$home='/TuneSource';

// menu items ("title" => "link", comma delimited)
$menu = array(
	"Logout" => "$home/logoutProf.php",
	"Home" => "$home/usermenu.php",
	"Buscar" => "$home/Buscar.php",
	"Navegar" => "$home/Navegar.php");


function siteMenu(){
	global $menu;
	
	$curlink = $_SERVER['REQUEST_URI'];
	
	$out = "<div id=\"menu\"><ul>\n";
	foreach($menu as $title => $link) {
		if($link == $curlink) { // highlight current item
			$out.= "<li class=\"current\"><span>" . $title . "</span></li>\n";
		}
		else { // links to all other items
			$out.= "<li><a href=\"" . $link . "\">" . $title . "</a></li>\n";
		}
	}
	$out.= "</ul></div>\n";
	
	return $out;
}

// output the menu
echo siteMenu();
?>


<title>Caciones en el servidor </title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Canciones en el servidor</label>
</div>
<div id="body">
<link rel="stylesheet" href="vmenu.css" type="text/css" />
<ul class="vmenu">
<li><a href="Cuenta.php" >Mi Cuenta  </a></li>
<li><a href="Listas.php" >Mis  Listas</a></li>
<li><a href="Ver.php">Mis Canciones</a></li>
<li><a href="Reproducir.php">Reproducir</a></li>
</ul>

<!--  
	<table width="80%" border="1">
    <tr>
    <th colspan="4">Estas son las listas en el servidor</th>
    </tr>
    <tr>
    <td>id</td>
    <td>Nombre lista</td>

    <td>Delete</td>
    </tr>
    
   -->
    <?php
	
	$sql1 = "SELECT DISTINCT user_data.user_id, playlist.pls_id, playlist.playlist_name\n"
    . "FROM user_data INNER JOIN (playlist INNER JOIN m3u ON playlist.pls_id = m3u.pls_id) ON user_data.user_id = m3u.user_id\n"
    . "WHERE (((user_data.user_id)=$id))";
	
    $counter = 0;
	$pls = '1002'; // For example
	
	$result_set=mysqli_query($connect, $sql1);
	while($row=mysqli_fetch_array($result_set))
	{
        ${'pls'.$counter} = $row['pls_id'];
        $counter++;
		?>
        <!--  
        <tr>         
        <td><?php //echo $row['pls_id'] ?></td>
        <td><?php //echo $row['playlist_name'] ?></td>
        <td><a href="uploads/<?php //echo $row['playlist_name'] ?>" target="_blank">Delete</a></td>
        
      -->   
        
<?php
					//		echo $counter."<P>";	    

	    
		}//if type =0
		
		?>
	    </tr>
       </table>
       <p>
      
	<?php
	}//else
?>
	<table width="80%" border="1">
    <tr>
<?php



for ($i = 0; $i < $counter; $i++) {
 //echo       ${'pls'.$i} ;
 $sql2 = "SELECT DISTINCT user_data.user_id, playlist.pls_id, playlist.playlist_name\n"
    . "FROM user_data INNER JOIN (playlist INNER JOIN m3u ON playlist.pls_id = m3u.pls_id) ON user_data.user_id = m3u.user_id\n"
    . "WHERE (((user_data.user_id)=$id) AND ((playlist.pls_id)=${'pls'.$i}\n"
    . " ))";
	$result_set=mysqli_query($connect, $sql2);
 ?>
 <?php echo $row['playlist_name'] ?>
 

<?php

$sql = "SELECT playlist.playlist_name, tbl_uploads.Id, tbl_uploads.artist, tbl_uploads.file, tbl_uploads.songname, tbl_uploads.size, tbl_uploads.type, tbl_uploads.album\n"
    . "FROM user_data INNER JOIN (tbl_uploads INNER JOIN (playlist INNER JOIN m3u ON playlist.pls_id = m3u.pls_id) ON tbl_uploads.Id = m3u.Id) ON user_data.user_id = m3u.user_id\n"
    . "WHERE (((user_data.user_id)=$id) AND ((playlist.pls_id)=${'pls'.$i}))";
?> 
     <td>Nombre Archivo</td>
    <td>Artista</td>
    <td>Album</td>
    <td>Nombre</td>
    <td>Tipo</td>
    <td>File Size(KB)</td>
    <td>Playlist</td>
    <td>Play</td>
    </tr>
  <?php

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
        <td><?php echo $row['playlist_name'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">Play</a></td>
        </tr>
	<?php 
	}//while
}//for
	
}//session

	?>
    </table>
    
</div>
</body>
</html>
