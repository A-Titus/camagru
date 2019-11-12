<?php
    session_start();

    include ("profile.php");
    
    include_once "../config/database.php";
    //echo $_SESSION['username'];

    $old_username = $_SESSION['username'];
    if(isset($_POST['update_username']))
    {
        $username = $_POST['new_username'];
        try{
            $statement = $conn->prepare("UPDATE `users` SET username = '$username' WHERE username = '$old_username'");
            $statement->execute();
            $_SESSION['username'] = $username;
    }
        catch(PDOException $e)
        {
            echo "ERROR: " . $e->getMessage();
        }
    }

    if(isset($_POST['update_email']))
    {
        $email = $_POST['new_email'];
        try{
            $statement = $conn->prepare("UPDATE `users` SET email = '$email' WHERE username = '$old_username'");
            $statement->execute();
        }
        catch(PDOException $e)
        {
            echo "ERROR: " . $e->getMessage();
        }
    }

    if(isset($_POST['update_pass']))
    {
        $pass = $_POST['new_pass'];
        try{
            $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
            $statement = $conn->prepare("UPDATE `users` SET user_password = '$hashed_pass' WHERE username = '$old_username'");
            $statement->execute();
        }
        catch(PDOException $e)
        {
            echo "ERROR: " . $e->getMessage();
        }
    }
?>