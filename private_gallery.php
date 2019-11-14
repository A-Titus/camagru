<?php
    include_once ('config/database.php');

    echo "test";
    $result = $conn->prepare("SELECT * FROM images");
    $result->execute();

    while ($data = $result->fetch(PDO::FETCH_ASSOC)){
        // do something awesome with row
      //  echo "<img src=".$data["image_name"].">";
        echo "<h1>{$data['image_name']}</h1>";
       echo "<img src='".$data['image_path']."' width='400px' height='400px'>";
     } 
?>