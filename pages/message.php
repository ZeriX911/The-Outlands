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
    <link rel="stylesheet" href="../css/styleLogin.css">
    <link rel="stylesheet" href="../css/styleUsers.css">
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
                        <div id="messageuser-container">
                        <h1 id='logintitle'>Chatting with user</h1>
                        <div id="message-container"><label for="messageText">Message</label><br>
                            <textarea name="message" id="messageText" cols="100" rows="20" placeholder="Message"></textarea>
                        </div>
                        <div id="send-container">
                            <input type="submit" value="Send message">
                        </div>
                        </div>
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