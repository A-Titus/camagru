<?php
function send_mail($email, $otp, $message)
{
    $to = $email;
    $subject = "Verify Email";
    $from = "atitus@student.wethinkcode.co.za";
    $headers = "MIME-Version: 1.0" . "\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
    $headers .= "From: $from" . "\n";
    mail($to,$subject,$message,$headers);
}
?>