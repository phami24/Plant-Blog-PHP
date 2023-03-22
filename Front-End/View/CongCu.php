

<?php include "/xampp/htdocs/e-project1/Config/head.php" ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Lib/css/bootstrap.min.css">
  <title>Design</title>
  <style>
    div.text {
      /* text-overflow: ellipsis; */
      -webkit-line-clamp: 6;
      /* -webkit-box-orient: vertical; */
      overflow: auto;
      /* display:none; */
      /* position: absolute; */
    }
    .bg_img {
      background-image: url("../img/Monstera-slide-1400x525.jpg");
      height: 50%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: sticky;
    }
  </style>

</head>
<body>
  <div>
    <div class="container mt-5 mb-5">
      <div class="container-fluid text-bg-dark mb-3 bg_img ">
        <div class="pt-5 pb-4">
          <p class=" font-monospace text-success h4 text-center ">Người trồng cây là những người biết yêu thương người khác.</p>
          <p class=" font-monospace text-success h4 text-center">Những chuyến đi về thiên nhiên là cách tái tạo năng lượng và giúp bạn khám phá những điều tuyệt vời trong tự nhiên.</p>
        </div>
      </div>
      <div class="text-center mb-3 row">
        <h3>Công cụ</h3>
      </div>
      <div class="row mb-2 ">
        <!-- hinh_1 -->
        <div class="col-sm-6 col-md-4 mb-3">
          <a href="" class="card-link nav-link">
            <div class="card col">
              <img src="../img/Monstera-slide-1400x525.jpg" alt="Design" class="card-img-top">
              <div class="card-body text ">
                <h5 class="card-title " style="min-height: 80px; max-height:80px">Title</h5>

              </div>
              <div class="card-footer">
                <small class="text-muted">...</small>
              </div>
            </div>
          </a>
        </div>
        <!-- hinh_2 -->
        <div class="col-sm-6 col-md-4 mb-3">
          <a href="" class="card-link nav-link">
            <div class="card col">
              <img src="../img/Monstera-slide-1400x525.jpg" alt="Design" class="card-img-top">
              <div class="card-body text">
                <h5 class="card-title " style="min-height: 80px; max-height:80px">Title</h5>

              </div>
              <div class="card-footer">
                <small class="text-muted">...</small>
              </div>
            </div>
          </a>
        </div>
        <!-- hinh_3 -->
        <div class="col-sm-6 col-md-4 mb-3">
          <a href="" class="card-link nav-link">
            <div class="card col">
              <img src="../img/Monstera-slide-1400x525.jpg" alt="Design" class="card-img-top">
              <div class="card-body text">
                <h5 class="card-title " style="min-height: 80px; max-height:80px">Title</h5>

              </div>
              <div class="card-footer">
                <small class="text-muted">...</small>
              </div>
            </div>
          </a>
        </div>
        <!-- hinh_4 -->
        <div class="col-sm-6 col-md-4 mb-3 "><a href="" class="card-link nav-link">
            <div class="card col">
              <img src="../img/Monstera-slide-1400x525.jpg" alt="Design" class="card-img-top">
              <div class="card-body text">
                <h5 class="card-title " style="min-height: 80px; max-height:80px">Title</h5>

              </div>
              <div class="card-footer">
                <small class="text-muted">...</small>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <div class="container  mt-5 mb-5">
      <h4 class="text-success">Thông tin liên quan:</h4>

      <!-- hinh_1 -->
      <div class="card mb-3">
        <a href="" class="card-link nav-link">
          <div class="row g-0">
            <div class="col-sm-4">
              <img src="../img/Monstera-slide-1400x525.jpg" class="w-100" alt="...">
            </div>
            <div class="col-sm-8">
              <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">Text...</p>
                <p class="card-text"><small class="text-muted">...</small></p>
              </div>
            </div>
          </div>
        </a>
      </div>

      <!-- hinh_2 -->
      <div class="card mb-3">
        <a href="" class="card-link nav-link">
          <div class="row g-0">
            <div class="col-sm-4">
              <img src="../img/Monstera-slide-1400x525.jpg" class="w-100" alt="...">
            </div>
            <div class="col-sm-8">
              <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p class="card-text">Text...</p>
                <p class="card-text"><small class="text-muted">...</small></p>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

  </div>
</body>

</html>



<?php include"/xampp/htdocs/e-project1/Config/footer.php" ?>