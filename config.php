<?php
    $domain =  "http://".$_SERVER['HTTP_HOST']."/Phimhot.top";
    $servername = "localhost";
    $username = "root";
    $database = "phimhot";
    $password = "";
    $conn = new mysqli($servername, $username,   $password, $database);
    mysqli_set_charset($conn, 'UTF8');
    session_start();
?>