<?php
session_start();

$id = @$_SESSION["user-id"];
$role = @$_SESSION["user-role"];

if ($id) {
    if ($role == 1) {
        header("Location: /employees-manager/dashboard.php");
    }
    else {
        header("Location: /employees-manager/profile.php");
    }
}
else {
    header("Location: /employees-manager/login.php");
}