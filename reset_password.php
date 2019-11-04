<?php
    session_start();
    include ("sendmail.php");
    include ("forgot_password.php");
   // include ("otp.php");
    include_once 'connect.php';
    //echo "truhegeigrepjrpegojrewgjregj gjrigjrigjreogjer gjergjiogjegjregijregjregjre rjegpjgwpejgw[egrgj[wehgwgrwgjw;gjwto;gw";

    if(isset($_POST['send_link']))
    {
        $email = $_POST['conf_email'];
        // echo $email;
        $otp = rand(10000, 99000);
        //echo $otp;  
        $statement = $conn->prepare("UPDATE `users` SET otp = '$otp', verified = '0' WHERE email = '$email'");
        $statement->execute();
        //send mail and verify otp//
        send_mail($email, $otp);

        ////////////////////////////
        ////////////////////////////

        header("Location: http://localhost:8080/camagru/passotp.php");


        //header("Location: http://localhost:8080/camagru/passotp.php");
        // $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");
        // $stmt->execute();
        // $result = $stmt->fetch();
        // if ($result) 
        // {  
        //     if($result['verified'] == 1)
        //     {
        //         header("Location: http://localhost:8080/camagru/newpass.php");
        //     }
        //     else
        //     {
        //         echo "email not verified";
        //     }
        // }


        
        

      

    }
    ?>