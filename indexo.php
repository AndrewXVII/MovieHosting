
<?php
require_once("includes/classes/connection.php");
require_once("includes/classes/vidPlayer.php");
require_once("includes/classes/video.php");

if(isset($_SESSION["userLoggedIn"])) {
    header("Location: indexo.php");

}

?>

<!DOCTYPE html>
<html>
    <head>


    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta charset="utf-8">
<title>MovieHosting</title>

<link rel="stylesheet" type = "text/css" href="assets/styles.css">

<link rel="shortcut icon" href="ikon.ico" type="image/x-icon" />
</head>


<div id="warning">!!!This site is still under heavy and operose development!!!</div>
            <div id="userButtons">
                <a  style = "float:right" button id="header"  href="logout.php"  class="more">Log Out</a>
                
                  
                
            </div>
       
       
     <div class="searchbar">
	<form action="/" method="post">
		<input type="text" placeholder="Search..." name="search">
		<button type="submit">Search</button>
	</form>
</div>






<div class = "div-video-container">

<a href = "watch.php?id=1" > 
  <img alt="Harakiri" src="movieDes/images/harakiri.jpg" style="object-fit:cover;  width:300px; height:500px">
        </a>

<a href = "watch.php?id=5" >
    <img alt="Seven Samurai" src="movieDes/images/seven_samurai.jpg" style="object-fit:cover;  width:300px; height:500px">
        </a>



<a href = "watch.php?id=2" >
    <img alt="Guns Of Navarone" src="movieDes/images/guns_of_navarone.jpg" style="object-fit:cover;  width:300px; height:500px">
        </a>


<a href = "watch.php?id=1" > 
  <img alt="Harakiri" src="movieDes/images/harakiri.jpg" style="object-fit:cover;  width:300px; height:500px"> 
        </a>

<a href = "watch.php?id=1" > 
  <img alt="Harakiri" src="movieDes/images/harakiri.jpg" style="object-fit:cover;  width:300px; height:500px">
        </a>



</div>


  


    
<!--
Found code how to add github octocat on the website and did it. Couldn't resist.
    -->

<a href="https://github.com/AndrewXVII/testen" class="github-corner" aria-label="Paskatīt kodu githabā" title="View source on GitHub">
    <svg width="90" height="90" viewBox="0 0  250 250" style="fill:#000000; color:rgb(95, 13, 150); position: fixed; bottom: 0; border: 0; right: 0;transform:scale(1,-1)" aria-hidden="true">
        <path d="M0,0 L115,115 L250,250 L250,0 Z"></path>
        <g transform="rotate(-180 130 106) translate(-75 45)">
            <path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path>
            <path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path>
        </g>
    </svg>
</a>




</html>
