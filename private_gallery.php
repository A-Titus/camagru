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
        echo"<div><button type='button' action='private_gallery.php' method='POST' name='like'>Like</button></div>";
    }
?>