<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="feed.css">
   <script src="script.js" type="text/javascript"></script>
   <title>SnapShot</title>

   <h1>Camagru</h1>

   <div class="topnav">
    <a href="feed.php">Feed</a>
    <a class="active" href="#">Snap</a>
    <a href="upload.php">Upload</a>
    <a href="./update/profile.php">Profile</a>
    <a href="logout.php">Log out</a>
</div>

</head>
<body class="news">
    <header>
        <script src="script.js"></script>
        <div id="newImages">
            <div>
                <video id="player">Video is loading...</video>
			</div>
  </header>
    <div id="container">
        <video autoplay = "true" id = "videoElement"  width="500px" height="375px"></video>
			<div>
                <input type="submit" class="button1" value="SnapShot" id="capture">
                <input type="submit" class="" value="Save" id="save">
                <p><canvas class="snap" name="image" id="canvas" width="500px" height="375px">Canvas Still Loading</canvas></p>
                <canvas class="snap1" name="image1" id="canvas_stickers" width="50px" height="50px">Canvas Still Loading</canvas>
                <canvas name="image" id="player">Canvas still loading</canvas>
                <div class="container2" style="display:inline-block; padding-right: 17%;">
                    <button onclick="stickers('stickers/angrybird.png')" class="btn">sticker1</button>
                    <button onclick="stickers('stickers/pizza.png')" class="btn">sticker2</button>
                </div>
            </div>
    </div>
<script type="text/javascript">
    var video = document.querySelector("#videoElement");
    navigator.getUserMedia=navigator.getUserMedia||navigator.webkitGetUsermedia||
    navigator.mozGetUserMedia||navigator.msGetUserMedia||navigator.oGetUserMedia;
    var canvas = document.getElementById("canvas");
    if (navigator.getUserMedia) 
    {
        navigator.getUserMedia({video:true}, handleVideo, videoError);
    }
    function handleVideo(localStream)
    {
        self.video.srcObject = localStream;
    }    
    function videoError(e)
    {
    }
    var context = canvas.getContext('2d');
    capture.addEventListener("click", function(){
    context.drawImage(video, 0, 0, 600, 600);});
    
    document.getElementById('save').addEventListener('click', function(e){
        var image = canvas.toDataURL('image/png');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                alert(this.responseText);
            }
        }
        xhttp.open("post", "cam.php",false);
        xhttp.send(image);
    })

  
        function setPicture(select){
      var DD = document.getElementById('dropdown');
      var value = DD.options[DD.selectedIndex].value;
      img1.src = value;
    }
    function stickers(path) {
       var sticker = new Image();
       var width = video.offsetWidth, height = video.offsetHeight;
       sticker.src = path;
       if (canvas) {
           contxt = canvas.getContext('2d');
           contxt.drawImage(sticker, 0, 0, 200, 200);
           pic.value = canvas.toDataURL('image/png');
           if (!(document.getElementById("img"))) {
               var elem = document.createElement("img");
               elem.setAttribute("src", sticker.src);
               document.getElementById("stickers").appendChild(elem);
           }
       }
};
    

</script>
<?php
include_once('config/database.php');
session_start();
$result = $conn->prepare("SELECT * FROM images order by img_id desc");
    $result->execute();
    
    while ($data = $result->fetch(PDO::FETCH_ASSOC))
    {
        $imgUrl = $data['image_path'];
        $imgid  = $data['img_id'];
        $user  = $data['username'];
        echo "
        <div class ='image'>
        <br>
        <img widthclass='uploaded-post' src='$imgUrl' style='width:20% '/>;
        <div>";
    }
?>
</body>
</html>

<?php
?>