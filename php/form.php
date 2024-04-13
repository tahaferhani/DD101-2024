<?php
    $conn = new PDO("mysql:host=localhost;dbname=ecom2", "root", "");
    
    $query = $conn->prepare("SELECT * from employees WHERE employeeNumber = ?");
    $query->execute([$_GET["id"]]);
    $row = $query->fetch();
?>

<input type="text" value="<?= $row["firstName"]; ?>">
<input type="text" value="<?= $row["lastName"]; ?>">