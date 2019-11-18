<?php

session_start();
include("feed.php");
include_once ('config/database.php');

$img_id   = $_GET['img_id'];
$query = $conn->prepare("SELECT username FROM `images` WHERE img_id = $img_id");
$query->execute();
$result = $query->fetch();
$username = $result['username'];
$who = $_SESSION['username'];
if($who == $username)
{
    $query = $conn->prepare("DELETE FROM `images` WHERE img_id = $img_id");
    $query->execute();
    echo "<div class='success_message'>Deleted Successfully</div>";
    header("Location: http://localhost:8080/camagru/feed.php");

}
else
{
    echo "<div class='error_message'>you do not have permission to delete this pic</div>";
}
?>