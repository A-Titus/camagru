<?php
    session_start();
    include ("sendmail.php");
    include ("forgot_password.php");
    include_once './config/database.php';

    if(isset($_POST['send_link']))
    {
        $email = $_POST['conf_email'];
        $otp = rand(10000, 99000);
    try{
        $statement = $conn->prepare("UPDATE `users` SET otp = '$otp', verified = '0' WHERE email = '$email'");
        $statement->execute();
        //send mail and verify otp//
        $message = "<p></br></br></br></p>
                <p>Your otp: $otp</p></br>
                <p><a href='http://localhost:8080/camagru/otp.php?link=$otp'>Click here</a></p>";
        send_mail($email, $otp, $message);
        header("Location: http://localhost:8080/camagru/passotp.php");
    }
    catch(PDOException $e)
    {
        echo "ERROR: " . $e->getMessage();
    }
    }
    ?>