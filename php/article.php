<?php
session_start();
include('connect.php');
include('main.php');
if (isset($_POST["title"]) && isset($_POST["content"])) {
    $query = "SELECT * FROM posts WHERE title = '" . $_POST["title"] . "' and content = '" . $_POST["content"] . "'";
    $result = mysqli_query($link, $query);
    while ($row = mysqli_fetch_array($result)) {
        $data["username"] = $row["username"];
        $data["title"] = $row["title"];
        $data["content"] = $row["content"];
        $data["time"] = $row["time"];
    }

    echo json_encode($data);
}
