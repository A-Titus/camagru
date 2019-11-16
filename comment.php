<?php

session_start();
include 'feed.php';
include_once ('config/database.php');

$img_id   = $_GET['img_id'];
$to = $_SESSION['username'];
$query = $conn->prepare("SELECT username FROM images WHERE img_id = $img_id");
$query->execute();
$result = $query->fetch();
$username = $result['username'];//username of the person who posted the pic
//echo $username;


$query = $conn->prepare("SELECT email FROM users WHERE username = '$username'");
$query->execute();
$email = $query->fetch();
$posteremail = $email['email'];



if(isset($_POST['comment']))//fix getting comment from user
$comment = $_POST['comment'];

$message = "<p></br></br></br>$to commented on your pic</p>
<p>comment: $comment</p>";

echo $message;
send_mail($posteremail, "", $message);

?>