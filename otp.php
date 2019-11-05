<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>camagru</title>
        <link rel="stylesheet" href="style.css">
        <h1>Camagru</h1>
    </head>
    <body>
        <div class="signin">
            <form action="verify.php" method="POST">
                <h2 style="color: white">Verify</h2>
                <input type ="text" name="otp" placeholder="Please enter your otp">
                <input type="submit" name="verify" placeholder="verify">
                <br><br><br><br><br>
                <a href="index.php">&nbsp;Login In</a>
            </form>
        </div>
    </body>
</html>