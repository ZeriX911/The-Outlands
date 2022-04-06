<?php

session_start();

require_once('connect.php');

$uname = $_SESSION["username"];
$query1 = "DELETE FROM users WHERE username=$uname";

$result1 = $connect -> query($query1);
if($result1) { echo "Account deleted successfully"; }

$_SESSION["loggedin"] = false;
header("Location: /pages/index.php");

$_SESSION = array();
session_destroy();
exit;

?>