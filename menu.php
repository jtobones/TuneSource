<?php
 include("lib/php/CONECTAR_DB.php");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<link rel="stylesheet" type="text/css" href="menu.css">
	</head>
	<body>

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

<title>Menu administrador</title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>TuneSource Menu modo Admin</label>
</div>
<div id="body">


<?php
}//if type =0
	else {
									header("Location: usermenu.php");
		}
	}//session


?>

	</body>
</html>
