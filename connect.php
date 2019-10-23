<?php

$con = mysqli_connect("localhost", "root", "pass123", "users"); //or die("could not connect to database");
   // mysqli_select_db('users');
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
         }
        echo "connect successful";
        
?>