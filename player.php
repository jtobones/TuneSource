<?php
 include("lib/php/CONECTAR_DB.php");

?>

       
<!DOCTYPE html>
<!-- saved from url=(0043)https://www.script-tutorials.com/demos/363/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="author" content="Script Tutorials">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>HTML5 Audio player with playlist | Script Tutorials</title>

    <!-- add styles and scripts -->
    <link href="lib/css/styles.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="lib/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="lib/js/jquery-ui-1.8.21.custom.min.js"></script>
    <script type="text/javascript" src="lib/js/main.js"></script>
</head>
<body>
    <header>
        <h2>Back to '<a href="/TuneSource/Player.php">HTML5 Audio player with playlist</a>' view</h2>
    </header>
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

    </div>


</body></html>
