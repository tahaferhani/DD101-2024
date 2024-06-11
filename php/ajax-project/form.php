<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="insert.php">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <button>Send</button>

        <p><?php
            echo @$_SESSION["error"];
            unset($_SESSION["error"]);
        ?></p>
    </form>
</body>
</html>