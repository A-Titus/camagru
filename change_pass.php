<?php
    session_start();
    include ("newpass.php");

    include_once './config/database.php';
   // echo "vwkemvklfmvdflmsvm;clc;anwid;nvefonvaenvfj;anv;jsnfd;nalsdvn;asjdjkfaks;dfjfakdjlsfa";

    if(isset($_POST['change']))
    {
        $newpassword = $_POST['newpass'];
        $otp = $_POST['otp'];
        $hashed_pass = password_hash($newpassword, PASSWORD_BCRYPT);
        try{
        $statement = $conn->prepare("UPDATE `users` SET user_password = '$hashed_pass' WHERE otp = '$otp'");
        $statement->execute();
        header("Location: http://localhost:8080/camagru/index.php");
        echo "<div class='success_message'>Your password has been updated successfully</div>";
    }
    catch(PDOException $e)
    {
        echo "ERROR: " . $e->getMessage();
    }
    }
?>