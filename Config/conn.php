<?php 

$password = '12345678';

// Thực hiện kết nối
$conn = mysqli_connect('localhost', 'root', $password,'garden_world');
 
// Kiểm tra kết nối thành công hay thất bại
// nếu thất bại thì thông báo lỗi
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
 
?>