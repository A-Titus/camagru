<!DOCTYPE html>
<html>
    <head>
        <title>camagru</title>
        <link rel="stylesheet" href="style.css">
        <h1>Camagru</h1>
    </head>
    <body>
        <div class="signin">
            <form action="login_check.php" method="POST">
                <h2 style="color: white">Log In</h2>
                <input type ="text" name="username" placeholder="Username">
                <input type="password" name="pass" placeholder="Password"><br><br>
                <input type="submit" name="login" placeholder="Login">
                <br>
                <div id="container">
                    <a href="http://localhost:8080/camagru/forgot_password.php" style=" margin-right:0px; font-size: 13px; font-family:Tahoma, Geneva, sans-serif;">Forgot Password</a>
                </div><br><br><br><br>
                Don't have an account?<a href="register.php">&nbsp;Sign Up</a>

            </form>
        </div>
    </body>
</html>