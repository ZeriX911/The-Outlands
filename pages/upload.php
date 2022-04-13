<?php

require_once("connect.php");

if(isset($_POST["submit"]))
{
    $blob = getimagesize($_FILES["userImage"]["tmpName"]);

    if($blob !== false)
    {
        $file = $_FILES["userImage"]["tmpName"];
        $image = addslashes(file_get_contents($file));

        $sql = "INSERT INTO users (image) VALUES ('$image')";
        $query = $connect -> query($sql);
    }
}

?>