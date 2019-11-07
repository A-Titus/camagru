<html>
    <head>
        <title>camera test</title>
        <link rel="stylesheet" href="feed.css">
        <body>
        <div class ="camera">
            <video id="video" width="640" height="480" autoplay></video>
            <button id="snap">Snap Photo</button>
            <canvas id="canvas" width="640" height="480"></canvas>
        </div>
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
                //     var myImg = document.getElementById(video).src;
                //     //var image = canvas.toDataURL("image/jpg");
                //    //document.write(myImg);
                //   
                //     $data = myImg;

                //     list($type, $data) = explode(';', $data);
                //     list(, $data) = explode(',', $data);
                //     $data = base64_decode($data);
                    
                //     file_put_contents('path_to_your_directory/tmp/image.png', $data);
                //    
                    
                });
            </script>
        </body>
    </head>
</html>