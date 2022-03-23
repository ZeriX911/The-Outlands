<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location.home.php");
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
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
  
    if($stmt = mysqli_prepare($connect, $sql)) {
      mysqli_stmt_bind_param($stmt, "s", $param_username);
      $param_username = $username;
  
      if(mysqli_stmt_execute($stmt)) {
        mysqli_stmt_store_result($stmt);
  
        if(mysqli_stmt_num_rows($stmt) == 1) {
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
  
          if(mysqli_stmt_fetch($stmt)) {

            if(password_verify($password, $hashed_password)) {
              session_start();
  
              $_SESSION["loggedin"] = true;
              $_SESSION["id"] = $id;
              $_SESSION["username"] = $username;
  
              header("location: home.php");
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
            <header>
                <nav>
                    <ul id="navbar">
                        <li id="first"><a href="home.html"><span>HOME</span></a></li>
                        <li><a href="legends.html"><span>LEGENDS</span></a></li>
                        <li><a href="maps.html"><span>MAPS</span></a></li>
                        <li><a href="lfg.html"><span>LFG</span></a></li>
                        <li class="login"><a class="active" href="#"><span>LOGIN</span></a></li>
                    </ul>
                </nav>
            </header>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <fieldset>
                    <main id="Container">
                        <h1 id="logintitle">Login</h1>
                        <div id="username-container"><label for="email">Username</label><br>
                            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username ?>">
                        </div>
                        <div id="pwd-container"><label for="pwd">Password</label><br>
                            <input type="password" name="pwd" id="pwd" placeholder="Password">
                        </div>
                        <div id="send-container">
                            <input type="submit" value="LOGIN">
                        </div>
                        <div id="registerhere">You don't have an account? Register <a href="register.html"><strong>here</strong></a></div>
                    </main>
                </fieldset>
            </form>
            <footer>
                <p>The Outlands Official Project</p>
            </footer>
        </div>
    </div>
</body>

</html>