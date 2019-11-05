<?php
    session_start();

    include ("profile.php");
    
    include_once 'connect.php';
    //echo $_SESSION['username'];

    
    if(isset($_POST['update_username']))
    {
        $username = $_POST['new_username'];
        // $statement = $conn->prepare("UPDATE `users` SET username = '$username' WHERE username = 'atitus'");
        // $statement = $conn->prepare("INSERT INTO `users`(username) VALUES('shjshs')");
        // $statement->execute();
    }

    // if(isset($_POST['update_email']))
    // {
    //     $email = $_POST['new_email'];
    // }

    // if(isset($_POST['update_pass']))
    // {
    //     $pass = $_POST['new_pass'];
    // }
?>