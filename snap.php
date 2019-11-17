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
                <img id="scream" width="100px" height="100px" src="stickers/smiley.jpg" alt="smiley">
                <canvas name="image" id="player">Canvas still loading</canvas>
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
    
</script>
</body>
</html>

<?php
?>