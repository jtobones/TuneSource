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
session_start();
if(!isset($_SESSION["id"])) { echo "Sesion no iniciada.";}
			else {

			$id = $_SESSION["id"];
			echo "El id del user es "." ".$id."<P>";
			$type = typeUser($connect, $id);
			echo "Modo admistrador solo si  0 =="." ".$type;
			if($type == "0"){
$home='/TuneSource';

// menu items ("title" => "link", comma delimited)
$menu = array(
	"Logout" => "$home/logoutProf.php",
	"Home" => "$home/menu.php",
	"Subir Canciones" => "$home/multi.php",
	"Ver Canciones" => "$home/view.php",
	"Play All" => "$home/player.php",
	"Search" => "$home/search.php",
	"Browse" => "$home/browser.php");


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
	<table width="80%" border="1">
    <tr>
    <th colspan="4">Estos archivos estan ya en el servidor...<label><a href="multi.php">Subir mas archivos....</a></label></th>
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
		}//if type =0

	}//else
								header("Location: usermenu.php");
	
}//session
	?>
    </table>
    
</div>
</body>
</html>
