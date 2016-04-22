<?php
    include("lib/php/CONECTAR_DB.php");
    require("lib/php/INGRESAR.php");
    session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


$user_id = $_SESSION['id'];

$sql = "select pls_id from playlist where playlist_name = '" . $_GET['playlist'] . "'";
$result = mysqli_query($connect, $sql) or die("Error: " . mysqli_error($connect));
$pls_id = mysqli_fetch_array($result, MYSQLI_NUM);

if (!isset($pls_id))
{
    $sql = "insert into playlist (playlist_name) values ('" . $_GET['playlist'] . "')";
    mysqli_query($connect, $sql);
    
    $sql = "select pls_id from playlist where playlist_name = '" . $_GET['playlist'] . "'";
    $result = mysqli_query($connect, $sql) or die("Error: " . mysqli_error($connect));
    $pls_id = mysqli_fetch_array($result, MYSQLI_NUM);
}   

$id = $_GET['id'];

$sql = "insert ignore into m3u (user_id, pls_id, id) values ($user_id, '$pls_id[0]', $id)";

if (mysqli_query($connect, $sql)) {
    echo "New record created successfully";
    sleep(2);
} 
else 
{
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
header("Location: Buscar.php");

?>