<?php
require("connexion.php");

$id = @$_GET["id"];

if (!$id) {
    header("Location: index.php");
    die();
}

$query = $conn->prepare("DELETE FROM todo WHERE id = ?");
$query->execute([$id]);
header("Location: index.php");