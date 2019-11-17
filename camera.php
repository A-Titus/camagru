<?php
    session_start();
    if(!isset($_SESSION['success']))
    {
        header("Location: http://localhost:8080/camagru/index.php");
    }
    ?>

<html>
    <head>
        <title>camera test</title>
        <link rel="stylesheet" href="feed.css">
        <h1>Camagru</h1>
        <body>
            <div class="topnav">
                <a href="feed.php">Feed</a>
                <a class="active" href="#">Snap</a>
                <a href="upload.php">upload</a>
                <a href="update/profile.php">Profile</a>
                <a href="logout.php">Log out</a>
            </div>
           <p> <video id="video" width="640" height="480" autoplay></video></p>
            <p> <button id="snap">Snap Photo</button></p>
           <p> <canvas id="canvas" width="640" height="480"></canvas></p>
            
            <div class="cam">
                <script>
                var video = document.getElementById('video');
                if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia)
                {
                    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream)
                    {
                        video.srcObject = stream;
                        video.play();
                    });
                }
                var canvas = document.getElementById('canvas');
                var context = canvas.getContext('2d');
                var video = document.getElementById('video');

                // Trigger photo take
                document.getElementById("snap").addEventListener("click", function()
                {
                    context.drawImage(video, 0, 0, 640, 480);
                    const a = document.createElement("a");

                    document.body.appendChild(a);
                    a.href = canvas.toDataURL();
                    a.download = "image.png";
                    a.click(); //auto click virtual link when snap button is clicked
                    document.body.removeChild(a);//delete link
                    ///////////////////////////////////////
                    //////////////////////////////////////////



                    
                });
            </script>
            </div>
        </body>
        <footer>
  <p>Copyright atitus</p>
</footer>
    </head>
</html>