<?php
    global $connect;
    $connect = new mysqli('localhost', 'root', '', 'apexlfg', '3306');

    if($connect -> errno !=0)
    {
        die("Error! ".$connect -> error);
    }
    if(!$connect -> set_charset("utf8"))
    {
        echo "Couldn't set character set";
    }   
?>