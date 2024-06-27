<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail</title>
</head>
<body>
    <ul>
        <li>
            <b>First name :</b> <?= $data->first_name ?>
        </li>
        <li>
            <b>Last name :</b> <?= $data->last_name ?>
        </li>
        <li>
            <b>Email :</b> <?= $data->email ?>
        </li>
        <li>
            <b>Username :</b> <?= $data->username ?>
        </li>
    </ul>
</body>
</html>