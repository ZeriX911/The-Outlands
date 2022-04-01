<?php

session_start();
     
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outlands</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleHome.css">
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include('header.php');?>
            <main id="main">
                <img id="splash" alt="nemszeretekaltotadnidemuszajszovalittvannesze" src="../img/splash.jpg">
                <a href="#helo"><button  id="mainbutton">Continue</button></a>
                <div id="helo"></div>
                <h1 id="maintitle">THE OUTLANDS</h1>
                <article id="mainarticle">
                    This is a community based project developed by 2 people.<br> The goal of this site is to help players find the information<br> they are looking for about the game Apex Legends.
                </article>
                <p id="trailer">Trailer</p>
                <video controls width="80%">
                    <source src="../css/trailer.mp4" type="video/mp4">
                </video>
            </main>
            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>