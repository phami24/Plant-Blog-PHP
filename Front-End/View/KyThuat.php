<?php
include "/xampp/htdocs/e-project1/Config/head.php";
?>
<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM post WHERE post_category_id = 2 AND status =1;';

$result = mysqli_query($conn, $sql);
?>


<div class="bg_img">
    <div class="container mt-5 mb-5">
        <div class="container-fluid text-bg-dark mb-5 bg_img ">
            <div class="pt-5 pb-4">
                <p class=" font-monospace text-success h4 text-end">Người trồng cây là những người biết yêu thương người khác.</p>
                <p class=" font-monospace text-success h4">Những chuyến đi về thiên nhiên là cách tái tạo năng lượng và giúp bạn khám phá những điều tuyệt vời trong tự nhiên.</p>
            </div>
        </div>

        <div class="row mb-2 ">
            <!-- Start PHP code -->
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($post = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="col-sm-6 col-md-4 mb-3" >
                        <a href="../../Front-End/View/ChiTietBaiViet.php?id=<?php echo $post['post_id'] ?>" class="card-link nav-link" >
                            <div class="card col">
                                <img style="min-height: 250px; max-height:250px" src="../../Admin/img/<?php echo $post['post_img']; ?>" alt="img" class="card-img-top">
                                <div class="card-body text">
                                    <h4 class="card-title " style="min-height: 100px; max-height:1000px"><?php echo $post['title'] ?></h4>
                                    <!-- <p class="card-text ">Bạn đang tìm hiểu về cách thiết kế vườn có sử dụng sỏi? Sỏi là</p> -->
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