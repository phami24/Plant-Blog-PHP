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
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>

</head>


<body class="container">
    <div class="row  justify-content-center  w-100 m-auto" style="margin-top:50%; ">
        <div class="col-sm-8 col-md-6">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="login-tab">
                    <form action="#">
                        <div class="form-group">
                            <label for="login-username">Username :</label>
                            <input type="text" class="form-control" id="login-username" required>
                        </div>
                        <div class="form-group">
                            <label for="login-password">Pass :</label>
                            <input type="text" class="form-control" id="login-password" required>
                        </div>
                        <button class="btn btn-primary mt-2" type="submit">Login</button>
                    </form>
                </div>

            </div>
        </div>
    </div>


</body>

</html>

</body>

</html>