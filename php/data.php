<?php
    $conn = new PDO("mysql:host=localhost;dbname=ecom2", "root", "");
    
    if (isset($_GET["action"]) && $_GET["action"] == "delete-employee" && isset($_GET["id"])) {
        $query = $conn->prepare("DELETE FROM employees WHERE employeeNumber = ?");
        $query->execute([$_GET["id"]]);
    }
?>

<table border="1">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $id = 10;
            // $query = $conn->prepare("SELECT * FROM employees WHERE id = :id AND useId = :id");
            // $query->bindParam(":id", $id);
            // $query->execute();


            $query = $conn->query("SELECT * FROM employees");
            while($row = $query->fetch(PDO::FETCH_ASSOC)) {
                echo "<pre>";
                print_r($row);
                echo "</pre>";
                echo "<hr>";
            }

            $rows = [];
            foreach($rows as $row):
        ?>
        <tr>
            <td><?= $row["lastName"]; ?></td>
            <td><?= $row["firstName"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td>
                <form method="GET">
                    <input type="hidden" name="id" value="<?= $row["employeeNumber"]; ?>">
                    <input type="hidden" name="action" value="delete-employee">
                    <button>Supprimer</button>
                </form>
                <form action="form.php" method="get">
                    <input type="hidden" name="id" value="<?= $row["employeeNumber"]; ?>">
                    <button>Modifier</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// $code = "1002";
// $query = $conn->prepare("SELECT * FROM employees WHERE employeeNumber = :id");
// $query->bindParam(":id", $code);
// $query->execute();
// $rows = $query->fetchAll();

// $code = "1002";
// $query = $conn->prepare("SELECT * FROM employees WHERE employeeNumber = ?");
// $query->execute([$code]);
// $rows = $query->fetchAll();


// foreach($rows as $row) {
//     echo $row["firstName"] . " " . $row["lastName"] . "<br>"; 
// }

//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $stmt = $conn->prepare("SELECT * FROM employees");
// $stmt->execute();

//$stmt->execute(["id" => 1143]);
// $id = 1143;
// $stmt->bindParam(":id", $id);

// $rows = $stmt->fetchAll();
// header('Content-Type: application/json; charset=utf-8');
// echo json_encode($rows);
// foreach($rows as $row) {
//     echo $row["firstName"] . " " . $row["lastName"] . "<br>";
// }

// while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
//     echo $row->firstName . " " . $row->lastName . "<br>";
// }

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";