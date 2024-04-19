<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Home page</h1>
    <p>Connected user : <?= $_SESSION["username"] ?></p>

    <pre>
    <?php
        print_r($_SESSION);
    ?>
    </pre>
</body>
</html>