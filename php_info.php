    
    <?php
        $to = "abdussamadtitus@gmail.com";
        $subject = "Your password";
        $message = "<p>Hello Homer,</p>
        <p>Thanks for registering.</p>
        <p>Your password is: <b>springfield</b></p>
        ";
        $from = "kaleemnike1@gmail.com";
        $headers = "MIME-Version: 1.0" . "\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\n";
        $headers .= "From: $from" . "\n";

        // Send email
        mail($to,$subject,$message,$headers);

        // Inform the user
        echo "Thanks for registering! We have just sent you an email with your password.";
    ?>