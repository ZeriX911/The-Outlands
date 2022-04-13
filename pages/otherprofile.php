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
            <form>
                    <main id="Container">
                    <fieldset>
                        <div id="otherprofiles-container">

                        <?php
                        require_once('connect.php');

                        $gid = $_GET["gid"];
                        $uid = $_SESSION["id"];
                        $sql = "SELECT * FROM users WHERE id = $gid";
                        $result = $connect -> query($sql);

                        if($result)
                        {
                            while($row = $result -> fetch_array())
                            {
                                if($row[3] == NULL){$row[3] = "not set";}
                                if($row[4] == NULL){$row[4] = "not set";}
                                if($row[5] == NULL){$row[5] = "not set";}
                                if($row[6] == NULL){$row[6] = "not set";}
                                if($row[8] == NULL){$row[8] = "not set";}
                                
                                if($row[9] == 1)
                                {
                                    echo "<h1 id='logintitle'>Profile of {$row[1]}</h1>";
                                    echo "<div>
                                    <p class='sqlp'>Picture</p>
                                    <div class='sqllista'>{$row[6]}</div>
                                    <p class='sqlp'>Birth</p>
                                    <div class='sqllista'>{$row[3]}</div>
                                    <p class='sqlp'>Description:</p>
                                    <div class='sqllista'>{$row[4]}</div>
                                    <p class='sqlp'>E-mail:</p>
                                    <div class='sqllista'>{$row[5]}</div>
                                    <p class='sqlp'>Current Team:</p>
                                    <div class='sqllista'>{$row[8]}</div>";
                                }
                                else
                                {
                                    echo "<h1 id='logintitle'>Profile of {$row[1]}</h1>";
                                    echo "<div>
                                    <p class='sqlp'>Picture</p>
                                    <div class='sqllista'>{$row[6]}</div>
                                    <p class='sqlp'>Birth</p>
                                    <div class='sqllista'>{$row[3]}</div>
                                    <p class='sqlp'>Description:</p>
                                    <div class='sqllista'>{$row[4]}</div>
                                    <p class='sqlp'>E-mail:</p>
                                    <div class='sqllista'>not public</div>
                                    <p class='sqlp'>Current Team:</p>
                                    <div class='sqllista'>{$row[8]}</div>";
                                }
                            }
                        }
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