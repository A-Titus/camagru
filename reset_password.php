<?php
    //enter email
    //verify email
    //if verified send link to reset password
    //update password in database.

    session_start();
        include("forgot_password.php");
        include("otp.php");
        include("new_pass.php");
    
        include_once 'connect.php';
    
        if(isset($_POST['send']))
        {
            $c_email = $_POST['conf_email'];
    
        //    if(empty($otp))
        //    {
        //        echo "<div class='error_message'>Please enter an OTP</div>";
        //    }
           //else
           //{
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$c_email'");
                $stmt->execute();
                $result = $stmt->fetch();
                $_new_otp = rand(10000, 99000);
                //update otp to new one
                $stmt = $conn->prepare("SELECT * FROM users WHERE otp = '$new_otp'");
                $stmt->execute();
                $query =$conn->prepare("UPDATE users SET otp = $new_otp WHERE email = $c_email");
                $query->execute();
                if ($result) 
                {

                    //////////////////conf email

                $to = $c_email;
                $subject = "Verify Email";
                $message = "<h1><a href ='http://localhost:8080/camagru/otp.php?link=$new_otp'>click here</a></h1>
                <p></br></br></br></p>
                <p>Your otp: $new_otp</p></br>
                <p>link: 'http://localhost:8080/camagru/otp.php?link=$new_otp'</p>";
                $from = "abdussamadtitus@gmail.com";
                $headers = "MIME-Version: 1.0" . "\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
                $headers .= "From: $from" . "\n";

                mail($to,$subject,$message,$headers);

                echo "We have just sent you an email with your verification link.";
                header("Location: http://localhost:8080/camagru/otp.php");
                /////////////////////////////////////////verify new otp
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
                            header("Location: http://localhost:8080/camagru/new_pass.php");

                            if(isset($_POST['change']))
                            {
                                $n_pass = $_POST['new_pass'];
                                $query =$conn->prepare("UPDATE users SET user_password = $n_pass WHERE email = $c_email");
                                $query->execute();
                                echo "your password has been updated";
                                header("Location: http://localhost:8080/camagru/index.php");
                                
                            }
                        }
                        else
                        {
                            echo "<div class='error_message'>Incorrect otp</div>";
                        }
                    }

                
                }
                else
                {
                    echo "<div class='error_message'>Incorrect otp</div>";
                }
            }
?>