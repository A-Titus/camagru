<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['success']);
    header("Location: http://localhost:8080/camagru/index.php");
?>