<?php
include('../php/connect.php');
header('Content-type: application/json; charset=utf-8');

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM `posts` WHERE `id` = '$id'";
    $data = mysqli_query($link, $sql);
    if ($data) {
        $res = true;
    } else {
        $res = false;
    }

    print_r(json_encode(($res)));
}
