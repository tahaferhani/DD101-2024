<?php require("database.php");

$id = $_GET["id"];

$query = $conn->prepare("DELETE FROM products WHERE id = ?");
$query->execute([$id]);

header("Location: index.php");