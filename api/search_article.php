<?php
include('../php/connect.php');
header('Content-type: application/json; charset=utf-8');

$search = $_POST["search"];

$sql = "SELECT * FROM `posts` WHERE `title` LIKE '%$search%'";
// $sql = "SELECT * FROM `posts` WHERE `title` REGEXP " . "'." . $search . ".'";
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
