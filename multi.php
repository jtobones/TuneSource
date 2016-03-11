<?php
include_once 'lib/php/CONECTAR_DB.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
        if($file_size > 4194304){
			$errors[]='Tamaño del archivo no debe ser menor a 5 MB';
        }		

		
		//insertar cancion subida en la base de datos
        $query = "INSERT INTO tbl_uploads(file,artist,album,songname, type ,size) VALUES('$file_name','','','','$file_type','$file_size') ";

		
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
            mysqli_query($connect, $query) or die("Error while getting tile data.");
        }else{
			?>
     <label>Error al subir !</label>;
     <label>Cancion Subida...  <a href="view.php">click para escuchar</a></label>
     <?php
                print_r($errors); ?>      <?php
        }
    }
	?>     
	<?php
	if(empty($error)){
		echo "Success"; ?>
    
     <label>Canciones Subidas...  <a href="view.php">click para escuchar</a></label>
     <?php
	}
	?>
    <?php
}
?>


</div>
<div id="footer">
<label>By <a href="http://www.tobon.es">Cobalto</a></label>
</div>
</body>
</html>


