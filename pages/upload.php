<?php

require_once("connect.php");

$uid = $_SESSION["id"];

$status = $statusMsg = "";
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

            $query = $connect -> query("UPDATE users SET pic=$imgContent WHERE id=$uid");

            if($query)
            {
                $status = 'success';
                $statusMsg = "File uploaded successfully";
            }
            else
            {
                $statusMsg = "File upload failed";
            }
        }
        else
        {
            $statusMsg = "Only JPG, PNG, JPEG are allowed";
        }
    }
    else
    {
        $statusMsg = "Please select and image to upload";
    }
}

echo "<p>{$statusMsg}</p>";

?>