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
    <div class="row  justify-content-center" style="margin-top:25%; ">
        <div class="col-sm-4 col-md-6">
            <img src="https://www.shutterstock.com/image-vector/man-inscription-admin-icon-outline-600w-1730974153.jpg" alt="">
        </div>
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