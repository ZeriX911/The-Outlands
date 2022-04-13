<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
  header("Location: /pages/index.php");
  exit;
}
include_once("connect.php");
include_once("messages.php");
get_messages();
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
    <link rel="stylesheet" href="../css/styleLFG.css">
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
        <?php include('header.php');?>
                    <main id="Container">
                        <table>
                            <tr>
                
                                    <th>Sender</th>
                                    <th>Receiver</th>
                                    <th>Message</th>
                                
                            </tr>
                            <?php 
                            foreach($messages as $message) {
                            ?> 
                            <tr>
                                <td><?php echo $message->get_sender(); ?></td>
                                <td><?php echo $message->get_receiver(); ?></td>
                                <td><?php echo $message->get_text(); ?></td>
                            </tr>
                            
                            
                            <?php

                            }?>
                        </table>




                    <form method="POST" action="messenger.php">
                    <fieldset>
                        <div id="messageuser-container">
                        <h1 id='logintitle'>Chatting with user</h1>
                        <div id="message-receiver">
                            <label for="receiver">To:</label>
                            <select name="receiver" id="receiver">
                                    <?php
                                    global $connect;
                                    $db='apexlfg';
                                    $query="Select * from users where id!=".$_SESSION['id'];
                                    $res = $connect->query($query);
                                    while($row = $res->fetch_row())
                                    {
                                    ?>

                                    <option value="<?php echo $row[0];?>">
                                    <?php
                                    echo $row[1]
                                    ?>
                                
                                
                                
                                
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id="message-container"><label for="messageText">Message</label><br>
                            <textarea name="msg" id="messageText" cols="100" rows="20" placeholder="Message"></textarea>
                        </div>
                        <div id="send-container">
                            <button type="submit" name="messageSend" >Send </button>
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