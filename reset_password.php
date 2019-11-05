<?php
    session_start();
    include ("sendmail.php");
    include ("forgot_password.php");
    include_once 'connect.php';

    if(isset($_POST['send_link']))
    {
        $email = $_POST['conf_email'];
        $otp = rand(10000, 99000);
        $statement = $conn->prepare("UPDATE `users` SET otp = '$otp', verified = '0' WHERE email = '$email'");
        $statement->execute();
        //send mail and verify otp//
        send_mail($email, $otp);
        header("Location: http://localhost:8080/camagru/passotp.php");
    }
    ?>