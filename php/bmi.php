<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        img {
            width: 50px;
            height: auto;
        }
    </style>
</head>

<body>
    <form>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="weight" placeholder="Weight">
        <input type="text" name="height" placeholder="Height">
        <button>Calculate</button>
        <button type="reset">Reset</button>
    </form>
    <a href="./bmihistory.php">History</a>

    <br>
    <br>

    <?php
        $name = @$_GET["name"];
        $weight = @$_GET["weight"];
        $height = @$_GET["height"];
        $bmi = $height ? $weight / ($height/100)**2 : null;

        if ($name && $weight && $height) {
            $conn = new PDO("mysql:host=localhost;dbname=bmi", "root", "");
            $query = $conn->prepare("INSERT INTO history (Name, Weight, Height, Date) values (?, ?, ?, NOW())");
            $query->execute([$name, $weight, $height / 100]);
            header("Location: bmihistory.php");
        }
    ?>

    <?php if ($bmi && $bmi < 18.5): ?>
        <img src="./bmi 1.jpeg" />
    <?php endif; ?>
    <?php if ($bmi >= 18.5 && $bmi < 25): ?>
        <img src="./bmi 2.jpeg" />
    <?php endif; ?>
    <?php if ($bmi >= 25 && $bmi < 30): ?>
        <img src="./bmi 3.jpeg" />
    <?php endif; ?>
    <?php if ($bmi >= 30 && $bmi < 35): ?>
        <img src="./bmi 4.jpeg" />
    <?php endif; ?>
    <?php if ($bmi > 35): ?>
        <img src="./bmi 5.jpeg" />
    <?php endif; ?>
</body>

</html>