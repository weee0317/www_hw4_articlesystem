<?php
include('../php/connect.php');
header('Content-type: application/json; charset=utf-8');

$author = $_REQUEST["author"];
$sql = "";

if (isset($author)) {
    $sql = "SELECT * FROM `posts` where `author`= '$author'";
} else {
    $sql = "SELECT * FROM `posts`";
}

$data = mysqli_query($link, $sql);
$row = mysqli_num_rows($data);
$res = [];
if ($row > 0) {
    while ($articles = mysqli_fetch_assoc($data)) {
        $array[] = $articles;
    }
    $res = [$array, $row];
} else {
    $res = [[], $row];
}
print_r(json_encode($res));
