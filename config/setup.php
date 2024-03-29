<?php
    $servername="localhost"; 
    $root="root"; 
    $password="pass123"; 
    $db = "camagru";
        try {
            $conn = new PDO("mysql:host=$servername", $root, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("CREATE DATABASE IF NOT EXISTS `$db`;");
        } catch (PDOException $e) {
            die("DB ERROR: ". $e->getMessage());
        }
    $conn = NULL;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=camagru", $root, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "connection error: " . $e;
    }
    $sql = "CREATE TABLE IF NOT EXISTS $db.users (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        username varchar(100),
        email varchar(100),
        user_password varchar(100),
        verified boolean,
        otp int(5),
        notify boolean,
        reg_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP)";
    $conn->exec($sql);

    $sql = $conn->prepare("CREATE TABLE IF NOT EXISTS `images` (
        `img_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `image_name` varchar(255) NOT NULL,
          `image_path` varchar(255) NOT NULL,
          `username` varchar(255) NOT NULL,
          `uploaded_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
        )");
        $sql->execute();

        $sql = $conn->prepare("CREATE TABLE IF NOT EXISTS `likes` (
            `id` INT(6) AUTO_INCREMENT PRIMARY KEY,
            `img_id` int(11) NOT NULL ,
            `likedby` varchar(255) NOT NULL
            )");
            $sql->execute();

            $sql = $conn->prepare("CREATE TABLE IF NOT EXISTS `comments` (
                `id` INT(6) AUTO_INCREMENT PRIMARY KEY,
                `img_id` int(11) NOT NULL ,
                `comment` varchar(255) NOT NULL,
                `user` varchar(255) NOT NULL

                )");
                $sql->execute();
    ?>