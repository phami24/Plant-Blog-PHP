<?php
include "/xampp/htdocs/e-project1/Config/conn.php";

$id = $_GET['id'];
echo $id . "</br>";

$sql = "SELECT status from post where post_id = $id";
$result = mysqli_query($conn, $sql);
$post_status = mysqli_fetch_array($result);

if ($post_status['status'] == 1) 
{
    $sql1 = "UPDATE post
    SET status = 0
    WHERE post_id= '$id';";
    mysqli_query($conn, $sql1);
}

if ($post_status['status'] == 0)
{
    $sql1 = "UPDATE post
    SET status = 1
    WHERE post_id= '$id';";
    mysqli_query($conn, $sql1);
}

if (mysqli_query($conn, $sql1)) {
    header("location:../../Admin/AdminHome.php");
    exit();
}
