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
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <main id="Container">
                    <fieldset>
                        <h1 id="logintitle">Other Profiles</h1>
                        <div id="otherprofiles-container">
                        <select name="otherprofiles" id="otherprofiles">
                            <option value="sample">sample</option>
                        </select>
                        </div>
                        <div id="send-container">
                            <input type="submit" value="LOGIN">
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