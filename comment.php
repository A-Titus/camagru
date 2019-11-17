<?php

session_start();
include("feed.php");
include_once ('config/database.php');

$img_id   = $_GET['img_id'];
$who = $_SESSION['username'];
$query = $conn->prepare("SELECT username FROM images WHERE img_id = $img_id");
$query->execute();
$result = $query->fetch();
$username = $result['username'];//username of the person who posted the pic
//echo $username;


$query = $conn->prepare("SELECT email FROM users WHERE username = '$username'");
$query->execute();
$email = $query->fetch();
$posteremail = $email['email'];






?>