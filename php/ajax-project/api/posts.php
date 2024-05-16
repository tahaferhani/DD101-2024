<?php
$method = $_SERVER["REQUEST_METHOD"];
$conn = new PDO("mysql:host=localhost;dbname=ajax-project", "root", "");

// Get all data
if ($method == "GET") {
    $id = @$_GET["id"];

    if ($id) {
        $query = $conn->prepare("SELECT id, title, content, category_id, date FROM posts WHERE id=?");
        $query->execute([$id]);
        $rows = $query->fetchObject();
    }
    else {
        $query = $conn->query("SELECT posts.id, title, content, category_id, name as category, date FROM posts, categories cat WHERE visible = 1 AND category_id = cat.id ORDER BY posts.id DESC");
        $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rows);
}
// Insert or Update data according to (id) value
else if ($method == "POST") {
    $id = @$_POST["id"];
    $title = @$_POST["title"];
    $content = @$_POST["content"];
    $category_id = @$_POST["category_id"];

    // Return error message if some values are empty
    if (!$title || !$content || !$category_id) {
        $data = [ "status" => false, "message" => "An error has occured!" ];
    }
    else {
        // Update operation
        if ($id) {
            $query = $conn->prepare("UPDATE posts SET title=?, content=?, category_id=? WHERE id=?");
            $query->execute([$title, $content, $category_id, $id]);
            $data = [ "status" => true, "message" => "Post updated successfully!" ];
        }
        // Insert operation
        else {
            $query = $conn->prepare("INSERT INTO posts (title, content, date, category_id) VALUES (?, ?, now(), ?)");
            $query->execute([$title, $content, $category_id]);
            $data = [ "status" => true, "message" => "Post inserted successfully!" ];
        }
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}
// Delete data by (id)
else if ($method == "DELETE") {
    $id = @$_REQUEST["id"];
    // Return error message if id is empty
    if (!$id) {
        $data = [ "status" => false, "message" => "An error has occured!" ];
    }
    else {
        $query = $conn->prepare("DELETE FROM posts WHERE id=?");
        $query->execute([$id]);
        $data = [ "status" => true, "message" => "Post deleted successfully!" ];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}