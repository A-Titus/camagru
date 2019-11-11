<?php
include_once 'config/database.php';
if (isset($_POST['submit']))
{
   session_start();
   $username = $_SESSION['username'];
   $file = $_FILES['file'];
   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileSize = $_FILES['file']['size'];
   $fileError = $_FILES['file']['error'];
   $fileType = $_FILES['file']['type'];
   $filter = explode('.', $fileName);
   $fileActualExt = strtolower(end($filter));
   $allowed = array('jpg', 'jpeg', 'png', 'pdf');
   if (in_array($fileActualExt, $allowed))
   {
       if ($fileError ===0)
       {
           if ($fileSize < 1000000)
           {
               $_SESSION["email"]= $email;
               $fileNameNew = uniqid('', true).".".$fileActualExt;
               $fileDestination = 'img/'.$fileNameNew;
               move_uploaded_file($fileTmpName, $fileDestination);
               $check = "INSERT INTO images (username, image_name) VALUES('$username','$fileName')";
               $sql = $conn->prepare($check);
               $sql->execute();
               //header("Location: http://127.0.0.1:8080/camagru/profile.php");
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
?>
<!DOCTYPE html>
<html>
   <head>
       <title>Upload</title>
   </head>
   <body>
       <form action = "upload.php" method="POST" enctype="multipart/form-data">
           <input type="file" name="file">
           <button type="submit" name="submit">UPLOAD</button>
   </body>
</html>