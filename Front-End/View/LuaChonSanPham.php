<?php
include "/xampp/htdocs/e-project1/Config/head.php";
?>
<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM post WHERE post_category_id = 3 AND status =1;';
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM book WHERE post_category_id = 9 ORDER BY RAND() LIMIT 4";
$result1 = mysqli_query($conn, $sql1);
?>
<style>
    .ct {
        background-color: #f8f1ea;

    }
    h1{
        text-shadow: 1px 1px 2px black, 0 0 35px green, 0 0 15px darkseagreen;
        font-size:50px;
    }
</style>
<div class="ct">
    <!---------- Slide ------------------------->
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner" style="font-size: 2vw">
            <div class="carousel-item active" style="position: relative; font-weight: bold">
                <img src="../img/Banner1.jpg" class="d-block w-100" alt="Banner" />
                <div style="color: #115b15">
                    <p class="banner">
                        Waking up in a place far away, surrounded by only trees and birds
                        Feel the spirit of refreshment, extremely comfortable.
                    </p>
                </div>
            </div>
            <div class="carousel-item" style="position: relative; font-weight: bold">
                <img src="../img/Banner2.jpg" class="d-block w-100 img-fluid" alt="Banner" />
                <div style="color: #f8fbf8">
                    <p class="banner">
                        I love nature this scenery where only nature can help
                        people become relaxed and forget all worries and troubles.
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

    <!-------------------------------->

    <div class="container mt-4 mb-3">
        <!-- <div class="container-fluid text-bg-dark mb-5 bg_img ">
            <div class="pt-5 pb-4">
                <p class=" font-monospace text-success h4 text-end">Người trồng cây là những người biết yêu thương người khác.</p>
                <p class=" font-monospace text-success h4">Những chuyến đi về thiên nhiên là cách tái tạo năng lượng và giúp bạn khám phá những điều tuyệt vời trong tự nhiên.</p>
            </div>
        </div> -->
        <div class="sec-title centered">
            <h1 class="text-success mb-4">Garden design<h1>
        </div>
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
    <!-- Sách liên quan: -->
    <div class="container mt-3 mb-5">
        <h3 class="text-success mb-5">You can read the books below to be more sure about gardening!</h3>


        <div class="row px-5 mx-3">
            <?php
            if (mysqli_num_rows($result1) > 0) {
                while ($book = mysqli_fetch_assoc($result1)) {

            ?>
                    <article class="card mb-3" style="max-height:200px">
                        <a href="../../Front-End/View/Book.php?id=<?php echo $book['book_id'] ?>" class="card-link nav-link">
                            <div class="row g-0">
                                <div class="col-md-4 mb-3">
                                    <img class="mt-3 px-2" style="max-width: 150px; max-height:150px" src="../../Admin/img/<?php echo $book['book_img']; ?>" alt="img" >
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <h4 class="" style="max-height:100px"><?php echo $book['book_name'] ?></h4>
                                        <small class=""><?php echo $book['book_content'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>

<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>