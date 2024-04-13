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
    <form method="GET" action="result.php">
        <input placeholder="Nom" name="nom" type="text">
        <input placeholder="Age" name="age" type="number">
        <select name="sexe">
            <option>M</option>
            <option>F</option>
        </select>
        <button>Valider</button>

        <?php if(isset($_SESSION["error"])): ?>
            <p>
                <?php
                    echo $_SESSION["error"];
                    unset($_SESSION["error"]);
                ?>
            </p>
        <?php endif; ?>
    </form>
</body>
</html>