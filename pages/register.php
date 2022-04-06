<?php
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: /pages/index.php");
  exit;
}

require_once("connect.php");

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwords did not match.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($connect, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_BCRYPT);
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
            <main id="Container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <fieldset>
                        <h1 id="logintitle">Register</h1>
                        <div id="username-container <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"><label for="username">Username</label><br>
                            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>"></br>
                            <span class="help-block"><?php echo $username_err; ?></span><br>
                        </div>
                        <!--<div id="email-container"><label for="email">E-mail</label><br>
                            <input type="email" name="email" id="email" placeholder="E-mail">
                        </div>-->
                        <div id="pwd-container <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>"><label for="password">Password (min. 6 characters)</label><br>
                            <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>"></br>
                            <span class="help-block"><?php echo $password_err; ?></span><br>
                        </div>
                        <div id="pwd-verify-container <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>"><label for="confirm_password">Verify Password</label><br>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Verify password" value="<?php echo $confirm_password; ?>"></br>
                            <span class="help-block"><?php echo $confirm_password_err; ?></span><br>
                        </div>
                        <!--<div id="date-container"><label for="date">Date Of Birth</label><br>
                            <input type="date" id="date" name="date" min="1900-01-01" max="2030-12-31" value="2022-01-01">
                        </div>-->
                        <div id="send-container">
                            <input type="submit" value="REGISTER">
                        </div>
                        <div id="reset-container">
                            <input type="reset" value="RESET">
                        </div>
                        <div id="registerhere">You already have an account? Login <a href="login.php"><strong>here</strong></a></div>
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