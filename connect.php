<?php

// $con = mysqli_connect("localhost", "root", "pass123", "users");
//         if ($con->connect_error) {
//             die("Connection failed: " . $con->connect_error);
//          }
//         echo "connect successful";

$servername = "localhost";
$username = "root";
$password = "pass123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=users", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>