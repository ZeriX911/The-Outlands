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
                        <div id="otherprofiles-container">

                        <?php
                        require_once('connect.php');

                        $gid = $_GET["gid"];
                        $uid = $_SESSION["id"];
                        $sql = "SELECT * FROM users WHERE id = $gid";
                        $sql2 = "SELECT * FROM images WHERE userid = $gid";
                        $result = $connect -> query($sql);
                        $result2 = $connect -> query($sql2);

                        if($result)
                        {
                            if($result2 -> num_rows > 0)
                            {
                                $img = $result2 -> fetch_assoc();
                            }
                            else
                            {
                                $img['image'] = "not set";
                            }
                            
                            while($row = $result -> fetch_array())
                            {
                                if($row[3] == NULL){$row[3] = "not set";}
                                if($row[4] == NULL){$row[4] = "not set";}
                                if($row[5] == NULL){$row[5] = "not set";}
                                if($row[6] == NULL){$row[6] = "not set";}
                                if($row[8] == NULL){$row[7] = "not set";}
                                
                                if($row[8] == 1)
                                {
                                    header("Conent-type: image/jpg");
                                    
                                    echo "<h1 id='logintitle'>Profile of {$row[1]}</h1>";
                                    echo "<div>
                                    <p class='sqlp'>Picture</p>
                                    <div class='sqllista'>{$img['image']}</div>
                                    <p class='sqlp'>Birth</p>
                                    <div class='sqllista'>{$row[3]}</div>
                                    <p class='sqlp'>Description:</p>
                                    <div class='sqllista'>{$row[4]}</div>
                                    <p class='sqlp'>E-mail:</p>
                                    <div class='sqllista'>{$row[5]}</div>
                                    <p class='sqlp'>Current Team:</p>
                                    <div class='sqllista'>{$row[7]}</div>";
                                }
                                else
                                {
                                    header("Conent-type: image/jpg");
                                    
                                    echo "<h1 id='logintitle'>Profile of {$row[1]}</h1>";
                                    echo "<div>
                                    <p class='sqlp'>Picture</p>
                                    <div class='sqllista'>{$img['image']}</div>
                                    <p class='sqlp'>Birth</p>
                                    <div class='sqllista'>{$row[3]}</div>
                                    <p class='sqlp'>Description:</p>
                                    <div class='sqllista'>{$row[4]}</div>
                                    <p class='sqlp'>E-mail:</p>
                                    <div class='sqllista'>not public</div>
                                    <p class='sqlp'>Current Team:</p>
                                    <div class='sqllista'>{$row[7]}</div>";
                                }
                            }
                        }

                        if($gid != $uid)
                        {
                            echo "<div id='send-container'>";
                            echo "<input type='button' id='messageuser' onclick='location.href='message.php' value='Message this user'>";
                            echo "</div>";
                        }
                        ?>
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