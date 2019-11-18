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
    $offset = 0;
    if(isset($_GET['offset'])){
        $offset = $_GET['offset'];
    }
    if($offset < 0){
        $offset = 0;
    }
    $result = $conn->prepare("SELECT * FROM images order by img_id desc LIMIT $offset, 5");
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
<?php
if($offset < 0 || ($offset - 5) < 0){
    echo "<a href='?offset=0'> Prev</a>";
}else{
    echo "<a href='?offset=".($offset-5)."'>Prev</a>";
}
echo "<a href='?offset=".($offset+5)."'>  Next</a>";
?>
</body>
</html>