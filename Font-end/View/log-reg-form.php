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
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6">
                <ul class="nav nav-tabs mb-4">
                    <li class="nav-item"><a href="#login-tab" class="nav-link" data-toggle="tab" id="login-form">Login</a></li>
                    <li class="nav-item"><a href="#reg-tab" class="nav-link" data-toggle="tab" id="reg-form">Reg</a></li>
                </ul>
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
                    <div class="tab-pane fade" id="reg-tab">
                        <form action="#">
                            <div class="form-group">
                                <label for="Reg-username">Username :</label>
                                <input type="text" class="form-control" id="Reg-username" required>
                            </div>
                            <div class="form-group">
                                <label for="Reg-password">Pass :</label>
                                <input type="text" class="form-control" id="Reg-password" required>
                            </div>
                            <button class="btn btn-primary mt-2" type="submit">Reg</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
            document.getElementById("reg-form").addEventListener("click",function(){
                document.getElementById("login-tab").classList.remove('show','active');
                document.getElementById("reg-tab").classList.add('show','active');
            });
            document.getElementById("login-form").addEventListener("click",function(){
                document.getElementById("reg-tab").classList.remove('show','active');
                document.getElementById("login-tab").classList.add('show','active');
            }) 
    </script>;
</body>

</html>
