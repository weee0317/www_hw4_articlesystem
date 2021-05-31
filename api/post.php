<?php

session_start();
include('../php/connect.php');

header('Content-type: application/json; charset=utf-8');
// print_r(json_encode($_POST));

if (!empty($_POST['title']) && !empty($_POST['content'])) {
    $author = $_POST['author'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "insert into posts (author,title,content) values ('$author' , '$title' ,'$content')";
    $result = mysqli_query($link, $sql);
    $last_id = mysqli_insert_id($link);
    if ($result) {
        $res['status'] = 1;
        $res['msg'] = 'success';
        $res['id'] = $last_id;
    } else {
        $res['status'] = 0;
        $res['msg'] = $link;
        $res['sql'] = $sql;
        $res['result'] = $result;
    }
    print_r(json_encode($res));
}
