<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        <?php include 'C:/xampp/htdocs/e-project1/Lib/js/bootstrap.min.js'; ?>
    </script>
    <style>
        <?php
        include "C:/xampp/htdocs/e-project1/Lib/css/bootstrap.min.css";
        ?>
    </style>

</head>


<body class="container">
    <form action="" class="login-form" id="login-form">
        <div class="mb-3">
            <label for="username" class="form-label">Username :</label>
            <input type="email" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
        </div>
        <button type="submit" class="btn  btn-block w-100">Login</button>
    </form>


</body>

</html>

