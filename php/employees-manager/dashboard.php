<?php
    $cn = new PDO("mysql:host=localhost;dbname=employees-manager", "root", "");
    $query = $cn->query("SELECT * FROM employees");
    $users = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dashboard page <small><a href="#">Add new employee</a></small></h1>

    <table border="1">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>CIN</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Actions</th>
        </tr>
        <?php foreach($users as $user): ?>
        <tr>
            <th><?= $user->first_name ?></th>
            <th><?= $user->last_name ?></th>
            <th><?= $user->cin ?></th>
            <th><?= $user->phone ?></th>
            <th><?= $user->salary ?></th>
            <td>
                <button>Update</button>
                <button>Disable</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>