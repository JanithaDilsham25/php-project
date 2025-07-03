<?php
    $servername = 'db';
    $uname = 'user';
    $password = 'password';
    $db_name =  'mydb';

    $conn = mysqli_connect($servername, $uname, $password, $db_name);

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>