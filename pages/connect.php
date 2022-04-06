<?php

    $connect = new mysqli('localhost', 'root', '', 'apexlfg', '3306');

    if($connect -> errno !=0)
    {
        die("Error! ".$connect -> error);
    }
    if(!$connect -> set_charset("utf8"))
    {
        echo "Couldn't set character set";
    }   
    $con = mysqli_connect("localhost","root","","apexlfg");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

?>