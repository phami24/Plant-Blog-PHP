<?php
session_start();
include "/xampp/htdocs/e-project1/Config/conn.php";


if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header('Location: ../../Admin/login_admin.php?error=User Name is required');
        exit();
    } else if (empty($pass)) {
        header('Location: ../../Admin/login_admin.php?error=Password is required');
        exit();
    } else {
        $sql = " SELECT * FROM admin WHERE username = '$uname' AND password='$pass' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row["username"] === $uname && $row["password"] === $pass) {
                    $_SESSION['id'] = $row['admin_id'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['password'] = $row['password'];
                    header("location:../../Admin/AdminHome.php");
                    exit();

                } else {
                    header('Location: ../../Admin/login_admin.php?error=Incorect Username or Password');
                    exit();
                }
            }
        } else {
            header('Location: ../../Admin/login_admin.php?error=Incorect Username or Password');
            exit();
        }
    }
} else {
    header('Location: ../../Admin/login_admin.php?error');
    exit();
}
