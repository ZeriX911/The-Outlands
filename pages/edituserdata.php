<?php

session_start();

require_once("connect.php");

$uid = $_SESSION["id"];

if(isset($_POST["editprofile"]))
{
    $date = $_POST["datepicker"];
    $email = $_POST["emailchange"];
    $emailpublicity = $_POST["radiopublicity"];

    if($date != NULL || $email != NULL)
    {
        if($date != NULL)
        {
            $sql1 = "UPDATE users SET birth = '$date' WHERE id = $uid";
            $result1 = $connect -> query($sql1);

            if(!$result1)
            {
                error("Couldn't update birth date");
            }
        }

        if($email != NULL)
        {
            $sql2 = "UPDATE users SET email = '$email' WHERE id = $uid";
            $result2 = $connect -> query($sql2);

            if(!$result2)
            {
                error("Couldn't update email");
            }
        }

        if($emailpublicity == "public")
        {
            $sql3 = "UPDATE users SET emailpublic = 1 WHERE id = $uid";
            $result3 = $connect -> query($sql3);

            if(!$result3)
            {
                error("Couldn't change e-mail visibility");
            }
        }
        else if($emailpublicity == "notpublic")
        {
            $sql4 = "UPDATE users SET emailpublic = 0 WHERE id = $uid";
            $result4 = $connect -> query($sql4);

            if(!$result4)
            {
                error("Couldn't change e-mail visibility");
            }
        }
    }
    else
    {
        error("Please fill the form");
    }
}
else
{
    error("Something went wrong");
}

$connect -> close();
header("Location: profile.php");

?>