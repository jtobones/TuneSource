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
    <tr>
    <th colspan="4">Este es su credito en el servidor</th>
    </tr>
    <tr>
    <td>id</td>
    <td>Nombre </td>

    <td>Credito</td>
    </tr>
    

    <?php
	
	$sql = "SELECT user_data.user_id, user_data.user_name, user_data.Score\n"
    . "FROM user_data\n"
    . "WHERE (((user_data.user_id)=4))";
	
    $counter = 0;
	
	$result_set=mysqli_query($connect, $sql);
	while($row=mysqli_fetch_array($result_set))
	{
		?>
 
        <tr>         
        <td><?php echo $row['user_id'] ?></td>
        <td><?php echo $row['user_name'] ?></td>
        <td><?php echo $row['Score'] ?></td>

        
<?php
	    
		}//if type =0
		
		?>
	    </tr>
       </table>
       <p>
      
	<?php
	}//else
}//session
?>
	
</div>
</body>
</html>
