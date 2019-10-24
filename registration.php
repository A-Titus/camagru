<?php
    session_start();


    include("install.php");
    include("register.php");

    include_once 'connect.php';


    if ($_POST['submit'])
    {
        $username = mysqli_real_escape_string($con,$_POST['r_username']);
        $email = mysqli_real_escape_string($con,$_POST['r_email']);
        $pass1 = mysqli_real_escape_string($con,$_POST['r_pass']);
        $pass2 = mysqli_real_escape_string($con, $_POST['r_pass_conf']);
        
        //add form validation

        if (empty($username)) { echo  "Username is required"; }
        if (empty($email)) { echo  "Email is required"; }
        if (empty($pass1)) { echo "Password is required"; }
        if ($pass1 != $pass2) {
        echo "The two passwords do not match";}
        

        
        //check for existing users


            $user_check_query = "SELECT * FROM users_data WHERE username='$username' OR email='$email' LIMIT 1";
            $result = mysqli_query($con, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            
            if ($user) { // if user exists
                if ($user['username'] === $username || $user['email'] === $email)
                {
                    echo " User already exists";
                    exit();
                }
            }
            mysqli_query($con, "INSERT INTO users_data (username, email, user_password) VALUES ('$username', '$email', '$pass1')");
            echo"success";
        //////////////////////////

        // function validate($string)
        // {
        //     $string = strip_tags($string);
        //     $string = strtolower($string);
        //     $string = preg_replace('/\s+/', '', $string);
        //     $string = ucfirst($string);

        //     return ($string);
        // }
        
    }
?>