<?php
include_once('connect.php');
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
  header("Location: /pages/index.php");
  exit;
}


include_once('post.php');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Outlands</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/styleLFG.css">
    <link rel="stylesheet" href="../css/styleLogin.css">
    <link rel="stylesheet" href="../css/styleCreatePost.css">
    <link rel="stylesheet" media="print" href="../css/stylePrint.css" />
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
        <?php include('header.php');?>
            <main id="Container">
                <h1 id="logintitle">CREATE A POST</h1>
                <form method="POST" action="createpost.php">
                    <div id="teamname-container"><label for="teamname">Team Name</label><br>
                        <input type="text" name="teamname" id="teamname" placeholder="Team name">
                    </div>
                    <div id="playercount-container"><label for="playercount">Already joined players</label><br>
                        <select name="playercount" id="playercount">
                        
                            <option value="1">1</option>
                            <option value="2">2</option>
                </select>
                    </div>
                    <div id="playstyle-container"><label for="playstyle">Team playstyle</label><br>
                        <select name="playstyle" id="playstyle">
                    <option value="competetive">Competetive</option>
                    <option value="casual">Casual</option>
                    <option value="toriented">Tournament Oriented</option>
                    <option value="havingfun">Having Fun</option>
                </select>
                    </div>
                    <div id="description-container"><label for="descriptionText">Team Description</label><br>
                        <textarea name="description" id="descriptionText" cols="100" rows="20" placeholder="Description"></textarea>
                    </div>
                    <div id="send-container">
                        <input type="submit" name="form" value="CREATE POST">
                    </div>
                </form>
            </main>
            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>