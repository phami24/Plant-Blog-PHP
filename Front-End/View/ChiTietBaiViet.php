<body>


    <?php
    include "/xampp/htdocs/e-project1/Config/head.php";
    include "/xampp/htdocs/e-project1/Config/conn.php";
    $post_id = $_GET['id'];
    ?>


    <style>
        .input-right {
            animation-name: example;
            animation-duration: 1s;
            animation-iteration-count: infinite;
        }

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
            color: green;
            font-size: 35px;
            text-shadow:1px 1px 3px #429757;
        }


        .h3 {
            color: #429757;
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

        .comment-container {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .comment-container {
            border: 1px solid #ccc;
            padding: 10px;
            width: 400px;
            margin: 0 auto;
        }

        .comment-label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .comment-input,
        textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .comment-add-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>

    <div class="container-fluid">
        <?php
        $sql1 = "SELECT * FROM post WHERE post_id = '$post_id'";
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
                                    <h4 style="text-align: left;text-decoration:double;">
                                        <strong>
                                            <span class="notranslate" id="<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name'] ?></span>
                                        </strong>
                                    </h4>
                                <?php } ?>

                                <?php if ($topic['content'] != 'null') { ?>
                                    <p style="text-align: justify;max-width:90%">

                                        <?php echo nl2br($topic['content']) ?>
                                        </span>
                                    <?php } ?>
                                    <?php if ($topic_img['img_url'] != 'null') { ?>
                                    <p style="text-align: left;" class="hover">
                                        <span class="notranslate">
                                            <img src="../../Admin/img/<?php echo $topic_img['img_url']; ?>" />
                                        </span>
                                    </p>
                                <?php
                                    }
                                ?>
                            <?php } ?>

                        <?php
                        }

                        ?>
                    </div>
                </div>
                <!---------------------------------------- kết thúc nội dung -------------------------------------->

                <!-- phần bên phải -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 left_1" style="height: auto !important; min-height: 0px !important;">
                    <aside class="sidebar shop-sidebar padd-left-20" style="height: auto !important;">
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

            <h2>Comments</h2>
            <div id="comment-section">
                <!-- Hiển thị các comment đã tồn tại -->
                <?php
                $sql = "SELECT * FROM comments  Where post_id = '$post_id' ORDER BY created_at ASC";
                $result = mysqli_query($conn, $sql);

                // Hiển thị các comment
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="comment">';
                    echo '<strong>' . $row['name'] . ' (' . $row['email'] . ') ' . $row['created_at'] . '</strong><br>';
                    echo $row['message'];
                    echo '</div>';
                }
                ?>
            </div>
            <h2>Add Comment</h2>
            <form method="post" id="comment-form" action="#">
                <label>Name:</label>
                <input type="text" name="name" required>
                <br>
                <label>Email:</label>
                <input type="email" name="email" required>
                <br>
                <label>Comment:</label>
                <textarea name="comment" required></textarea>
                <br>
                <label for="id">Post ID</label>
                <input name="post_id" type="number" placeholder="<?php echo $post_id?>" value="<?php echo $post_id?>">
                <button type="submit">Submit Comment</button>
            </form>
            <script src="../../Front-End/js/comment.js"></script>
        </div>
    </div>
    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>