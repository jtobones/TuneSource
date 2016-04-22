<?php
	include ("lib/php/CONECTAR_DB.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



	<head>
		<link rel="stylesheet" type="text/css" href="menu.css">
	</head>
	<body>

			<font face="Times New Roman" size="+1" >
			<h1 class="Title">Tune Source User Mode</h1>
			</font>	

<?php
require("lib/php/INGRESAR.php");
session_start();
if(!isset($_SESSION["id"])) { echo "Sesion no iniciada.";
						header("Location: index.php");		
				}
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
<table width="80%" border="1">
<link rel="stylesheet" href="vmenu.css" type="text/css" />
<ul class="vmenu">
<li><a href="Cuenta.php" >Mi Cuenta  </a></li>
<li><a href="Listas.php" >Mis  Listas</a></li>
<li><a href="Ver.php">Mis Canciones</a></li>
<li><a href="Reproducir.php">Reproducir</a></li>
</ul>


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
  ?>
     <tr>
    <th colspan="4">Estos archivos estan ya en el servidor...</a></label></th>
    </tr>
    <tr>
    
    <td>Artista</td>
    <td>Album</td>
    <td>Nombre</td>
    <td>Genero</td>
    <td>Play</td>
    <td>Agregar</td>
    </tr>

<?php
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
        <td>
             <form action="add.php" method="get">
                <input type="text" name="id" value="<?php echo $row['id'] ;?>" hidden>
                <input type="text" name="playlist" placeholder="ingrese playlist"/>
                <input type="submit" value="Agregar"/>
            </form> 
            
        
        </td> 
  
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
  
  }//if type =0
	else {
									header("Location: usermenu.php");
		}
	}//session
  
?>

  </table>
  </div>
  <div>
    <h3>Buscar mas Canciones</h3>
    <p> artista, nombre cancion, album</p>
    <form  method="post" action="search.php?go"  id="searchform">
      <input  type="text" name="name">
      <input  type="submit" name="submit" value="Search">
    </form>
</div>
</body>
</html>
