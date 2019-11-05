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
            <form action="update.php" method="POST">
                <h2 style="color: white">Profile Details</h2>
                <input type ="text" name="new_username" placeholder="Username">
                <input type="submit" name="update_username" placeholder="Update Username">
                <input type ="email" name="new_email" placeholder="Email">
                <input type="submit" name="update_email" placeholder="Update Email">
                <input type="password" name="new_pass" placeholder="Password">
                <input type="submit" name="update_pass" placeholder="Update Password">
                <br>
            </form>

        </div>
    </body>
</html>