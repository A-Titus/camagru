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
  <a class="active" href="#">Gallery</a>
  <a href="index.php">Log in</a>
</div>

<div class="gallery">
<?php
    session_start();
    include_once ('config/database.php');
    $result = $conn->prepare("SELECT * FROM images");
    $result->execute();
    
    while ($data = $result->fetch(PDO::FETCH_ASSOC))
    {
        $imgUrl = $data['image_path'];
        $imgid  = $data['img_id'];
        $user  = $data['username'];
        echo "
        <img class='uploaded-post' src='$imgUrl'/>";
    }
    ?>
</div>
</body>
</html>