
<?php
echo "image uploaded";
include_once('config/database.php');
session_start();
$imgfile = file_get_contents("php://input");
$x = explode(',', $imgfile);
$photo = base64_decode($x[1]);
$img_name = uniqid().".png";
$username = $_SESSION['username'];
$fileDestination = 'images/'.$img_name;

file_put_contents("images/".$img_name, $photo);
$sql = $conn->prepare("INSERT INTO images (image_name, image_path, username) VALUES('cam','$fileDestination','$username' )");
$sql->execute();
echo "success";
?>