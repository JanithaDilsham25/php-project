<?php
    $servername = 'x3ztd854gaa7on6s.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    $uname = 'jvcgye71sl1jx2fx';
    $password = 'ohhspp1ch2ngqh5i';
    $db_name =  'c4mkavc3cfzfr2a5';

    $conn = mysqli_connect($servername, $uname, $password, $db_name);

    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>