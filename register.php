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

            <form action="registration.php" method="POST">
                <h2 style="color: white">Register</h2>
                <input type ="text" name="r_username" placeholder="Username">
                <input type ="email" style="width:240px;
                    text-align: center;
                    background: transparent;
                    border: none;
                    border-bottom: 1px solid #fff;
                    font-family:'play', sans-serif;
                    font-size: 16px;
                    font-weight: 200px;
                    padding: 10px 0;
                    transition: border 0.5s;
                    outline: none;
                    color: rgb(255, 255, 255);"
                name="r_email" placeholder="Email">
                <input type="password" name="r_pass" placeholder="Password">
                <input type="password" name="r_pass_conf" placeholder="Confirm password"><br><br>
                <input type="submit" name="submit" placeholder="register">
                <br>
            </form>

        </div>
    </body>
    <footer>
  <p>Copyright atitus</p>
</footer>
</html>