<?php
include "/xampp/htdocs/e-project1/Config/conn.php";

$post_id = isset($_GET['id']) ? $_GET['id'] : '';
$topic_id = isset($_GET['topic_id']) ? $_GET['topic_id'] : '';
$topic_img_id = isset($_GET['topic_img_id']) ? $_GET['topic_img_id'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';

echo $topic_img_id;

if (isset($_GET['page'])) {
    $sql1 = "UPDATE post
    SET status = 3
    WHERE post_id= '$post_id';";
    if (mysqli_query($conn, $sql1)) {
        // header("location:../../Admin/AdminHome.php?page=$page");
        exit();
    }
} else if (empty($_GET['topic_img_id'])) {
    $sql2 = "UPDATE topics
    SET status = 0
    WHERE topic_id= '$topic_id';";

    if (mysqli_query($conn, $sql2)) {
        header("location:../../Admin/edit.php?id=$post_id");
        echo 'Done';
        exit();
    }
} else {

    $sql3 = "UPDATE topics_img
    SET status = 0
    WHERE topic_img_id= '$topic_img_id';";
    if (mysqli_query($conn, $sql3)) {
        header("location:../../Admin/edit.php?id=$post_id");
        echo 'Done';
        exit();
    }
}
