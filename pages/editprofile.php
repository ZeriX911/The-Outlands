<?php
session_start();

include_once("connect.php");

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
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                    <h1 id='logintitle'>Edit Profile</h1>
                    <?php if (isset($_GET['error'])) {
                    ?>
                    <div><?php echo $_GET['error'];?></div>
                    <?php
                    }else{?>
                     <div></div>
                    
                    <?php
                }
                ?>
                    <label for="file">Upload a profile picture (max: 2mb)</label><br/>
                    <input type="file" name="file" />
                    <input type="submit" id="uploadImage" name="upload" value="Upload" >
                    </form>

                    <form method="post" action="edituserdata.php">
                    <?php if (isset($_GET['error'])) {
                    ?>
                    <div><?php echo $_GET['error'];?></div>
                    <?php
                    }else{?>
                     <div></div>
                    
                    <?php
                }
                ?>

                    <div id="date-container"><label for="date">Change Date Of Birth</label><br>
                        <input type="date" id="date" name="datepicker" min="1900-01-01" max="2022-01-01" value="2000-01-01">
                    </div>

                    <div id="email-container"><label for="email">Change E-mail</label><br>
                        <input type="email" name="emailchange" id="email" placeholder="Change E-mail">
                    </div>

                    <div id="radio-container">
                        <label for="emailvisibility">Change E-mail visibility</label><br>

                        <input type="radio" id="radiopublic" name="radiopublic" value="public" checked>
                        <label for="public">Public</label>

                        <input type="radio" id="radionotpublic" name="radionotpublic" value="notpublic">
                        <label for="notpublic">Not Public</label><br>
                    </div>

                    <div id="send-container">
                        <input type="submit" name="editprofile" value="APPLY CHANGES">
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