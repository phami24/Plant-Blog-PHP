<?php


$conn = new mysqli('localhost', 'root', '12345678', 'garden_world');

// Lấy dữ liệu từ form
$name = isset($_POST['name']) ? $_POST['name'] :"";
$email = isset($_POST['email']) ? $_POST['email'] :"";
$comment = isset($_POST['comment']) ? $_POST['comment'] :"";
$post_id  = isset($_POST['post_id']) ? $_POST['post_id'] :"";

// Lưu comment vào cơ sở dữ liệu
$sql = "INSERT INTO comments (name, email, message , post_id) VALUES ('$name', '$email', '$comment' ,'$post_id')";
$result = $conn->query($sql);

if ($result) {
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
  
  // Đóng kết nối cơ sở dữ liệu
  $conn->close();
?>  