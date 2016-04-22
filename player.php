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


    <title>HTML5 Audio player with playlist </title>

    <!-- add styles and scripts -->
    <link href="lib/css/styles.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="lib/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="lib/js/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="lib/js/main.js"></script>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Canciones en el servidor</label>
</div>
<div id="body">
</div>

    <div class="html5player">

         <div class="player">
            <div class="pl"></div>
            <div class="title"></div>
            <div class="artist"></div>
            <div class="cover"></div>
            <div class="controls">
                <div class="play"></div>
                <div class="pause"></div>
                <div class="rew"></div>
                <div class="fwd"></div>
            </div>
            <div class="volume"></div>
            <div class="tracker"></div>
        </div> 
<ul class="playlist ">
    
    
    <?php

	
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($connect, $sql);
	while($row=mysqli_fetch_array($result_set))
	{
	?>
    
    <li audiourl="<?php echo $folder."/".$row['file'] ?>" cover="cover2.jpg" artist="<?php echo $row['artist'] ?>"><?php echo $row['songname'] ?></li>
	<?php
    }

	?>
    

    </ul>

</body>
        <?php
				}//if type =0
	else {
									header("Location: usermenu.php");
		}
	
}//session
	?>

</html>
