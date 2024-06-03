<?php
$dsn = 'mysql:host=localhost;dbname=kilkimi_whiskies';
$username = 'root';
$password = 'root';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>