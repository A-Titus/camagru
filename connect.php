<?php

    $servername = "localhost";
    $username = "root";
    $password = "pass123";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=camagru", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>