<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <style>
        <?php include '/xampp/htdocs/e-project1/Front-End/css/form.css' ?>
    </style>

</head>

<body>
    <div class="container">
        <div class="title-text">
            <div class="title" id="title">Login Form</div>
        </div>
        <div>
            <div class="slide-controls">
                <input type="radio" name="slide" id="login">
                <input type="radio" name="slide" id="signup">
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-container">
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


                <form action="" class="reg-form hidden" id="reg-form">
                    <div class="row mb-3">
                        <div class=" col">
                            <label for="firstname" class="form-label">First Name :</label>
                            <input type="text" class="form-control" id="firstname">
                        </div>
                        <div class=" col">
                            <label for="lastname" class="form-label">Last name :</label>
                            <input type="text" class="form-control" id="lastname">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Phone Number :</label>
                        <input type="text" class="form-control" id="phonenumber">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username :</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pass">
                    </div>
                    <div class="mb-3">
                        <label for="repass" class="form-label">Re-Password</label>
                        <input type="password" class="form-control" id="repass">
                    </div>

                    <button type="submit" class="btn  btn-block w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('signup').addEventListener('change', function() {
            document.getElementById('title').innerText = 'SingUp Form';
            document.getElementById('reg-form').classList.remove('hidden');
            document.getElementById('login-form').classList.add('hidden');
        });
        document.getElementById('login').addEventListener('change', function() {
            document.getElementById('title').innerText = 'Login Form';
            document.getElementById('login-form').classList.remove('hidden');
            document.getElementById('reg-form').classList.add('hidden');

        });
    </script>
</body>

</html>