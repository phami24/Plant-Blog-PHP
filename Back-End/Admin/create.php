<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
//Create post
if (isset($_POST['title']) && isset($_POST['post_category_id']) && isset($_FILES["post_img"])) {
    echo 'Done';
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $post_category_id = isset($_POST['post_category_id']) ? $_POST['post_category_id'] : '';

    if (isset($_FILES["post_img"]["name"])) {
        $target_dir = "../../Admin/img/";
        $target_file = $target_dir . basename($_FILES["post_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["post_img"]["tmp_name"]);
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
            if (move_uploaded_file($_FILES["post_img"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["post_img"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $file_name = basename($_FILES["post_img"]["name"]);
        }
        $sql = "INSERT INTO post(title,post_category_id,post_img,status) VALUES('$title',$post_category_id,'$file_name',0)";
        mysqli_query($conn, $sql);

        header("location:../../Admin/AdminHome.php");
        exit();
    }
}

// Create topics

if (isset($_POST['topic_name']) && isset($_POST['content'])) {
    $topic_name = isset($_POST['topic_name']) ? $_POST['topic_name'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
    $post_id = $_GET['id'];
    echo $topic_name . "</br>";
    echo $content . "</br>";
    echo $post_id . "</br>";
    $sql = "INSERT INTO topics(topic_name, content, post_id)VALUES('$topic_name','$content',$post_id)";
    mysqli_query($conn, $sql);
    header("location:../../Admin/edit.php?id=$post_id");
    exit();
}

//Add topic img
if (isset($_FILES["topics_img"]["name"])) {
    $post_id = $_GET['id'];
    $topic_id = isset($_GET['topic_id']) ? $_GET['topic_id'] : '';
    echo $topic_id . '</br>';
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
    echo $file_name;
    echo $topic_id;
    $sql = "INSERT INTO topics_img(img_url, topic_id) VALUES('$file_name',$topic_id)";
    mysqli_query($conn, $sql);

    header("location:../../Admin/edit.php?id=$post_id");
    exit();
}
