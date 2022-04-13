<?php

require_once("connect.php");

$uid = $_SESSION["id"];

if(isset($_POST["submit"]))
{
    $blob = getimagesize($_FILES["userImage"]["tmp_name"]);

    if($blob !== false)
    {
        $file = $_FILES['userImage']['tmp_name'];
        $image = addslashes(file_get_contents($file));

        $query = $connect -> query("UPDATE users SET pic=$image WHERE id=$uid");
    }
}

?>