<?php
    session_start();
    
    $name = @$_POST["name"];
    $email = @$_POST["email"];
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($name && $email) {
            // Do insert
            header("Location: list.php");
        }
        else {
            $_SESSION["error"] = "You have to insert name and email!!!!!";
            header("Location: form.php");
        }
    }
?>
