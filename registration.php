<?php

session_start();


    include("install.php");
    include("register.php");

    include_once 'connect.php';


    if ($_POST['submit'])
    {
        $username = mysqli_real_escape_string($con,$_POST['r_username']);
        mysqli_query($con, "INSERT INTO users_data (username) VALUES ('$username')");
        exit();
    }

  if ($_POST['submit'])
  {
      
      
      $email = mysqli_real_escape_string($con, $_POST['r_email']);
      $pass = mysqli_real_escape_string($con, $_POST['r_pass']);

    
    //add form validation

    //check for existing users

    $user_check = "SELECT * FROM users_data WHERE username = `$username` or email = `$email` LIMIT 1";
    $results = mysqli_query($con, $user_check);
    //$user = mysqli_fetch_assoc($result);

    $resultsCheck = mysqli_num_rows($results);
    if ($resultsCheck > 0)
    {
        header("Location: registration.php?registration=userExist");
        exit();
    }
    else
    {
       
    }

    /*if($user)
    {
        if($user['username'] === $username){array_push($errors, "username already exists");}
        if($user['email'] === $email){array_push($errors, "This email is already in use");}
    }
    if(count($errors) == 0)
    {
        //protect pssword before adding to database
        $query = "INSERT INTO users_data (username, email, user_password) VALUES (`gdfgfdgdf`, `$email`, `$pass`)";
        mysqli_query($con, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "you are now logged in";
    }*/
}

?>