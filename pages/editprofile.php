<?php
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false) {
  header("Location: /pages/index.php");
  exit;
}

include 'upload.php';

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
                        <div id="editprofile-container">
                        <h1 id='logintitle'>Edit Profile</h1>
                        <?php if(!empty($statusMsg)) {?>
                               <p class="status <?php echo $status; ?>"><?php echo $statusMsg; ?></p> 
                            <?php } ?>
                        <form enctype="multipart/form-data" action="" method="post">
                            <label for="image">Upload a profile picture</label><br/>
                            <input name="image" type="file">
                            <input type="submit" name="submit" value="Upload">
                        </form>
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