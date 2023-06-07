<?php

$dbHost = 'localhost'; 
$dbUser = 'root'; 
$dbPassword = 'root'; 
$dbName = 'artistic_reigns'; 

$conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_set_charset($conn, 'utf8mb4');
?>