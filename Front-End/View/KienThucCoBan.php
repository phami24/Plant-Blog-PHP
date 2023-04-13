<body>

    <?php
    include "/xampp/htdocs/e-project1/Config/head.php";
    include "/xampp/htdocs/e-project1/Config/conn.php";
    ?>


    <div class="container-fluid">
        <?php
        $sql1 = "SELECT * FROM post WHERE post_category_id = 1";
        $result1 = mysqli_query($conn, $sql1);
        $post = mysqli_fetch_assoc($result1);
        ?>
        <div class="text-center p-3">
            <h2 class="h1"><?php echo $post['title'] ?></h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="inner-content">
                        <aside class="toc">
                            <!-- <h4 class="index">Index: </h4> -->
                            <hr>
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
                                                    <a style="font-size: 18px;"href="#<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name']; ?></a>
                                                </li>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </ul>
                            </ul>
                        </aside>
                    </div>
                    <!---------------- nội dung -------------------->
                    <div>
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
                                    <h4 style="text-align: justify;">
                                        <strong>
                                            <span class="notranslate" id="<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name'] ?></span>
                                        </strong>
                                    </h4>
                                <?php } ?>
                                <p style="text-align: justify;max-width:90%">
                                    <?php echo nl2br($topic['content']) ?>
                                </p>
                                <?php if ($topic_img['img_url'] != 'null') { ?>
                                    <p style="text-align: justify;">
                                        <span class="notranslate">
                                            <img src="../../Admin/img/<?php echo $topic_img['img_url']; ?>" />
                                        </span>
                                    </p>
                                <?php } ?>

                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>


                <!---------------------------------------- kết thúc nội dung -------------------------------------->

                <!-- phần bên phải -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 left_1" style="height: auto !important; min-height: 0px !important;">
                    <aside class="sidebar shop-sidebar padd-left-20" style="height: auto !important;z-index: 100;">
                        <div class="widget search-box" style="height: auto !important;">

                            <!-- bài viết cùng danh mục -->

                            <div class="mt-2">
                                <p class="h3 text-success">Posts in the same category</p>
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
                                                        <img alt="" src="../../Admin/img/<?php echo $postlienquan['post_img']; ?>" class="w-1 mt-2 mx-2" style=" max-height:70px;">
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
                            </div>
                        </div>
                    </aside>
                    <!-- Sản phẩm liên quan -->
                    <div class="overlay-box">
                        <p class="h3 text-success">Related products</p>
                        <?php
                        $sql3 = "SELECT * FROM product ORDER BY RAND()  LIMIT 4 ";
                        $result3 = mysqli_query($conn, $sql3);
                        if (mysqli_num_rows($result3) > 0) {
                            while ($product = mysqli_fetch_assoc($result3)) {
                                $productID = $product['product_id'];
                                $sql4 = "SELECT * FROM product_img Where product_id = '$productID'";
                                $result4 = mysqli_query($conn, $sql4);
                                $product_img = mysqli_fetch_assoc($result4)
                        ?>
                                <article class="card mb-2">
                                    <a href="ProductDetail.php?product_id=<?php echo $product['product_id'] ?>" class="card-link nav-link ">
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

                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- video -->
            <video width="665" height="400" controls autoplay loop style="padding-top: 20px">
                <source src="../../Nội Dung/Trường/video/using_tools.mp4" type="video/mp4">
            </video>
        </div>
        <!-- to top of content -->
        <a href="#" class="totop">
            <ion-icon name="arrow-up-outline" style="font-size:30px; color: #0ece0e"></ion-icon>
        </a>
        <!-- Comment -->
        <div class="cmt">
            <h3 style="color: #4b0808;margin:20px;">Comments:</h3>
            <div id="comment-section">
                <!-- Hiển thị các comment đã tồn tại -->
                <?php
                $sql = "SELECT * FROM comments  Where post_id = '$post_id' ORDER BY created_at ASC";
                $result = mysqli_query($conn, $sql);

                // Hiển thị các comment
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="userComment">';
                    echo '<ion-icon name="person-circle-outline" style="font-size: 30px; color:green;"></ion-icon>';
                    echo '<strong>' . $row['name'] . ' (' . $row['email'] . ') ' . '</strong>' . '<i style="float:right; font-size:13px;">' . $row['created_at'] . '</i>' . '<br>';
                    echo '<p class="mx-5">' . $row['message'] . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
            <h4 style="color: #4b0808;margin:20px;">Add Comment</h4>
            <form method="post" id="comment-form" action="#">
                <div class="form_container">
                    <label class="form_label">Name: </label>
                    <input class="form_input" type="text" name="name" required>
                </div>
                <div class="form_container">
                    <label class="form_label">Email: </label>
                    <input class="form_input" type="email" name="email" required>
                </div>
                <div class="form_container">
                    <label>Comment:</label>
                    <textarea name="comment" required class="form-control" placeholder="Comment..."></textarea>
                </div>

                <input name="post_id" type="number" placeholder="<?php echo $post_id ?>" value="<?php echo $post_id ?>" style="display:none;">
                <button type="submit" style="float:right" class="btn btn-success">Submit Comment</button>
            </form>
        </div>

        <script src="../../Front-End/js/comment.js"></script>
    </div>

    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>

</body>