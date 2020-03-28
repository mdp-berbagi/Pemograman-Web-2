<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

try {
    $mysql = new PDO("mysql:host=$servername;dbname={$database}", $username, $password);
    // set the PDO error mode to exception
    $mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
?>