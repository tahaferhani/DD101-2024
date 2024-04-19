<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<?php
    $conn = new PDO("mysql:host=localhost;dbname=bmi", "root", "");
    $id = @$_GET["id"];

    if (@$_GET["action"] == "edit") {
        $query = $conn->prepare("UPDATE history SET Name = ?, Weight = ?, Height = ?, Date = NOW() WHERE id = ?");
        $query->execute([$_GET["name"], $_GET["weight"], $_GET["height"], $id]);
        header("Location: bmihistory.php");
    }

    $query = $conn->prepare("SELECT * FROM history WHERE id = ?");
    $query->execute([$id]);
    //$row = $query->fetchObject();
    $row = $query->fetch(PDO::FETCH_OBJ);
?>

<body>
    <form>
        <input type="hidden" name="id" value="<?= $row->id; ?>">
        <input type="text" name="name" placeholder="Name" value="<?= $row->Name; ?>">
        <input type="text" name="weight" placeholder="Weight" value="<?= $row->Weight; ?>">
        <input type="text" name="height" placeholder="Height" value="<?= $row->Height; ?>">
        <input type="hidden" name="action" value="edit">
        <button>Edit</button>
        <button type="reset">Reset</button>
    </form>
</body>

</html>