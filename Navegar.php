<?php
	include ("lib/php/CONECTAR_DB.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
<table width="80%" border="1">

<h3>Buscar Canciones</h3>
<p>Lee los tags de las canciones</p>
<form method="post" action="search.php?go" id="searchform">
<input type="text" name="name">
<input type="submit" name="submit" value="Search">
</form>
<p>Navegar por nombre artista</p>
<p><a href="?by=A">A</a> | <a href="?by=B">B</a> | <a href="?by=K">K</a></p>



<?php
	include ('lib/php/CONECTAR_DB.php');
if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/[A-Z | a-z]+/", $_POST['name'])){
$name=$_POST['name'];

  //-query  the database table
  $sql="SELECT  id, file, album, songname FROM tbl_uploads WHERE songname LIKE '%" . $name .  "%' OR  artist LIKE '%" . $name ."%' OR  album LIKE '%" . $name ."%'";
  //-run  the query against the mysql query function
  $result=mysqli_query($connect, $sql);

//-count results

$numrows=mysqli_num_rows($sql);


echo "<p>" .$numrows . " results found for " . stripslashes($name) . "</p>"; 

//-create while loop and loop through result set
  //-create  while loop and loop through result set
  while($row=mysqli_fetch_array($sql)){
          $Songname  =$row['file'];
          $Artist=$row['artist'];
          $ID=$row['id'];
		
//-display the result of the array

  echo "<ul>\n";
  echo "<li>" . "<a  href=\"search.php?id=$ID\">"   .$Songname . " " . $Artist .  "</a></li>\n";
  echo "</ul>";
}
}
else{
echo "<p>Please enter a search query</p>";
}
}
}

if(isset($_GET['by'])){
$letter=$_GET['by'];

//connect to the database
//-query the database table
$sql="SELECT id, songname, artist FROM tbl_uploads WHERE songname LIKE '%" . $letter . "%' OR LastName LIKE '%" . $letter ."%'";


//-run the query against the mysql query function
 $result=mysqli_query($connect, $sql);

//-count results
$numrows=mysql_num_rows($result);

echo "<p>" .$numrows . " results found for " . $letter . "</p>"; 

//-create while loop and loop through result set
while($row=mysql_fetch_array($result)){

$FirstName =$row['artist'];
	$LastName=$row['artist'];
	$ID=$row['ID'];
	
//-display the result of the array

echo "<ul>\n"; 
echo "<li>" . "<a href=\"search.php?id=$ID\">"  .$artist . " " . $songname . "</a></li>\n";
echo "</ul>";
}
}

if(isset($_GET['id'])){
$contactid=$_GET['id'];

//connect to the database

//-query the database table
$sql="SELECT * FROM tbl_uploads WHERE ID=" . $id;


//-run the query against the mysql query function
 $result=mysqli_query($connect, $sql);


//-create while loop and loop through result set
while($row=mysql_fetch_array($result)){

  $FirstName =$row['artist'];
	$LastName=$row['songname'];
	$PhoneNumber=$row['album'];
	$Email=$row['file'];

//-display the result of the array

echo "<ul>\n"; 
echo "<li>" . $FirstName . " " . $LastName . "</li>\n";
echo "<li>" . $PhoneNumber . "</li>\n";
echo "<li>" . "<a href=mailto:" . $Email . ">" . $Email . "</a></li>\n";
echo "</ul>";
}
}
}//if type =0
	else {
									header("Location: usermenu.php");
		}
	}//session


?>
</body>
</html>

