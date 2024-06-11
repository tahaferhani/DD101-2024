<?php
session_start();
require("connexion.php");

$query = $conn->query("SELECT * FROM todo ORDER BY id DESC");
$tasks = $query->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body class="p-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-4 offset-4">
                <form action="new.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <input class="form-control form-control-lg" name="title" type="text" placeholder="Task Title">
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-primary btn-lg">Add</button>
                        </div>
                    </div>
                    <?php if(@$_SESSION["error"]): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?php
                            echo $_SESSION["error"];
                            unset($_SESSION["error"]);
                        ?>
                    </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-6 offset-3">
                <ul class="list-group">
                    <?php foreach ($tasks as $task) : ?>
                        <li class="d-flex align-items-center justify-content-between list-group-item list-group-item-<?php echo $task->done ? 'success' : 'warning'; ?>">
                            <?php echo $task->title; ?>

                            <div class="btn-group">
                                <form action="update.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $task->id; ?>">
                                    <button class="btn btn-primary"><?php echo $task->done ? 'Undo' : 'Done'; ?></button>
                                </form>
                                <button type="button" class="btn btn-danger" onclick="deleteTask(<?php echo $task->id; ?>)">✕</button>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>


    <script>
        function deleteTask(id) {
            if (!confirm("Are you sure you want to delete this task ?"))
                return;

            location.href = `delete.php?id=${id}`;
        }
    </script>
</body>

</html>