<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
</head>
<body>
    <a href="index.php?action=create">Add new user</a>

    <br><br>

    <table border="1">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Username</th>
            <th></th>
        </tr>
        <?php foreach($data as $item): ?>
            <tr>
                <td><?= $item->first_name ?></td>
                <td><?= $item->last_name ?></td>
                <td><?= $item->email ?></td>
                <td><?= $item->username ?></td>
                <td>
                    <a href="index.php?action=detail&id=<?= $item->id ?>">Detail</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</body>
</html>