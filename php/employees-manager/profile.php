<?php
    session_start();

    if (@$_POST["action"] == "logout") {
        unset($_SESSION["user-id"], $_SESSION["user-role"]);
        header("Location: login.php");
    }

    $cn = new PDO("mysql:host=localhost;dbname=employees-manager", "root", "");
    $id = @$_SESSION["user-id"];

    if ($id) {
        $query = $cn->prepare("SELECT * FROM employees WHERE id = ?");
        $query->execute([$id]);
        $user = $query->fetchObject();
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
    <h1>Profile page</h1>

    <form>
        <label>First name</label>
        <input type="text" value="<?= @$user->first_name ?>"><br>
        <label>Last name</label>
        <input type="text" value="<?= @$user->last_name ?>"><br>
        <label>CIN</label>
        <input type="text" value="<?= @$user->cin ?>"><br>
        <label>Email</label>
        <input type="email" value="<?= @$user->email ?>"><br>
        <label>Phone</label>
        <input type="text" value="<?= @$user->phone ?>"><br>
        <label>Salary</label>
        <input type="text" value="<?= @$user->salary ?>"><br>
        <label>Password</label>
        <input type="password"><br>
        <button>Modifier</button>
    </form>

    <form method="POST">
        <input type="hidden" name="action" value="logout">
        <button>Logout</button>
    </form>
</body>
</html>