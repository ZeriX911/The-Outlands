<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
  header("Location: /pages/index.php");
  exit;
}
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
    <link re="stylesheet" href="../css/styleProfile.css">
    <link rel="stylesheet" media="print" href="../css/stylePrint.css" />
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
        <?php include('header.php');?>
            <main id="Container">
                <h1 id="logintitle">PROFILE</h1>
                <form method="post">
                    <?php

                        require_once('connect.php');

                        $uname = $_SESSION["id"];
                        $query = "SELECT username, email, currentteam, birth, pic FROM users WHERE id=$uname";
                        $resultq = $connect -> query($query);
                        if($resultq)
                        {
                          while($row = $resultq -> fetch_array())
                          {
                            
                            if($row[1] == NULL){$row[1] = "not set";}
                            if($row[2] == NULL){$row[2] = "not set";}
                            if($row[3] == NULL){$row[3] = "not set";}
                            if($row[4] == NULL){$row[4] = "Profile picture not set"}
                            
                            echo "<div id='image-container'><label for='mypic' class='profquery'>{$row[4]}</label><br>";
                            echo "<div id='username-container'><label for='myusername' class='profquery'>Username: {$row[0]}</label><br>";
                            echo "<div id='username-container'><label for='myemail' class='profquery'>E-mail: {$row[1]}</label><br>";
                            echo "<div id='username-container'><label for='myteam' class='profquery'>Current team: {$row[2]}</label><br>";
                            echo "<div id='username-container'><label for='mybirth' class='profquery'>Birth: {$row[3]}</label><br>";
                          }
                        }
                    ?>
                    <div id="send-container">
                        <input type="button" id="logoutbutton" onclick="location.href='logout.php'" value="LOGOUT">
                    </div>
                    <div id="send-container">
                        <input type="button" id="removeacc" onclick="location.href='removeprofile.php'" value="DELETE ACCOUNT">
                    </div>
                    <div id="send-container">
                        <input type="button" id="editacc" onclick="location.href='editprofile.php'" value="EDIT PROFILE">
                    </div>
                    <div id="send-container">
                        <input type="button" id="listprofiles" onclick="location.href='listprofiles.php'" value="LIST OTHER PROFILES">
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

