<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'devKayak');

function connect() {
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (!$connect) {
        die('Error: Unable to connect to database. ' . mysqli_connect_error());
    }
    mysqli_set_charset($connect, 'utf8mb4');
    return $connect;
}

?>
