<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
  header("Location: /pages/index.php");
  exit;
}
include_once('connect.php');
include_once('post.php');
get_posts();
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
    <link rel="stylesheet" media="print" href="../css/stylePrint.css" />
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
        <?php include('header.php');?>
            <main id="Container">
                <h1 id="logintitle">Looking For Team</h1>
                <div class="send-container cpdiv">
                    <a href="createpost.php">
                        <input type="submit" value="CREATE A POST" id="createpost">
                    </a>
                </div>
                <table>
                    <tr>
                        <th colspan="4">Avilable teams</th>
                    </tr>
                    <?php foreach($list as $post){ ?>
                    <tr class="team">
                        <td><?php echo $post->get_team_name()  ?></td>
                        <td><?php echo $post->get_players() ?>/3</td>
                        <td><?php echo $post->get_style() ?></td>
                        <td class="send-container"><input type="submit" value="JOIN" class="join"></td>
                    </tr>
                    <?php } ?>
                    </tr>
                </table>
            </main>
            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>