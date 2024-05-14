<?php
    session_start();

    $username = @$_POST["username"];
    $password = @$_POST["password"];

    if ($username && $password) {
        $cn = new PDO("mysql:host=localhost;dbname=employees-manager", "root", "");
        // $query = $cn->prepare("SELECT * FROM employees WHERE email = ? OR phone = ? AND password = MD5(?)");
        // $query->execute([$username, $username, $password]);

        $query = $cn->prepare("SELECT * FROM employees WHERE email = :username OR phone = :username AND password = MD5(:password)");
        $query->bindParam(":username", $username);
        $query->bindParam(":password", $password);
        $query->execute();
        $user = $query->fetchObject(); // $user->email
        // $user = $query->fetch(); // $user["email"]
        // $user = $query->fetch(PDO::FETCH_ASSOC); // $user["email"]
        // $user = $query->fetch(PDO::FETCH_OBJ); // $user->email
        if ($user) {
            $_SESSION["user-id"] = $user->id;
            $_SESSION["user-role"] = $user->role_id;
            
            if ($user->role_id == 1) { // role id 1 == admin
                header("Location: dashboard.php");
            }
            else {
                header("Location: profile.php");
            }
        }
        else {
            $error = "Invalid username or password!!!";
        }
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
    <form method="post">
        <input
            type="text"
            placeholder="Email or phone number"
            name="username"
            value="0652573006">
        <input
            type="password"
            placeholder="Password"
            name="password"
            value="123456">
        <button>Login</button>

        <p><?= @$error; ?></p>
    </form>
</body>
</html>