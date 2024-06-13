<?php

session_start();

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'demo_sql_injection');

try {
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
