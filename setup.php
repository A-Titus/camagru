<?php
    $servername="localhost"; 
    $root="root"; 
    $password="pass123"; 
    $db = "camagru";
        try {
            $conn = new PDO("mysql:host=$servername", $root, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("CREATE DATABASE `$db`;");
        } catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    $conn = NULL;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=camagru", $root, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connected successfully";
    }
    catch(PDOException $e)
    {
        echo "connection error: " . $e;
    }
    $sql = "CREATE TABLE $db.users (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        username varchar(100),
        email varchar(100),
        user_password varchar(100),
        verified boolean,
        otp int(5))";
    $conn->exec($sql);
    ?>