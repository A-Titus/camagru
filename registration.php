<?php
    include("install.php");
    include("register.php");

    $con = mysqli_connect('localhost', 'root', 'pass123', 'users');
    mysqli_select_db('users');
  
    // if(isset($_POST['submit']))
    // {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    // $s = "SELECT * FROM users_data WHERE username = '$name'";
    // $result = mysqli_query($conn, $s);
    // $num = mysqli_num_rows($result);

   // if($num == 1)
  //  {
      //  echo "Username Already Taken";
  //  }
  //  else
  //  {
       $reg = "INSERT INTO `users_data` (`id`, `username`, `email`, `user_password`) VALUES ('1' ,$name, $email, $pass)";
        if(mysqli_query($con, $reg))
        {
            echo "Records inserted successfully.";
        }
        else
        {
            echo "ERROR: Could not execute $reg. " . mysqli_error($con);
        }
  //  }
//    }

?>