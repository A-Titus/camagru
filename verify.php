<?php
        session_start();
        include("otp.php");
    
        include_once 'connect.php';
    
        if(isset($_POST['verify']))
        {
            $otp_verify = $_POST['otp'];
    
                //check for empty otp//
                
                $stmt = $conn->prepare("SELECT * FROM users WHERE otp = '$otp_verify'");
                $stmt->execute();
                $result = $stmt->fetch();
                if ($result) 
                {
                    $query =$conn->prepare("UPDATE users SET verified = '1' WHERE otp = $otp_verify");
                    $query->execute();
                    //header("Location: http://localhost:8080/camagru/index.php");
                    echo "<div class='success_message'>your account was sucessfully verified</div>";
                }
                else
                {
                    echo "<div class='error_message'>Incorrect otp</div>";
                }
        }
    
?>