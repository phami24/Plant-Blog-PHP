<body>

    <?php
    include "/xampp/htdocs/e-project1/Config/head.php";
    include "/xampp/htdocs/e-project1/Config/conn.php";
    ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .card {
            background-color: #c9ffc8;
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .2s ease-in-out;
            transition: .2s ease-in-out;
        }

        .toc {
            background-color: #c9ffc8;
            margin-bottom: 10px;

        }

        .toc ul li {
            list-style-type: none;

        }

        .toc li a {
            color: #429757;
            text-decoration: none;

        }

        .toc li a:hover {
            color: #072f11;

        }

        img:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.4), 0 8px 30px 0 rgba(0, 0, 0, 0.3);
        }

        img {
            border-radius: 8px;
        }

        .left_1 div article {
            position: sticky;
            top: 15px;
        }

        .left_1 div {
            position: sticky;
            top: 20px;
        }

        .card:hover {
            -webkit-transform: scale(1.15);
            transform: scale(1.15);
        }

        h1 {
            color: #429757;
            font-size: 30px;
        }

        h1:hover {
            font-size: 35px;
            text-shadow: 0px 0 chocolate, 0 0.5px chocolate, 0.5px 0 chocolate, 0 -1px chocolate;
        }

        .h3 {
            color: #429757;
            text-shadow: -1px 0 green, 0 0.5px green, 0.5px 0 green, 0 -1px green;
            font-size: 20px;
        }

        div .inner-content {
            padding: 0;
        }

        h4 {
            color: #4b0808;
        }

        .index {
            margin: 15px auto auto 30px;
        }
        .cmt {
            background-color: whitesmoke;
            border: 2px solid whitesmoke;
            margin: 20px auto;
            box-shadow: 1px 1px 7px gray;
        }

        .userComment {
            background-color: white;
            border: 0px solid white;
            margin-left: 30px;
            height: 50px;
            box-shadow: 0.5px 0.3px 1px gray;
            border-radius: 7px;
        }
    </style>

    <div class="container-fluid">
        <?php
        $sql1 = "SELECT * FROM post WHERE post_category_id = 5";
        $result1 = mysqli_query($conn, $sql1);
        $post = mysqli_fetch_assoc($result1);
        ?>
        <div class="text-center p-3">
            <h1><?php echo $post['title'] ?></h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="inner-content">
                        <aside class="toc">
                            <h4 class="index">Index: </h4>
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
                    </div>
                    <!---------------- nội dung -------------------->
                    <div >
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
        <!-- Comment -->
        <div class="cmt bg-secondary-subtle">
            <div class="row mt-3 mx-3">
                <div class="col-md-12 ">
                    <textarea class="form-control" id="mainComment" placeholder="Comment..." cols="30" rows="2"></textarea>
                    <br>
                    <button style="float:right;" class="btn btn-success" id="addComment">Add Comment</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="userComments my-3 mx-2">
                        <b class=""><ion-icon name="person-circle-outline" style="font-size: 30px;"></ion-icon> Name</b>
                        <div class="userComment">this is my comment</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>

</body>