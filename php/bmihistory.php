<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img {
            width: 30px;
            height: auto;
        }

        table tr.disabled {
            background-color: gray;
        }
    </style>
</head>

<body>
    <?php
    $conn = new PDO("mysql:host=localhost;dbname=bmi", "root", "");
    
    $id = @$_GET["id"];

    if (@$_GET["action"] == "disable" || @$_GET["action"] == "enable") {
        $query = $conn->prepare("UPDATE history SET Active = ? WHERE id = ?");
        $status = (int)(@$_GET["action"] == "enable"); // (int) CASTING
        $query->execute([$status, $id]);
    }

    if (@$_GET["action"] == "delete") {
        $query = $conn->prepare("DELETE FROM history WHERE id = ?");
        $query->execute([$id]);
    }

    $query = $conn->query("SELECT * FROM history ORDER BY id DESC");
    $rows = $query->fetchAll(PDO::FETCH_OBJ);
    ?>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Weight</th>
            <th>Height</th>
            <th>BMI</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($rows as $row) : ?>
            <tr class="<?= !$row->Active ? 'disabled' : ''; ?>">
                <td><?= $row->Name; ?></td>
                <td><?= $row->Weight; ?>kg</td>
                <td><?= $row->Height; ?>m</td>
                <td>
                    <?php $bmi = $row->Weight / $row->Height ** 2; ?>
                    <?php if ($bmi && $bmi < 18.5) : ?>
                        <img src="./bmi 1.jpeg" />
                    <?php endif; ?>
                    <?php if ($bmi >= 18.5 && $bmi < 25) : ?>
                        <img src="./bmi 2.jpeg" />
                    <?php endif; ?>
                    <?php if ($bmi >= 25 && $bmi < 30) : ?>
                        <img src="./bmi 3.jpeg" />
                    <?php endif; ?>
                    <?php if ($bmi >= 30 && $bmi < 35) : ?>
                        <img src="./bmi 4.jpeg" />
                    <?php endif; ?>
                    <?php if ($bmi > 35) : ?>
                        <img src="./bmi 5.jpeg" />
                    <?php endif; ?>
                </td>
                <td>
                    <form>
                        <input type="hidden" name="action" value="<?= $row->Active ? 'disable' : 'enable'; ?>">
                        <input type="hidden" name="id" value="<?= $row->id; ?>">
                        <button><?= $row->Active ? "Disable" : "Enable"; ?></button>
                    </form>
                    <form>
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id" value="<?= $row->id; ?>">
                        <button>Delete</button>
                    </form>
                    <form action="bmiedit.php">
                        <input type="hidden" name="id" value="<?= $row->id; ?>">
                        <button>Edit</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>