<!DOCTYPE html>

<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>camagru</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     
   </head>
   <body>
            <a href="upload-photo.php" data-reveal-id="uploadModal" data-reveal-ajax="true">Add Photo</a>
      <br/>
      <!--Content goes here-->
      <div class="row">
         
            <?php
      if(isset($_GET['success']))
      {
         if($_GET['success']=="yes")
         {?>
            Image "<?= $_GET['title']; ?>" uploaded successfully.
               <a href="#" class="close">&times;</a>
   <?php }
         else 
         {?>
            "success";
   <?php }
      }?>
      <ul>
         <?php
         require 'connect.php';
         $stmt = $conn->query("SELECT * FROM images ORDER by img_id ASC");
         //prepare
         foreach ($stmt as $img) {
         ?>
         <li>
            <a href="<?= $img['img_path']; ?>">
            <img data-caption="<?= $img['img_title']; ?>" src="<?= $img['img_path']; ?>"></a>
         </li>
         <?php } ?>
      </ul>
        
               </div>
   </body>
</html>
