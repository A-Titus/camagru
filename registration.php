<?php
    session_start();


    include("install.php");
    include("register.php");

    include_once 'connect.php';

    if(isset($_POST['submit']))
    {
        $username = $_POST['r_username'];
        $email = $_POST['r_email'];
        $pass1 = $_POST['r_pass'];
        $pass2 = $_POST['r_pass_conf'];


       if(empty($username)  || empty($email) || empty($pass1) || empty($pass2))
       {
           echo "<div class='error_message'>Fields missing</div>";
       }
       else
       {
           
           $statement = $conn->prepare("SELECT * FROM users_data WHERE username = '$username' OR email = '$email'");
           $statement->execute();
               $count = $statement->rowCount();
               if($count > 0)
               {
                   echo "<div class='error_message'>username or email already in use</div>";
                   exit();
               }
               else
               {
                $query = $conn->prepare("INSERT INTO users_data (username, email, user_password) VALUES ('$username', '$email', '$pass1')");
                $query->execute();
                echo "<div class='success_message'>success</div>";
               }
       }
    }
?>