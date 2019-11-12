<?php
    include_once 'config/database.php';

     
    // select the image 
    $query = "SELECT * FROM images WHERE img_id = 1"; 
    $stmt = $con->prepare( $query );
     
    // bind the id of the image you want to select
    $stmt->bindParam(1, $_GET['img_id']);
    $stmt->execute();
     
    // to verify if a record is found
    $num = $stmt->rowCount();
     
    if( $num ){
        // if found
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // specify header with content type,
        // you can do header("Content-type: image/jpg"); for jpg,
        // header("Content-type: image/gif"); for gif, etc.
        header("Content-type: image/png");
        
        //display the image data
        print $row['data'];
        exit;
    }else{
        //if no image found with the given id,
        //load/query your default image here
    }
?>

<html>
    <head>
        <title>PHP Tutorial</title>
    </head>
<body>
 
    <div>Here's the image from the database:</div>
 
    <!– "1" is the database id of the image to be selected –>
    <img src=”private_gallery.php?img_id=1” />
</body>
</html>