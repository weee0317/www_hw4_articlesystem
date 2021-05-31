<?php
include('../php/connect.php');
header('Content-type: application/json; charset=utf-8');

if (!empty($_POST['id']) && !empty($_POST['new_title'] && !empty($_POST['new_content']))) {
    $new_title = $_POST['new_title'];
    $new_content = $_POST['new_content'];
    $id = $_POST['id'];
    $sql = "UPDATE `posts` SET `title` = '$new_title' , `content` = '$new_content'  WHERE `id` = '$id'";
    $data = mysqli_query($link, $sql);
    if ($data) {
        $res = true;
    } else {
        $res = false;
    }

    print_r(json_encode(($res)));
}
