<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("Location: /pages/index.php");
  exit;
}

require_once('connect.php');

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty(trim($_POST["username"]))) {
    $username_err = "Please enter your username";
  } else {
    $username = trim($_POST["username"]);
  }
  
  if(empty(trim($_POST["password"]))) {
    $password_err = "Please enter your password";
  } else {
    $password = trim($_POST["password"]);
  }
  
  if(empty($username_err) && empty($password_err)) {
    $sql = "SELECT  id, username, password, admin FROM users WHERE username = ?";
  
    if($stmt = mysqli_prepare($connect, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      $param_username = $username;
  
      if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
  
        if(mysqli_stmt_num_rows($stmt) == 1) {
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$admin);
  
          if(mysqli_stmt_fetch($stmt)) {

            if(password_verify($password, $hashed_password)) {
              session_start();
  
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
              $_SESSION['admin'] = $admin;

              
              header("location: index.php");
            } else {
              $password_err = "The password you entered is not valid";
            }
          }
        } else {
          $username_err = "No account found with that username";
        }
      } else {
        echo "Something went wrong. Please try again later";
      }
      mysqli_stmt_close($stmt);
    }
  }
  mysqli_close($connect);
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
                        <h1 id="logintitle">Login</h1>
                        <div id="username-container" <?php echo (!empty($username_err)) ? 'has-error' : '';?>> <label for="email">Username</label><br>
                            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username ?>"><br>
                            <span class="help-block"><?php echo $username_err; ?></span></br>
                        </div>
                        <div id="pwd-container" <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>><label for="password">Password</label><br>
                            <input type="password" name="password" id="password" placeholder="Password"><br>
                            <span class="help-block"><?php echo $password_err; ?></span></br>
                        </div>
                        <div id="send-container">
                            <input type="submit" value="LOGIN">
                        </div>
                        <div id="registerhere">You don't have an account? Register <a href="register.php"><strong>here</strong></a></div>
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