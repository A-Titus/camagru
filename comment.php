<?php

session_start();
include_once ('config/database.php');

$img_id   = $_GET['img_id'];
$username = $_GET['user']; 
$to = $_SESSION['username'];

$comment = $_POST['comment'];

    $message = "<p></br></br></br>$to commented on your pic</p>
    <p>comment: $comment</p>";

    echo $message;




    //get user email using select using username to get exact email to send to
    //get comment from form
?>