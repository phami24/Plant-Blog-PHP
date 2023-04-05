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
    div .inner-content{
        padding: 0;
    }
    h4{
        color:#4b0808;       
    }
    .index{
        margin: 15px auto auto 30px;
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
                <div class="container">
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

                    <?php
                        }
                    }
                    ?>
                </div>
            </div>


            <!---------------------------------------- kết thúc nội dung -------------------------------------->

            <!-- phần bên phải -->
            <div class="col-4 left_1" style="height: auto !important; min-height: 0px !important;">
                <aside class="sidebar shop-sidebar padd-left-20" style="height: auto !important;z-index: 100;">
                    <div class="widget search-box" style="height: auto !important;">

                        <!-- thanh Search -->
                        <!-- <div class="input-right my-3" style="width:100%;">
                            <form id="frmSearch" method="post" action="">
                                <div class="input-group search-form" style="line-height: 60px;">
                                    <input class="form-control" id="txtSearch" style="margin-top: 18.5px;" name="keyword" value="" type="text" placeholder='Search...'>
                                    <span type="submit" onclick="getfocus()" class="input-group-text me-3" id="basic-addon1" style="margin-top: 18px; background-color: #61c203;">
                                        <ion-icon name="search-outline"></ion-icon>
                                    </span>
                                </div>
                            </form>
                        </div> -->

                        <!-- bài viết cùng danh mục -->

                        <p class="h3 text-success">Posts in the same category</p>
                        <!-- bài viết 1 -->
                        <article class="card mb-2">
                            <a href="#" class="card-link nav-link ">
                                <div class=" row">
                                    <figure class=" col-sm-4">
                                        <img alt="" src="../img/Monstera-soil-banner.jpg" class="w-1 mt-2 mx-2" style="border-radius: 5px;">
                                    </figure>
                                    <div class="col-sm-8">
                                        <div class="card-body">
                                            <p class="card-title">title</p>
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
                                        <img alt="" src="../img/Monstera-slide-1400x525.jpg" class="w-1 mt-2 mx-2" style="border-radius: 5px;">
                                    </figure>
                                    <div class="col-sm-8">
                                        <div class="card-body">
                                            <p class="card-title">title</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </article>
                    </div>
                </aside>
                <!-- Sản phẩm liên quan -->
                <div class="overlay-box ">
                    <p class="h3 text-success">Related products</p>
                    <figure class="image-box">
                        <a href="#">
                            <img alt="" src="https://www.yeutrongcay.com/uploads/pages/Bac-ha-socola-Chocolate mint-01_1627225885.jpg" width=60 height=NaN />
                        </a>
                    </figure>

                    <div class="lower-content">
                        <a href="#" class="nav-link mx-3 px-3">
                            <p>Title </p>
                            <span class="fa flaticon-play-button-3">Chi tiết</span>
                        </a>
                    </div>

                    <figure class="image-box">
                        <a href="">
                            <img alt="" src="https://vn-live-01.slatic.net/p/67a2d417ba92251645325208dde0cba5.jpg" width=60 height=NaN>
                        </a>
                    </figure>

                    <div class="lower-content">
                        <a href="#" class="nav-link mx-3 px-3">
                            <p class=" card-link">Title</p>
                            <span class="fa flaticon-play-button-3">Chi tiết</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>
  
</body>