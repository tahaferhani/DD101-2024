<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET" action="addition.php">
        <input type="number" name="nb1" value="<?= @$_GET["nb1"]; ?>">
        <input type="number" name="nb2" value="<?= @$_GET["nb2"]; ?>">
        <button>Calculer</button><br>
        <b>
            <?php
                // if (isset($_GET["nb1"]) && isset($_GET["nb2"])) {
                //     echo $_GET["nb1"] + $_GET["nb2"];
                // }
                $total = @$_GET["nb1"] + @$_GET["nb2"];
                echo $total ?: "";
            ?>
        </b>
    </form>
</body>
</html>