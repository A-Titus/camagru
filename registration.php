<?php
    session_start();

    include("register.php");
    include("sendmail.php");

    include_once './config/database.php';

    if(isset($_POST['submit']))
    {
        $username = $_POST['r_username'];
        $email = $_POST['r_email'];
        $pass1 = $_POST['r_pass'];
        $pass2 = $_POST['r_pass_conf'];
        $uppercase = preg_match('@[A-Z]@', $pass1);
        $lowercase = preg_match('@[a-z]@', $pass1);
        $number    = preg_match('@[0-9]@', $pass1);
        try{
        if(!$uppercase || !$lowercase || !$number || strlen($pass1) < 8) 
        {
            echo "<div class='error_message'>Password should consist of 8 characters containing an Uppercase letter, Lowercase letter and a number</div>";
        }
        if($pass1 != $pass2)
        {
            echo "<div class='error_message'>Passwords dont match</div>";
            exit();
        }


       if(empty($username)  || empty($email) || empty($pass1) || empty($pass2))
       {
           echo "<div class='error_message'>Fields missing</div>";
       }
       else
       {
           
           $statement = $conn->prepare("SELECT * FROM users WHERE username = '$username' OR email = '$email'");
           $statement->execute();
            //$verif = $statement->fetchAll();
               $count = $statement->rowCount();
               if($count > 0)
               {
                   echo "<div class='error_message'>username or email already in use</div>";
                   exit();
               }
               else
               {
                    $_SESSION['email'] = $email;
                    $hashed_pass = password_hash($pass1, PASSWORD_BCRYPT);
                    $otp = rand(10000, 99000);
                    $query = $conn->prepare("INSERT INTO users (username, email, user_password, verified, otp) VALUES ('$username', '$email', '$hashed_pass', '0', $otp)");
                    $query->execute();
                    $message = "<p></br></br></br></p>
                            <p>Your otp: $otp</p></br>
                            <p><a href='http://localhost:8080/camagru/otp.php?link=$otp'>Click here</a></p>";
                    echo "<div class='success_message'>success</div>";
                    send_mail($email, $otp, $message);
                    echo "Thanks for registering! We have just sent you an email with your verification link.";
                    header("Location: http://localhost:8080/camagru/otp.php"); 
                }
                

        }
    }
    catch(PDOException $e)
    {
        echo "ERROR: " . $e->getMessage();
    }
    }
?>