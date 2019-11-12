<?php
function send_mail($email, $otp)
{
    $to = $email;
    $subject = "Verify Email";
    $message = "<p></br></br></br></p>
    <p>Your otp: $otp</p></br>
    <p><a href='http://localhost:8080/camagru/otp.php?link=$otp'>Click here</a></p>";
    $from = "atitus@student.wethinkcode.co.za";
    $headers = "MIME-Version: 1.0" . "\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
    $headers .= "From: $from" . "\n";
    mail($to,$subject,$message,$headers);
}
?>