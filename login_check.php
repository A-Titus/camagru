<?php
    session_start();


    include("install.php");
    include("login.php");

    include_once 'connect.php';

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $pass = $_POST['pass'];


       if(empty($username) || empty($pass))
       {
           echo "<div class='error_message'>Fields missing</div>";
       }
       else
       {
           
           $statement = $conn->prepare("SELECT * FROM users_data WHERE username = '$username' AND user_password = '$pass'");
           $statement->execute();
               $count = $statement->rowCount();
               if($count != 1)
               {
                    echo "<div class='error_message'>Email or Password is incorrect</div>";
                    exit();
               }
               else
               {
                   echo "<div class='success_message'>Your are now logged in</div>";
               }
       }
    }
?>