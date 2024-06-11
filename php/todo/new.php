<?php
session_start();
require("connexion.php");

$title = @$_POST["title"];

if (!$title) {
    $_SESSION["error"] = "Please fill in the title input";
    header("Location: index.php");
    die();
}

$query = $conn->prepare("INSERT INTO todo (title) VALUES (?)");
$query->execute([$title]);
header("Location: index.php");