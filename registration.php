<?php
    session_start();

    include("register.php");

    include_once 'connect.php';

    if(isset($_POST['submit']))
    {
        $username = $_POST['r_username'];
        $email = $_POST['r_email'];
        $pass1 = $_POST['r_pass'];
        $pass2 = $_POST['r_pass_conf'];

        if($pass1 != $pass2)
        {
            echo "<div class='error_message'>Passwords dont match</div>";
            exit();
        }


       if(empty($username)  || empty($email) || empty($pass1) || empty($pass2))
       {
           echo "<div class='error_message'>Fields missing</div>";
       }
       else
       {
           
           $statement = $conn->prepare("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
           $statement->execute();
               $count = $statement->rowCount();
               if($count > 0)
               {
                   echo "<div class='error_message'>username or email already in use</div>";
                   exit();
               }
               else
               {
                $hashed_pass = password_hash($pass1, PASSWORD_BCRYPT);
                $query = $conn->prepare("INSERT INTO users (username, email, user_password) VALUES ('$username', '$email', '$hashed_pass')");
                $query->execute();
                echo "<div class='success_message'>success</div>";
               }
       }
    }
?>