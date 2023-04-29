<?php
    session_start();
    // Define const variables
    define('ROOT_URL', 'http://localhost/mybuddy');
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'mybuddy');

    // Connect to the database
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>