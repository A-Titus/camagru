<?php
    session_start();
    if(!isset($_SESSION['success']))
    {
        header("Location: http://localhost:8080/camagru/index.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>camagru</title>
        <link rel="stylesheet" href="../feed.css">
        <h1>Camagru</h1>
    </head>
    <body>
        <div class="topnav">
            <a href="../feed.php">Feed</a>
            <a href="../snap.php">Snap</a>
            <a href="../upload.php">upload</a>
            <a class="active" href="#">Profile</a>
            <a href="../logout.php">Log out</a>
        </div>
        <div>   
    <form action="update.php" method="POST" style="background: rgba(44,62,80,0.7); padding: 40px;
    width: 250px; margin: auto; margin-top: 80px; height: 400px; margin-left: 180x text-align: center;";> 

        <h2 style="color: white">Profile Details</h2>

        <input type ="text" style="width:240px; text-align: center; border: 1px solid white; border-bottom: 1px solid #fff; border-radius: 8px; font-family:'play', sans-serif; font-size: 16px; font-weight: 200px;
            padding: 10px 0; transition: border 0.5s; outline: none;  "name="new_username" placeholder="New Username">

        <input type="submit" style="text-align: center;" name="update_username" placeholder="Update Username" value="Update">

        <input type ="email" style="width:240px; text-align: center; border: 1px solid white; border-bottom: 1px solid #fff; border-radius: 8px; font-family:'play', sans-serif; font-size: 16px; font-weight: 200px;
            padding: 10px 0; transition: border 0.5s; outline: none; "name="new_email" placeholder="New Email">

        <input type="submit" style=" text-align: center" name="update_email" placeholder="Update Email" value="Update">

        <input type="password" style="width:240px; text-align: center; border: 1px solid white; border-bottom: 1px solid #fff; border-radius: 8px; font-family:'play', sans-serif; font-size: 16px; font-weight: 200px;
            padding: 10px 0; transition: border 0.5s; outline: none; "name="new_pass" placeholder="New Password">

        <input type="submit"  style="text-align: center" name="update_pass" placeholder="Update Password" value="Update">
                <br>
    </form>

        </div>
    </body>
    <footer>
  <p>Copyright atitus</p>
</footer>
</html>