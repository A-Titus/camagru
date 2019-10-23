<?php

session_start();


    include("install.php");
    include("register.php");

    include_once 'connect.php';


    if ($_POST['submit'])
    {
        //username = mysqli_real_escape_string($con,$_POST['r_username']);
        $username = validate($_POST['r_username']);
        $email = mysqli_real_escape_string($con, $_POST['r_email']);
        $pass = mysqli_real_escape_string($con, $_POST['r_pass']);

        
        
        
        //add form validation
        
        //check for existing users
        
        $user_check = "SELECT * FROM users_data WHERE username = `$username`";
        $results = mysqli_query($con, $user_check);
        //$user = mysqli_fetch_assoc($result);
        
        if(mysqli_num_rows($results) > 0)
        {
            echo"name already exists";
            header("Location: registration.php?registration=userExist");
            exit();
        }
        else
        {
            mysqli_query($con, "INSERT INTO users_data (username, email, user_password) VALUES ('$username', '$email', '$pass')");
            echo"success";
        }
        // if ($resultsCheck >= 1)
        // {
        //     echo "username exists";
        // }
        // else
        // {
        //     echo " added to db";
        //     exit();
            
        // }


        function validate($string)
        {
            $string = strip_tags($string);
            $string = strtolower($string);
            $string = preg_replace('/\s+/', '', $string);
            $string = ucfirst($string);

            return ($string);
        }
        
    }
?>