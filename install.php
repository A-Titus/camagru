<?php

    $conn = mysqli_connect('localhost', 'root', 'pass123');
	$create ="CREATE DATABASE users";
    mysqli_query($conn, $create);

    mysqli_select_db($conn, 'users');
    
    $create_table= "CREATE TABLE users_data ( id int primary key AUTO_INCREMENT,
    username varchar(255),
    email varchar(255),
    user_password varchar(255))";
    mysqli_query($conn, $create_table);
    mysqli_close($conn);


// $host="localhost"; 

// $root="root"; 
// $password="pass123"; 


//     try {
//         $conn = new PDO("mysql:host=$host", $root, $password);

//         $conn->exec("CREATE DATABASE `users`");

//         $query = $conn->prepare("CREATE TABLE users.users_data ( id int primary key AUTO_INCREMENT,
//         username varchar(255),
//         email varchar(255),
//         user_password varchar(255))");
//         $query->exec()
//         or die(print_r($conn->errorInfo(), true));

//     } catch (PDOException $e) {
//         die("DB ERROR: ". $e->getMessage());
//     }
?>