<?php
    session_start();

    include_once ('config/database.php');
 
    $img_id   = $_GET['img_id'];
    $username = $_SESSION['username']; 
    
    $statement = $conn->prepare("INSERT INTO `likes` (img_id, likedby) VALUES('$img_id', '$username')");
    $statement->execute();

    

?>