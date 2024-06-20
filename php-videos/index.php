<?php require("database.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <a class="btn" href="new-product.php">Add new product</a>
        <br>
        <br>
    </div>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th></th>
        </tr>
        <?php
            $id = 10;
            $query = $conn->query("SELECT prod.*, cat.name as category FROM products prod, categories cat WHERE prod.category_id = cat.id ORDER BY prod.id DESC");
            $items = $query->fetchAll(PDO::FETCH_OBJ);
            foreach($items as $item) {
        ?>
        <tr>
            <td><?php echo $item->id ?></td>
            <td><?php echo $item->name ?></td>
            <td><?php echo $item->price ?></td>
            <td><?php echo $item->category ?></td>
            <td>
                <a class="btn green" href="update-product.php?id=<?= $item->id ?>">Update</a>
                <a class="btn red" onclick="onDelete(<?= $item->id ?>)">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>


    <script>
        function onDelete(id) {
            var isOk = confirm("Are you sure you want to delete this product ?");
            if (isOk)
                location.href = `delete-product.php?id=${id}`;
        }
    </script>
</body>
</html>