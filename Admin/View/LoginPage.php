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
    <style>
        .container {
            margin-top: 10%;
            overflow: hidden;
            max-width: 390px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
        }

        .title-text {
            display: flex;
            width: 200%;
        }

        .title {
            width: 50%;
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        }

        .btn {
            background-color: #09b726;
        }
    </style>
</head>


<body>
    <div class="container">
        <div class="title-text mb-3">
            <div class="title" id="title">Login Form</div>
        </div>
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

    </div>

</body>

</html>