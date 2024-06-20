<?php require("database.php") ?>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET["id"];
        $name = @$_POST["name"];
        $price = @$_POST["price"];
        $category_id = @$_POST["category_id"];

        if ($name && $price && $category_id) {
            $query = $conn->prepare("UPDATE products SET name=?, price=?, category_id=? WHERE id=?");
            $query->execute([$name, $price, $category_id, $id]);
            header("Location: index.php");
        }
        else {
            $error = "All fields are required!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $id = $_GET["id"];
        $query = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_OBJ);
    ?>

    <form action="" method="POST">
        <label>Name</label>
        <input type="text" name="name" value="<?= $product->name ?>">

        <label>Price</label>
        <input type="number" name="price" value="<?= $product->price ?>">

        <label>Category</label>
        <?php
            $query = $conn->query("SELECT *  FROM categories");
            $categories = $query->fetchAll(PDO::FETCH_OBJ);
        ?>
        <select name="category_id">
            <option value="" disabled selected>Select a category</option>
            <?php foreach($categories as $category): ?>
                <option value="<?= $category->id ?>" <?= $category->id == $product->category_id ? "selected" : "" ?>><?= $category->name ?></option>
            <?php endforeach ?>
        </select>

        <button>Save</button>
    </form>

    <div>
        <?php echo @$error ?>
    </div>
</body>
</html>