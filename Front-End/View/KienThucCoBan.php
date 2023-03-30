<?php
include "/xampp/htdocs/e-project1/Config/head.php";
include "/xampp/htdocs/e-project1/Config/conn.php";
?>

<div class="container ">
    <?php
    $sql1 = "SELECT * FROM post WHERE post_category_id = 5";
    $result1 = mysqli_query($conn, $sql1);
    $post = mysqli_fetch_assoc($result1);
    ?>
    <div class="text-center my-4">
        <h1 style="color: #61c203;"><?php echo $post['title'] ?></h1>
    </div>
</div>
<div class="">
    <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="inner-content">
            <aside class="toc">
                <ul class="toc-list">
                    <ul class="toc-list  is-collapsible">
                        <?php
                        $post_id = $post['post_id'];
                        $sql = "SELECT * FROM topics WHERE post_id = '$post_id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($topic = mysqli_fetch_assoc($result)) {
                                $text = $topic['content'];
                                if ($topic['topic_name'] != 'null') {
                        ?>
                                    <li>
                                        <a href="#<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name']; ?></a>
                                    </li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </ul>
            </aside>
            <!---------------- nội dung -------------------->


            <div class="row">
                <div class="col-8">
                    <?php
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($topic = mysqli_fetch_assoc($result)) {
                            $topicId = $topic['topic_id'];
                            $sql1 = "SELECT * FROM topics_img WHERE topic_id = '$topicId'";
                            $result1 = mysqli_query($conn, $sql1);
                            $topic_img = mysqli_fetch_assoc($result1);

                    ?>
                            <?php if ($topic['topic_name'] != 'null') { ?>
                                <h3 style="text-align: justify;">
                                    <strong>
                                        <span class="notranslate" id="<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name'] ?></span>
                                    </strong>
                                </h3>
                            <?php } ?>
                            <p style="text-align: justify;">
                                <?php echo nl2br($topic['content']) ?>
                            </p>
                            <?php if ($topic_img['img_url'] != 'null') { ?>
                                <p style="text-align: justify;">
                                    <span class="notranslate">
                                        <img src="../../Admin/img/<?php echo $topic_img['img_url']; ?>" />
                                    </span>
                                </p>
                            <?php } ?>
                            <p style="text-align: center;">
                                <span class="notranslate">
                                    Xem thêm: <a href="#" target="_blank">title</a>
                                </span>
                            </p>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <!---------------------------------------- kết thúc nội dung -------------------------------------->

            <!-- phần bên phải -->
            <div class="col-4" style="height: auto !important; min-height: 0px !important;">
                <aside class="sidebar shop-sidebar padd-left-20" style="height: auto !important;">
                    <div class="widget search-box" style="height: auto !important;">

                        <!-- thanh Search -->
                        <div class="input-right">
                            <p style="font-size:25px; color:#87c00c; font-weight:bold">Tìm kiếm thêm thông tin trên Yêu Trồng Cây</p>
                            <form id="frmSearch" method="post" action="">
                                <div class="input-group search-form" style="line-height: 60px;">
                                    <input class="form-control" id="txtSearch" style="margin-top: 18.5px;" name="keyword" value="" type="text" placeholder='Tìm kiếm...'>
                                    <span type="submit" onclick="getfocus()" class="input-group-text me-3" id="basic-addon1" style="margin-top: 18px; background-color: #61c203;">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </span>
                                </div>
                            </form>
                        </div>

                        <!-- bài viết -->
                        <?php
                        $postCategoryId = $post['post_category_id'];
                        $sql2 = "SELECT * FROM post WHERE post_img != 'null'  ORDER BY RAND()  LIMIT 3  ";
                        $result2 = mysqli_query($conn, $sql2);
                        if (mysqli_num_rows($result) > 0) {
                            while ($postlienquan = mysqli_fetch_assoc($result2)) {
                        ?>
                                <article class="card mb-2">
                                    <a href="CHiTietBaiViet.php?id=<?php echo $postlienquan['post_id']; ?>" class="card-link nav-link ">
                                        <div class=" row">
                                            <figure class=" col-sm-4">
                                                <img alt="" src="../../Admin/img/<?php echo $postlienquan['post_img']; ?>" class="w-1 mt-2 mx-2" style="border-radius: 5px; max-height:70px">
                                            </figure>
                                            <div class="col-sm-8">
                                                <p class="card-title"><?php echo $postlienquan['title']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </article>

                        <?php
                            }
                        }

                        ?>


                        <div class="overlay-box ">
                            <p style="font-size:30px">Sản phẩm liên quan</p>
                            <?php
                            $sql3 = "SELECT * FROM product ORDER BY RAND()  LIMIT 5  ";
                            $result3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($result3) > 0) {
                                while ($product = mysqli_fetch_assoc($result3)) {
                                    $productID = $product['product_id'];
                                    $sql4 = "SELECT * FROM product_img Where product_id = '$productID'";
                                    $result4 = mysqli_query($conn, $sql4);
                                    $product_img = mysqli_fetch_assoc($result4)
                            ?>
                                    <article class="card mb-2">
                                        <a href="#" class="card-link nav-link ">
                                            <div class=" row">
                                                <figure class=" col-sm-4">
                                                    <img alt="" src="../../Admin/img/<?php echo $product_img['product_img']; ?>" class="w-1 mt-2 mx-2" style="border-radius: 5px; max-height:70px">
                                                </figure>
                                                <div class="col-sm-8" style="min-height: 120;">
                                                    <p class="card-title"><?php echo $product['product_name']; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </article>

                            <?php
                                }
                            }

                            ?>


                            <!---- Bài viết mới--------------->
                            <p style="font-size:30px">Bài viết mới</p>
                            <!-- bài viết 1 -->
                            <article class="card mb-2">
                                <a href="#" class="card-link nav-link ">
                                    <div class=" row">
                                        <figure class=" col-sm-4">
                                            <img alt="" src="https://www.yeutrongcay.com/uploads/pages/la-bac-ha-va-rau-hung-lui_1640388750.jpg" class="w-1 mt-2 mx-2">
                                        </figure>
                                        <div class="col-sm-8">
                                            <div class="card-body">
                                                <p class="card-title">Title</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                            <!-- bài viết 2 -->
                            <article class="card mb-2">
                                <a href="#" class="card-link nav-link ">
                                    <div class=" row">
                                        <figure class=" col-sm-4">
                                            <img alt="" src="https://www.yeutrongcay.com/uploads/pages/la-bac-ha-va-rau-hung-lui_1640388750.jpg" class="w-1 mt-2 mx-2">
                                        </figure>
                                        <div class="col-sm-8">
                                            <div class="card-body">
                                                <p class="card-title">Title</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </div>
                    </div>
            </div>
            </aside>
        </div>
    </div>

    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>