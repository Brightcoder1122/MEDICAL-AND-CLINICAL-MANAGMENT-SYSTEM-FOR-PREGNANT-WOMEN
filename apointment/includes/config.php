<?php  
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'appointment';

    $dbconnect = mysqli_connect($host, $user, $password, $dbname);

    if(!$dbconnect) {
        echo "Database connection error";
    }
?>