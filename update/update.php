<?php
    session_start();

    include("profile.php");
    include("../sendmail.php");
    
    include_once "../config/database.php";
    //echo $_SESSION['username'];

    $old_username = $_SESSION['username'];
    if(isset($_POST['update_username']))
    {
        $username = $_POST['new_username'];
        try{

            $statement = $conn->prepare("SELECT * FROM users WHERE username = '$username'");
             $statement->execute();
            //$verif = $statement->fetchAll();
               $count = $statement->rowCount();
               if($count > 0)
               {
                   echo "<div class='error_message'>username already in use</div>";
                   exit();
               }
               else{
                   ////////////////
            $statement = $conn->prepare("UPDATE `users` SET username = '$username' WHERE username = '$old_username'");
            $statement->execute();
            $_SESSION['username'] = $username;
            echo "<div class='success_message'>Updated successfully</div>";
               }
    }
        catch(PDOException $e)
        {
            echo "ERROR: " . $e->getMessage();
        }
    }

    if(isset($_POST['update_email']))
    {
        $email = $_POST['new_email'];
        try{

            $statement = $conn->prepare("SELECT email FROM users WHERE email = '$email'");
            $statement->execute();
           //$verif = $statement->fetchAll();
              $count = $statement->rowCount();
              if($count > 0)
              {
                  echo "<div class='error_message'>email already in use</div>";
                  exit();
              }
              else{
                  //set verified = to 0 and send new otp, then do verifcation
                  $otp = rand(10000, 99000);
                  $statement = $conn->prepare("UPDATE `users` SET email = '$email' WHERE username = '$old_username'");
                  $statement->execute();
                  $statement = $conn->prepare("UPDATE `users` SET otp = '$otp' WHERE email = '$email'");
                 $statement->execute();
                 $statement = $conn->prepare("UPDATE `users` SET verified = '0' WHERE email = '$email'");
                 $statement->execute();

                 $message = "<p></br></br></br></p>
                 <p>Your otp: $otp</p></br>
                 <p><a href='http://localhost:8080/camagru/otp.php?link=$otp'>Click here</a></p>";
                 send_mail($email, $otp, $message);
                 echo "<div class='success_message'>success</div>";
                    echo "Your update request is been processed! We have just sent you an email with your verification link.";
                    header("Location: http://localhost:8080/camagru/otp.php");// test out properly
                        }
        }
        catch(PDOException $e)
        {
            echo "ERROR: " . $e->getMessage();
        }
    }

    if(isset($_POST['update_pass']))
    {
        $pass = $_POST['new_pass'];
        $uppercase = preg_match('@[A-Z]@', $pass);
        $lowercase = preg_match('@[a-z]@', $pass);
        $number    = preg_match('@[0-9]@', $pass);
        try{
            if(!$uppercase || !$lowercase || !$number || strlen($pass) < 8) 
            {
                echo "<div class='error_message'>Password should consist of 8 characters containing an Uppercase letter, Lowercase letter and a number</div>";
            }
            $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);
            $statement = $conn->prepare("UPDATE `users` SET user_password = '$hashed_pass' WHERE username = '$old_username'");
            $statement->execute();
            echo "<div class='success_message'>Updated successfully</div>";
        }
        catch(PDOException $e)
        {
            echo "ERROR: " . $e->getMessage();
        }
    }

    if(isset($_POST['noti']))
    {
       if($_POST['notify'] == 'yes')
       {
        $statement = $conn->prepare("UPDATE `users` SET notify = '1' WHERE username = '$old_username'");
        $statement->execute();
        echo "<div class='success_message'>You will recieve notifications</div>";
       }
       else
       {
           $statement = $conn->prepare("UPDATE `users` SET notify = '0' WHERE username = '$old_username'");
           $statement->execute();
           echo "<div class='error_message'>You will not recieve notifications</div>";
       }
        
    }

?>