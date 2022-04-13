<?php

require_once("connect.php");

if(!empty($_GET['id']))
{
    $sql = "SELECT image FROM gallery WHERE id= {$_GET['id']}";
    $query = $connect -> query($sql);

    if($query -> num_rows > 0)
    {
        $img = $query -> fetch_assoc();

        header("Content-type: image/jpg");
        echo $img['image'];
    }
    else
}

?>