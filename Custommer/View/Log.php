<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="/Lib/css/login.css"> -->
    <script src="https://kit.fontawesome.com/34b2fba0fe.js" crossorigin="anonymous"></script>
    <title>Log In</title>

</head>

<body style="background-color: rgb(128, 171, 147);">
    <div class="container">
        <div class="row justify-content-around">

            <form action="" style=" border: 1px solid green;
    border-radius: 20px;
    margin:100px;
  background-color: azure;position: static;" class="was-validated col-md-6 p-3 my-6 ">
                <div class="text-center">
                    <h1>Log In</h1>
                </div>

                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="User name" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div class="mb-3 mt-3">
                    <input type="password" class="form-control" placeholder="Password" required>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <div>
                    <button type="button" class="btn btn-success form-control"><i class="fa-solid fa-right-to-bracket"></i> Log In</button>
                </div>
                <div>
                    <a href="" class="d-flex justify-content-start ">Forget password?</a>
                    <a href="" class="d-flex justify-content-end">Register</a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>