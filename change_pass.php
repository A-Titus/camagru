<?php
    session_start();
    include ("newpass.php");

    include_once 'connect.php';
   // echo "vwkemvklfmvdflmsvm;clc;anwid;nvefonvaenvfj;anv;jsnfd;nalsdvn;asjdjkfaks;dfjfakdjlsfa";

    if(isset($_POST['change']))
    {
        $newpassword = $_POST['newpass'];
        $otp = $_POST['otp'];
        $hashed_pass = password_hash($newpassword, PASSWORD_BCRYPT);
        $statement = $conn->prepare("UPDATE `users` SET user_password = '$hashed_pass' WHERE otp = '$otp'");
        $statement->execute();
        header("Location: http://localhost:8080/camagru/index.php");
        echo "<div class='success_message'>Your password has been updated successfully</div>";
    }
?>