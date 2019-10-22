<?php
    $con = mysqli_connect('localhost', 'root', 'pass123');
	$create ="CREATE DATABASE users";
    mysqli_query($con, $create);

    mysqli_select_db($con, 'users');
    
    $create_table= "CREATE TABLE users_data ( id int primary key,
    username varchar(255),
    email varchar(255)'
    user_password varchar(255))";
    mysqli_query($con, $create_table);
    mysqli_close($con);
?>
