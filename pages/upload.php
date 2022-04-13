<?php

require_once("connect.php");

$status = $statusMsg = "";
$uname = $_SESSION["id"];

if(isset($_POST["uploadImage"]))
{
    $b = getimagesize($_FILES["userImage"]["tmp_name"]);

    if($b !== false)
    {
        $file = $_FILES['userImage']['tmp_name'];
        $image = addslashes(file_get_contents($file));

        $sql = "INSERT into images (userid, image) VALUES ('$uname', '$image')";
        $query = $connect -> query($sql);

        if($query)
        {
            $statusMsg = "File uploaded successfully";
        }
        else
        {
            $statusMsg = "File upload failed";
        }
    }
    else
    {
        $statusMsg = "Please select an image to upload";
    }
}

?>