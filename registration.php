<?php
    session_start();

    include("register.php");
    include("sendmail.php");

    include_once './config/database.php';

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
            //$verif = $statement->fetchAll();
               $count = $statement->rowCount();
               if($count > 0)
               {
                   echo "<div class='error_message'>username or email already in use</div>";
                   exit();
               }
               else
               {
                    $hashed_pass = password_hash($pass1, PASSWORD_BCRYPT);
                    $otp = rand(10000, 99000);
                    $query = $conn->prepare("INSERT INTO users (username, email, user_password, verified, otp) VALUES ('$username', '$email', '$hashed_pass', '0', $otp)");
                    $query->execute();
                    echo "<div class='success_message'>success</div>";
                    send_mail($email, $otp);
                    echo "Thanks for registering! We have just sent you an email with your verification link.";
                    header("Location: http://localhost:8080/camagru/otp.php"); 
                }
                

        }
    }
?>