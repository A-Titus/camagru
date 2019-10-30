<?php
    session_start();
    include("index.php");

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
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = '$username'");
            $stmt->execute();
            $result = $stmt->fetch();
            if ($result) 
            {
                $hash = $result['user_password'];
                if ($result['verified'] == 1)
                {
                    if (password_verify($pass, $hash)) { 
                        echo  "<div class='success_message'>Login success</div>";
                    }
                    else 
                    {
                        echo "<div class='error_message'>Invalid password</div>";
                    }
                }
                else
                {
                    echo "<div class='error_message'>Your account is not yet verified</div>";
                }
            }
            else
            {
                echo "<div class='error_message'>Username doesnt exit!</div>";
            }
        }
    }
?>