<?php
$method = $_SERVER["REQUEST_METHOD"];
$conn = new PDO("mysql:host=localhost;dbname=ajax-project", "root", "");

if ($method == "GET") {
    $query = $conn->query("SELECT * FROM posts WHERE visible = 1 ORDER BY id DESC");
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($rows);
}
else if ($method == "POST") {
    $title = @$_POST["title"];
    $content = @$_POST["content"];
    $category_id = @$_POST["category_id"];

    if (!$title || !$content || !$category_id) {
        $data = [ "status" => false, "message" => "An error has occured!" ];
    }
    else {
        $query = $conn->prepare("INSERT INTO posts (title, content, date, category_id) VALUES (?, ?, now(), ?)");
        $query->execute([$title, $content, $category_id]);
        $data = [ "status" => true, "message" => "Post inserted successfully!" ];
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
}