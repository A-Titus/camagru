<?PHP
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
<title>feed</title>
<link rel="stylesheet" href="feed.css">
<h1>Camagru</h1>
</head>
<body>

<div class="topnav">
  <a class="active" href="#">Feed</a>
  <a href="snap.php">Snap</a>
  <a href="upload.php">Upload</a>
  <a href="./update/profile.php">Profile</a>
  <a href="logout.php">Log out</a>
</div>

<div class="gallery">
<?php
    session_start();
    include_once ('config/database.php');
    $result = $conn->prepare("SELECT * FROM images ORDER BY uploaded_date ASC");
    $result->execute();
    
    while ($data = $result->fetch(PDO::FETCH_ASSOC))
    {
        $imgUrl = $data['image_path'];
        $imgid  = $data['img_id'];
        $user  = $data['username'];
        $sql = $conn->prepare("SELECT * FROM likes WHERE img_id = $imgid");
        $sql->execute();
        $count = $sql->rowCount();

        echo "
        
        <div class='post-container'>
        <img class='uploaded-post' src='$imgUrl'/>
        <div class='like-commentSection'>
    
        <a class='like-post' href='likecomment.php?img_id=$imgid&username=$user'>like <span class='like-count'>";
        echo "$count";
        
        echo "
        </span></a>
            <div class='comment-container'>
                <form action='comment.php?img_id=$imgid&username=$user' method='POST'>
                <input type ='text' name='comment' placeholder='comment'>
                <input type ='submit' name='comment_button' class='comment-post' >comment<span>
                </form>
            </div>

            <div class='delete-container'>
                <a class='delete-post' name='delete' href='delete.php?img_id=$imgid&username=$user'>delete<span class='like-coun'>
            </div>
        </div>
    </div>
        
        ";
    }


?>


</div>


</body>
<footer>
  <p>Copyright atitus</p>
</footer>
</html>