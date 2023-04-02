<?php
include "/xampp/htdocs/e-project1/Config/head.php";
// include "/xampp/htdocs/e-project1/Config/Slide.php";
?>
<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM post WHERE post_category_id = 6 AND status =1;';
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM book WHERE post_category_id = 9 ORDER BY RAND() LIMIT 4";
$result1 = mysqli_query($conn, $sql1);
?>

<style>
    .index-intro .jumbotron {
        border-radius: 5px;
        height: 150px;
        font-family: 'Times New Roman', Times, serif;
        width: 100%;
    }

    .index-intro {
        background-image: url(../img/Banner1.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        max-width: 100%;

    }


    .h5 {
        padding-top: 70px;
        color: #585c58;
        font-size: 23px;
        padding: 50px auto 50px 50px;
    }

    .h5:hover {
        font-size: 25px;
        font-family: 'Courier New', Courier, monospace;
    }

    .ct {
        background-color: #f8f1ea;

    }
    h1{
        text-shadow: 1px 1px 2px black, 0 0 35px green, 0 0 15px darkseagreen;
        font-size:50px;
    }
</style>

<div class="container-fluid mt-2 mb-2 ct ">

    <article class="index-intro">
        <div>
            <div class="jumbotron">
                <p class="h5">Nature trips are a way to re-energize and help you discover the wonderful things in nature.</p>
            </div>
        </div>
    </article>

    <div class="container mt-4 mb-3">

        <div class="sec-title centered">
            <h1 class="text-success mb-4">Soil and fertilizer<h1>
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