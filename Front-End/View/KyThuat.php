
<?php
include "/xampp/htdocs/e-project1/Config/head.php";
?>
<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM post WHERE post_category_id = 1  AND status =1;';

$result = mysqli_query($conn, $sql);
?>


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
            background-image: url("../img/20977137-green-leaf-isolated-background.webp");
            height: 50%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: sticky;
        }
    </style>
</head>

<body>
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
                        <div class="col-sm-6 col-md-4 mb-3">
                            <a href="" class="card-link nav-link">
                                <div class="card col">
                                    <img style="min-height: 200px; max-height:200px" src="../../Admin/img/KnowledgeAndTips/<?php echo $post['post_img'] ?>" alt="Design" class="card-img-top">
                                    <div class="card-body text">
                                        <h4 class="card-title " style="min-height: 80px; max-height:80px"><?php echo $post['title'] ?></h4>
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
</body>

</html>



<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>
