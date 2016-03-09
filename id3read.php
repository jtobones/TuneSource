<?php
    require('/lib/php/error.inc.php');
    require('/lib/php/id3.class.php');
    include '/lib/php/dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ID3 tags </title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>TuneSource ID3 tags </label>
</div>
<div id="body">
  <?php  
    
    $query="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($connect, $query);
        echo('<HTML>');
   
        while($row=mysqli_fetch_array($result_set)){
            $nome_arq  = $row['file'];
    
	 $myId3 = new ID3($folder.$nome_arq);
	 if ($myId3->getInfo()){
         echo('<table border=1>
               <tr>
                  <td><strong>Artista</strong></td>
                  <td><strong>Titulo</strong></font></div></td>
                  <td><strong>Titulo</strong></font></div></td>
                  <td><strong>Album/Ano</strong></font></div></td>
                  <td><strong>G&ecirc;nero</strong></font></div></td>
                  <td><strong>Coment&aacute;rios</strong></font></div></td>
                  <td><strong>Play</strong></font></div></td>
               </tr>
               <tr>
                  <td>'. $myId3->getArtist() . '&nbsp</td>
                  <td>'. $myId3->getTitle()  . '&nbsp</td>
                  <td>'. $myId3->getTrack()  . '&nbsp</td>
                  <td>'. $myId3->getAlbum()  . '/'.$myId3->getYear().'&nbsp</td>
                  <td>'. $myId3->getGender() . '&nbsp</td>
                  <td>'. $myId3->getComments() . '&nbsp</td>
                  <td><a href="'.$folder.$nome_arq.'" target="_blank">Play</a></td>

               </tr>
            </table>');
         echo('</HTML>');
   	}else{
		echo('<br>');
    	echo($errors[$myId3->last_error_num]);
		echo(' ');
		echo $nome_arq;	
		echo('</br>');
   }
 }//
?>
