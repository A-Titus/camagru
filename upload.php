<?php
    session_start();
    include_once 'config/database.php';
    if(!isset($_SESSION['success']))
    {
        header("Location: http://localhost:8080/camagru/index.php");
    }

if (isset($_POST['submit']))
{
   $username = $_SESSION['username'];
   $file = $_FILES['file'];
   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileSize = $_FILES['file']['size'];
   $fileError = $_FILES['file']['error'];
   $fileType = $_FILES['file']['type'];
   $filter = explode('.', $fileName);
   $fileActualExt = strtolower(end($filter));
   $allowed = array('jpg', 'jpeg', 'png');
try{
   if (in_array($fileActualExt, $allowed))
   {
       if ($fileError ===0)
       {
           if ($fileSize < 1000000)
           {
               $_SESSION["email"]= $email;
               $fileNameNew = uniqid('', true).".".$fileActualExt;
               $fileDestination = 'images/'.$fileNameNew;
               move_uploaded_file($fileTmpName, $fileDestination);
               $sql =$conn->prepare("INSERT INTO images (username, image_name, image_path) VALUES('$username','$fileName','$fileDestination')");//
               $sql->execute();
               header("Location: http://127.0.0.1:8080/camagru/private_gallery.php");
           }
           else
           {
               echo "your file is too big!";
           }
       }
       else
       {
           echo "There was an error uploading your file!";
       }
   }
   else
   {
       echo "you cannot upload files of this type";
   }
}
catch(PDOException $e)
{
    echo "ERROR: " . $e->getMessage();
}
}
?>
<!DOCTYPE html>
<html>
   <head>
       <title>Upload</title>
       <link rel="stylesheet" href="feed.css">

       <h1>Camagru</h1>
   </head>
   <body>
   <div class="topnav">
    <a href="feed.php">Feed</a>
    <a href="camera.php">Snap</a>
    <a class="active" href="#">Upload</a>
    <a href="./update/profile.php">Profile</a>
    <a href="logout.php">Log out</a>
</div>
       <form action = "upload.php" method="POST" enctype="multipart/form-data">
           <input type="file" name="file">
           <button type="submit" name="submit">UPLOAD</button>
   </body>
</html>