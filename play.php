<?php
include_once '/lib/php/dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Play Playlist</title>
<link rel="stylesheet" href="lib/css/style.css" type="text/css" />
</head>
<body>
<div id="header">
<label>Play Playlist </label>
</div>
<div id="body">

<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Script Tutorials" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>HTML5 Audio player with playlist | Script Tutorials</title>

    <!-- add styles and scripts -->
    <link href="lib/css/player.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="lib/css/style.css" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>
        
          
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
		echo "leer db";
	?>
    
    <li audiourl=<?php echo $folder.$row['file'] ?> cover="cover2.jpg" artist="Artist 2">"01.mp3"</li>
	     <?php
    }
	?>
    

    <li audiourl="02.mp3" cover="cover2.jpg" artist="Artist 2">02.mp3</li>
    <li audiourl="03.mp3" cover="cover3.jpg" artist="Artist 3">03.mp3</li>
    <li audiourl="04.mp3" cover="cover4.jpg" artist="Artist 4">04.mp3</li>
    <li audiourl="05.mp3" cover="cover5.jpg" artist="Artist 5">05.mp3</li>
    <li audiourl="06.mp3" cover="cover6.jpg" artist="Artist 6">06.mp3</li>
    <li audiourl="07.mp3" cover="cover7.jpg" artist="Artist 7">07.mp3</li>

<-->
</ul>


</body>
	</html>
