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

<title>Subir archivos al servidor por el administrador</title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>TuneSource upload archivos modo Admin</label>
</div>
<div id="body">
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="files[]" multiple/>
	<input type="submit"/>
</form>

<?php

if(isset($_FILES['files'])){
    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
//	modo de poder subir varias veces el mismo archivo 
//	$file_name = $key.$_FILES['files']['name'][$key];
		$file_name = $_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
                //tamaño (MB) ( 200 )* 1024 * 1024
        if($file_size >  209715200){
			$errors[]='Tama&ntilde;o del archivo debe ser camenor a 10 MB';
                        
        }		

	//insertar cancion subida en la base de datos
        //$query = "INSERT INTO tbl_uploads(file,artist,album,songname, type ,size) VALUES('$file_name','','','','$file_type','$file_size') ";
        $query ="INSERT INTO tbl_uploads(file,artist,album,songname,genero, type,idtag ,size)  VALUES    ('$file_name', '', '', '', '','$file_type','','$file_size') ";
		
        $desired_dir=$folder;
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            }else{									// rename the file if another one exist
                $new_dir="$desired_dir/".$file_name.time();
                 rename($file_tmp,$new_dir) ;				
            }
            mysqli_query($connect, $query) or die("ERROR BASE DE DATOS");?>
            <label>Cancion Subida...  <a href="view.php">click para escuchar   </a></label>
                <?php
        }else{
	     //Error por exceso tamaño; 
                print_r($errors);
                
                ?>
                <label>Error al subir excede el Tama&ntilde;o  <a href="multi.php">Intentar de nuevo...  </a></label>
                    <?php
        }
    }

	if(empty($errors)==true){
		echo "Success  "; 
     ?>
    
     <label>Subir   <a href="multi.php">  Mas canciones  </a></label>
     <?php
	}
}

}//if type =0
	else {
									header("Location: usermenu.php");
		}
	}//session


?>


</div>
<div id="footer">
<label>By <a href="http://www.tobon.es">Cobalto</a></label>
</div>
</body>
</html>


