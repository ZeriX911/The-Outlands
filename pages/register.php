<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location.home.php");
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
    <link rel="stylesheet" href="../css/styleLogin.css">
    <link rel="stylesheet" media="print" href="../css/stylePrint.css" />
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
        <?php include('header.php');?>
            <main id="Container">
                <form>
                    <fieldset>
                        <h1 id="logintitle">Register</h1>
                        <div id="username-container"><label for="username">Username</label><br>
                            <input type="text" name="username" id="username" placeholder="Username">
                        </div>
                        <div id="email-container"><label for="email">E-mail</label><br>
                            <input type="email" name="email" id="email" placeholder="E-mail">
                        </div>
                        <div id="pwd-container"><label for="pwd">Password</label><br>
                            <input type="password" name="pwd" id="pwd" placeholder="Password">
                        </div>
                        <div id="pwd-verify-container"><label for="pwd-verify">Verify Password</label><br>
                            <input type="password" name="pwd-verify" id="pwd-verify" placeholder="Verify password">
                        </div>
                        <div id="date-container"><label for="date">Date Of Birth</label><br>
                            <input type="date" id="date" name="date" min="1900-01-01" max="2030-12-31" value="2022-01-01">
                        </div>
                        <div id="send-container">
                            <input type="submit" value="REGISTER">
                        </div>
                        <div id="reset-container">
                            <input type="reset" value="RESET">
                        </div>
                        <div id="registerhere">You already have an account? Login <a href="login.html"><strong>here</strong></a></div>
                    </fieldset>
                </form>
            </main>
            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>