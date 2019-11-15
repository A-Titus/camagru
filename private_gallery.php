<?php
    session_start();
    include_once ('config/database.php');

    echo "test";
    $result = $conn->prepare("SELECT * FROM images");
    $result->execute();

    while ($data = $result->fetch(PDO::FETCH_ASSOC))
    {
        echo "<h1>{$data['image_name']}</h1>";
        echo "<img src='".$data['image_path']."' width='300px' height='300px'>";
        echo"<div><form action='likecomment.php' method='POST'> 
        <input type='submit' name='like' placeholder='like' value='like'>
            </form></div>";
            
        echo"<div><form action='likecomment.php' method='POST'> 
        <input type ='text' name='comment' placeholder='comment'>
        <input type='submit' name='submit_comment' placeholder='comment' value='comment'>
            </form></div>";
    }
?>