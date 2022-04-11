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
    <link rel="stylesheet" media="print" href="../css/stylePrint.css" />
    <link rel="icon" href="../img/apex.ico">
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
        <?php include('header.php');?>
            <form>
                    <main id="Container">
                    <fieldset>
                        <h1 id="logintitle">Other Profiles</h1>
                        <div id="otherprofiles-container">
                        
                        <?php
                        require_once('connect.php');

                        $sql = "SELECT id, username FROM users";
                        $result = $connect -> query($sql);
                        $users = array();

                        if($result)
                        {
                            while($row = $result -> fetch_array())
                            {
                                echo "<span class='users'><a href='otherprofile.php?gid={$row[0]}'>{$row[1]}</a></span></br>";
                                array_push($users, $row[1]);
                            }
                        }
                        $connect -> close();
                        ?>
                        </div>
                      </fieldset>
                    </main>
            </form>
            <footer>
              
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>