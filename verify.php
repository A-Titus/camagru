<?php
        session_start();
        include("otp.php");
    
        include_once 'connect.php';
    
        if(isset($_POST['verify']))
        {
            $otp_verify = $_POST['otp'];
    
        //    if(empty($otp))
        //    {
        //        echo "<div class='error_message'>Please enter an OTP</div>";
        //    }
           //else
           //{
                $stmt = $conn->prepare("SELECT * FROM users WHERE otp = '$otp_verify'");
                $stmt->execute();
                $result = $stmt->fetch();
                if ($result) 
                {
                    $query =$conn->prepare("UPDATE users SET verified = '1'");
                    $query->execute();
                    header("Location: http://localhost:8080/camagru/login.php");
                }
                else
                {
                    echo "<div class='error_message'>Incorrect otp</div>";
                }
            }
       // }
?>