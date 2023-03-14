<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Garden World</title>
    <!-- Title Logo -->
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico" />
    <!-- Css -->
    <link rel="stylesheet" href="style.css" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Icon -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .banner {
            position: absolute;
            animation: banner-text 3s;
            animation-iteration-count: 1;
            animation-fill-mode: forwards;
        }

        @keyframes banner-text {
            0% {
                left: 10%;
                bottom: 25%;
                opacity: 0;
                width: 25%;
            }

            100% {
                left: 20%;
                bottom: 25%;
                opacity: 1;
                width: 25%;
            }
        }

        .nav-link:hover {
            color: rgb(155, 195, 82);
        }

        #navbar {
            display: flex;
            justify-content: space-between;
        }

        input[type="text"] {
            width: 100px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 5px 16px 5px 16px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type="text"]:focus {
            width: 300px;
        }
    </style>
</head>

<body class="bg-light-subtle">
    <!-- Navbar -->
    <h1>Second Commit</h1>
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
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">
                            Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Trang 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#">Trang 2</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action 1</a></li>
                            <li><a class="dropdown-item" href="#">Action 2</a></li>
                            <li><a class="dropdown-item" href="#">Action 3</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="nav navbar-nav">
                    <form class="nav-item input-group">
                        <input type="text" aria-describedby="basic-addon1" name="search" placeholder="Search">
                        <span class="input-group-text me-2" id="basic-addon1"><ion-icon name="search-outline"></ion-icon></span>
                    </form>
                </div>
                <div class="nav navbar-nav me-auto ms-1">
                    <div>
                        <ion-icon class="nav-item ms-2 mt-2" name="call-outline" style="font-size: 25px"></ion-icon>
                        <ion-icon class="nav-item ms-2 mt-2" name="mail-outline" style="font-size: 25px"></ion-icon>
                        <ion-icon class="nav-item ms-2 mt-2" name="cart-outline" style="font-size: 25px"></ion-icon>
                    </div>
                </div>

            </div>
        </div>
    </nav>