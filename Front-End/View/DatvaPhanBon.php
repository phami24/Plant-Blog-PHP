<?php
include "/xampp/htdocs/e-project1/Config/head.php";
?>
<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM post WHERE post_category_id = 6 AND status =1;';

$result = mysqli_query($conn, $sql);
?>
<!-- <<<<<<< HEAD
<style>
    .index-intro .jumbotron{
    border-radius: 5px;
    height: 150px;
    font-family:'Times New Roman', Times, serif;
    width: 100%;
  }
  .index-intro {
    background-image: url(../img/Banner1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    max-width: 100%;

  }
  .tt:hover{
    
    border-radius: 30px;
    color:chocolate;
  }
  .h5{
    padding-top: 70px;
    color:#585c58;
    font-size: 23px;
    padding: 50px auto 50px 50px;
  }
  .h5:hover{
    font-size: 25px;
    font-family:'Courier New', Courier, monospace;
  }
</style>
======= -->
<!---------- Slide ------------------------->
<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner" style="font-size: 2vw">
        <div class="carousel-item active" style="position: relative; font-weight: bold">
            <img src="https://monstera.vn/wp-content/uploads/2022/09/Monstera-slide-1400x525.jpg" class="d-block w-100" alt="Banner" />
            <div style="color: #115b15">
                <p class="banner">
                    Tỉnh dậy ở một nơi thật xa, xung quanh chỉ có cây cỏ và chim
                    muông, cảm thấy tinh thần sảng khoái, dễ chịu vô cùng.
                </p>
            </div>
        </div>
        <div class="carousel-item" style="position: relative; font-weight: bold">
            <img src="https://monstera.vn/wp-content/uploads/2021/12/Monstera-soil-banner.jpg" class="d-block w-100 img-fluid" alt="Banner" />
            <div style="color: #f8fbf8">
                <p class="banner">
                    Tôi yêu thiên nhiên cảnh sắc này nơi chỉ có thiên nhiên mới giúp
                    con người trở nên thư thái và quên mọi ưu tư, muộn phiền.
                </p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- >>>>>>> 37a401b364b3ec99485106ed9e12652f8eef6e24 -->

<!-------------------------------->

<!-- <<<<<<< HEAD
<div class="container-fluid mt-2 mb-2 ">

    <article class="index-intro">
        <div class="tt">
            <div class="jumbotron">
                <p class="h5">Nature trips are a way to re-energize and help you discover the wonderful things in nature.</p>
======= -->
<div class="bg_img">
    <div class="container mt-5 mb-5">
        <!-- <div class="container-fluid text-bg-dark mb-5 bg_img ">
            <div class="pt-5 pb-4">
                <p class=" font-monospace text-success h4 text-end">Người trồng cây là những người biết yêu thương người khác.</p>
                <p class=" font-monospace text-success h4">Những chuyến đi về thiên nhiên là cách tái tạo năng lượng và giúp bạn khám phá những điều tuyệt vời trong tự nhiên.</p>
>>>>>>> 37a401b364b3ec99485106ed9e12652f8eef6e24
            </div>
        </div> -->
        <div class="sec-title centered">
            <h1>Tool<h1>
            <h2>
                <a>
                    <span>Soil and fertilizer</span>
                </a>
            <h2>
        </div>
<!-- <<<<<<< HEAD
    </article>
    <div class="container mt-3 mb-3">
======= -->
<!-- >>>>>>> 37a401b364b3ec99485106ed9e12652f8eef6e24 -->
        <div class="row mb-2 ">
            <!-- Start PHP code -->
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($post = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <a href="../../Front-End/View/ChiTietBaiViet.php?id=<?php echo $post['post_id'] ?>" class="card-link nav-link">
                            <div class="card col">
                                <img style="min-height: 250px; max-height:250px" src="../../Admin/img/<?php echo $post['post_img']; ?>" alt="img" class="card-img-top">
                                <div class="card-body text">
                                    <h4 class="card-title " style="min-height: 100px; max-height:100px"><?php echo $post['title'] ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            }
            ?>
            <!-- End PHP code -->
        </div>
    </div>

</div>


<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>