<?php
    if (empty($_REQUEST["nom"])) {
        session_start();
        $_SESSION["error"] = "All fields are required !!!";
        header("Location: /index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Votre nom est :
        <?= $_REQUEST["nom"] ?>
    </h1>
    <h2>
        Votre age est :
        <?php echo $_REQUEST["age"] ?>
        ans
    </h2>

    <?php
        if ($_REQUEST["age"] < 18)
            echo '<p>Attention ' . $_REQUEST["nom"] . ' est mineur!!!!</p>';
    ?>

    <?php if ($_REQUEST["age"] < 18): ?>
        <p>Attention <?= $_REQUEST["nom"] ?> est mineur!!!!</p>
    <?php endif ?>
</body>
</html>