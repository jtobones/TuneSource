
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "/lib/php/dbconfig.php";



$xml = '';

//query para generar el playlist de los usuarios

$query = "SELECT * FROM tbl_uploads";
$result = mysqli_query($connect, $query) or die("Error: ".mysqli_error());
		

while ( $row = mysqli_fetch_array ($result ) ){
    //Add to xml
    $xml .= "<song>\r\n";
    $xml .= '<filename>' . $row['file'] . "</filename>\r\n";
    $xml .= '<artist>' . $row['artist'] . "</artist>\r\n";
    $xml .= '<album>' . $row['album'] . "</album>\r\n";
    $xml .= '<songname>' . $row['songname'] . "</songname>\r\n";
    $xml .= "</song>\r\n";
}
//Write to playlist.xml in the same directory.  Will override any other playist.xml file
$handle = fopen('playlist.xml', 'w+');
fwrite($handle, $xml);


?> 

