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
                <h1 id="logintitle">HOW TO JOIN A TEAM</h1>
                <p id="howtojoin">If you want to join a team, then use the website's 'Mail' page to message the owner of the team you wish to join.</p>
                <p class="step">1. Click the 'Mail' button in the navigation bar (last tab)</p>
                <p class="step">2. Select the user in dropdown list who you want to message</p>
                <p class="step">3. Write them a message that you would like to join their team</p>
            </main>
            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>

