<?php

require_once("connect.php");

if(isset($_POST["submit"]))
{
    if(!empty($_FILES["image"]["name"]))
    {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg');
        if(in_array($fileType, $allowTypes))
        {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $query = $connect -> query("INSERT into users (image) VALUES ('$imgContent')");
        }
    }
}

?>