<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
$topic_id = isset($_POST['topic_id']) ? $_POST['topic_id'] : '';
$post_id = $_GET['id'];

if (isset($_POST['topic_name'])) {
    $topic_name = isset($_POST['topic_name']) ? $_POST['topic_name'] : '';
    $sql = "UPDATE topics
    SET topic_name = '$topic_name' 
    WHERE topic_id = $topic_id;";
    mysqli_query($conn, $sql);
}
if (isset($_POST['content'])) {
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $sql = "UPDATE topics
    SET content = '$content' 
    WHERE topic_id = $topic_id;";
    mysqli_query($conn, $sql);
}

if (isset($_FILES["topics_img"]["name"])) {
    $topic_img_id = isset($_POST['img_id']) ? $_POST['img_id'] : '';
    $target_dir = "../../Admin/img/";
    $target_file = $target_dir . basename($_FILES["topics_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["topics_img"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // The code below only allows users to upload JPG, JPEG, PNG, and GIF files. All other file types gives an error message before setting $uploadOk to 0:
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["topics_img"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["topics_img"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        $file_name = basename($_FILES["topics_img"]["name"]);
    }
    $sql = "UPDATE topics_img
    SET img_url = '$file_name' 
    WHERE topic_img_id = $topic_img_id;";
    mysqli_query($conn, $sql);
}


header("location:../../Admin/edit.php?id=$post_id");
exit();
