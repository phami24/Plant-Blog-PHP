<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garden World</title>
    <!-- Title Logo -->
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <style>
        <?php include '/xampp/htdocs/e-project1/Config/css/style.css' ?>
    </style>

</head>

<body class="bg-light-subtle">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top d-flex" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand  me-lg-5" href="test.html" style="color: rgb(155, 195, 82)">
                <span class="ms-lg-5" style="font-weight:bold;">
                    <ion-icon name="leaf-outline" class="ms-lg-5"></ion-icon>𝔾𝕒𝕣𝕕𝕖𝕟𝕎𝕠𝕣𝕝𝕕
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0 flex-wrap ms-auto me-auto ">
                    <li class="nav-item ms-4">
                        <a class="nav-link active" aria-current="page" href="">
                            Trang chủ</a>
                    </li>
                    <li class="nav-item ms-4 dropdown">
                        <a class="nav-link active " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kiến thức
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Kiến thức cơ bản</a></li>
                            <li><a class="dropdown-item" href="#">Mẹo và tips</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-4 dropdown">
                        <a class="nav-link active " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Thiết kế
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Lựa chọn sản phẩm</a></li>
                            <li><a class="dropdown-item" href="#">Lựa chọn phụ kiện</a></li>
                        </ul>
                    </li>
                    <li class="nav-item ms-4 dropdown">
                        <a class="nav-link active " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dụng cụ
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Thiết bị</a></li>
                            <li><a class="dropdown-item" href="#">Đất và phân bón</a></li>
                            <li><a class="dropdown-item" href="#">Thuốc trừ sâu</a></li>
                            <li><a class="dropdown-item" href="#">Hạt giống</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="nav navbar-nav  me-auto">
                    <form class="nav-item input-group">
                        <input type="text" aria-describedby="basic-addon1" name="search" id="search" class="search" placeholder="Search">
                        <span type="submit  " onclick="getfocus()" class="input-group-text me-2" id="basic-addon1"><ion-icon name="search-outline"></ion-icon></span>
                    </form>
                </div>
                <!-- <div class="nav navbar-nav me-auto ms-1">
                    <div class="nav-item ms-2 mt-2 dropdown">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <ion-icon name="people-outline" style="font-size: 30px"></ion-icon>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="#">Signup</a></li>
                        </ul>
                    </div>
                </div>
            </div> -->
            </div>
    </nav>

    <script>
        function getfocus() {
            document.getElementById("search").focus();
        }
    </script>