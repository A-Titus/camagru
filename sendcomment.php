<?php
    include ('feed.php');

    echo "test";
    exit();
    if(isset($_POST['comment'])){
    $comment = $_POST['comment'];
    
    $message = "<p></br></br></br>$who commented on your pic</p>
    <p>comment: $comment</p>";
    
    $query = $conn->prepare("INSERT INTO comments (img_id, comment, user) VALUES ('$img_id', '$comment', '$who')");
    $query->execute();
    echo $message;
    send_mail($posteremail, "", $message);
}//fix getting comment from user

?>