<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Search Contacts</title>
<style type="text/css" media="screen">
ul li{
  list-style-type:none;
}
</style>
</head>

<body>
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

?>
</body>
</html>
