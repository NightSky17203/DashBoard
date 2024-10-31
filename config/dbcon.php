<?php
    $server ="localhost";
    $port ="3306";
    $username="root";
    $password="";
    $dbname="review_phim";
    $conn= new mysqli($server,$username,$password,$dbname,$port);

    if ($conn-> connect_error){
        die("connect error".$conn->connect_error);
    }
