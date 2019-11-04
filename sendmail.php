<?php
function send_mail($email, $otp)
{
    $to = $email;
    $subject = "Verify Email";
    $message = "<p></br></br></br></p>
    <p>Your otp: $otp</p></br>
    <p>link: 'http://localhost:8080/camagru/otp.php?link=$otp'</p>";
    $from = "abdussamadtitus@gmail.com";
    $headers = "MIME-Version: 1.0" . "\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
    $headers .= "From: $from" . "\n";
    mail($to,$subject,$message,$headers);
}
?>