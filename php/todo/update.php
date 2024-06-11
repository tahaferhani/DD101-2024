<?php
require("connexion.php");

$id = @$_POST["id"];

if (!$id) {
    header("Location: index.php");
    die();
}

$query = $conn->prepare("UPDATE todo SET done = !done WHERE id = ?");
$query->execute([$id]);
header("Location: index.php");