<!DOCTYPE html>
<html>
    <head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="utf-8">
<link rel="stylesheet" type = "text/css" href="assets/styles.css">

<link rel="shortcut icon" href="ikon.ico" type="image/x-icon" />
</head>
</html>
<?php


require_once("includes/classes/connection.php");
require_once("includes/classes/vidPlayer.php");
require_once("includes/classes/video.php");

$movie = new Video($dbcon , $_GET['id'] );  //creating an instance of the Video class
$vidPlayer = new vidPlayer($movie);

echo $vidPlayer->stream(true);
?>






