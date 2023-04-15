<?php

$conn = new mysqli('localhost', 'root', 'minhbinh8877', 'garden_world');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// chuan bi csdl
$sql = "INSERT INTO comments (name, email, message, post_id) VALUES (?, ?, ?, ?)";
// lay dl tu form
$name = isset($_POST['name']) ? $_POST['name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
$post_id  = isset($_POST['post_id']) ? $_POST['post_id'] : "";


if ($stmt = mysqli_prepare($conn, $sql)) {
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $comment, $post_id);

  // Set parameters
  $name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $comment = $_REQUEST['comment'];
  $post_id = $_REQUEST['post_id'];

  // Attempt to execute the prepared statement

  if (mysqli_stmt_execute($stmt)) {
    // Trả về comment mới vừa được lưu
    $comment = array(
      'name' => $name,
      'email' => $email,
      'comment' => $comment,
      'post_id' => $post_id
    );
    echo json_encode($comment);
  } else {
    echo "Lỗi khi lưu comment.";
  }



// Lấy dữ liệu từ form
// $name = isset($_POST['name']) ? $_POST['name'] :""; 
// $email = isset($_POST['email']) ? $_POST['email'] :"";
// $comment = isset($_POST['comment']) ? $_POST['comment'] :"";
// $post_id  = isset($_POST['post_id']) ? $_POST['post_id'] :"";

// Lưu comment vào cơ sở dữ liệu
// $sql = "INSERT INTO comments (name, email, message , post_id) VALUES ('$name', '$email', '$comment' ,'$post_id')";
// $result = $conn->query($sql);
 "Lỗi khi lưu comment.";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
