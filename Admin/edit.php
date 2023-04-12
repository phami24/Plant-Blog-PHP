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
            text-shadow: 1px 1px 3px #429757;
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

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
        }

        th,
        td {
            text-align: center;
            padding: 5px;
        }
    </style>

    <div class="container-fluid">
        <?php
        $sql1 = "SELECT * FROM post WHERE post_id = '$post_id' ";
        $result1 = mysqli_query($conn, $sql1);
        $post = mysqli_fetch_assoc($result1);
        ?>
        <div class="text-center p-3">
            <h1>
                <?php echo $post['title']; ?>
            </h1>

        </div>
        <div class="container">
            <div class="row">
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="inner-content">
                        <?php
                        $sql = "SELECT * FROM topics WHERE post_id = '$post_id'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($topic = mysqli_fetch_assoc($result)) {
                                if ($topic['topic_name'] != 'null') {
                        ?>
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
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <!---------------- nội dung -------------------->

                    <div class="container">
                        <?php
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($topic = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class='modal fade' id='editTopics<?php echo $topic['topic_id'] ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit topic</h1>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <form action="../Back-End/Admin/update.php?id=<?php echo $post['post_id'] ?>" method="post" enctype="multipart/form-data">
                                                    <table>
                                                        <tr>
                                                            <td><label for="">Topic Name</label></td>
                                                            <td><input type="text" style="width:300px ; float:left;" name="topic_name"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><label for="">Topic Content</label></td>
                                                            <td><textarea name="content" id="" cols="30" rows="10"></textarea></td>
                                                        </tr>
                                                    </table>
                                                    <input style="display:none;" type="number" name="topic_id" id="topic_id" value="<?php echo $topic['topic_id'] ?>">
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancel</button>
                                                        <button type='submit' class='btn btn-primary'>Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($topic['topic_name'] != 'null') { ?>
                                    <h4 style="text-align: left;text-decoration:double;">
                                        <strong>
                                            <span class="notranslate" id="<?php echo $topic['topic_id'] ?>"><?php echo $topic['topic_name'] ?></span>
                                        </strong>
                                    </h4>
                                    <div class="btn-group m-2 w-25" role="group">
                                        <button type="button" class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editTopics<?php echo $topic['topic_id'] ?>'>Edit Topic</button>
                                        <button type="button" class='btn btn-success' data-bs-toggle='modal' data-bs-target='#addTopicsImg<?php echo $topic['topic_id'] ?>'>Add Image</button>
                                    </div>
                                <?php } ?>

                                <div class="row">
                                    <div class='modal fade' id='addTopicsImg<?php echo $topic['topic_id'] ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Add Image</h1>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <!-- Thêm ảnh -->
                                                    <form action="../Back-End/Admin/create.php?id=<?php echo $post_id ?>" method="post" enctype="multipart/form-data">
                                                        <input style="display:none;" type="number" id="img_id" name="img_id" value="<?php echo $topic_img['topic_img_id'] ?>">
                                                        <input type="file" name="topics_img" id="topics_img">
                                                        <button style="padding: 5px;">Add Image</button>
                                                        <input style="display:none;" type="number" name="topic_id" id="topic_id" value="<?php echo $topic['topic_id'] ?>">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($topic['content'] != 'null') { ?>
                                    <p style="text-align: justify;max-width:90%">

                                        <?php echo nl2br($topic['content']) ?>
                                        </span>
                                    <?php } ?>
                                    <?php
                                    $topicId = $topic['topic_id'];
                                    $sql1 = "SELECT * FROM topics_img WHERE topic_id = '$topicId'";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while ($topic_img = mysqli_fetch_assoc($result1)) {
                                            if ($topic_img['img_url'] != 'null') {
                                    ?>
                                    <p style="text-align: left;" class="hover">
                                        <span class="notranslate">
                                            <img src="../Admin/img/<?php echo $topic_img['img_url']; ?>" />
                                        </span>
                                    </p>
                                    <div class='modal fade' id='editTopicsImg<?php echo $topic['topic_id'] ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Image</h1>
                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                </div>
                                                <div class='modal-body'>
                                                    <form action="../Back-End/Admin/update.php?id=<?php echo $post_id ?>" method="post" enctype="multipart/form-data">
                                                        <input style="display:none;" type="number" id="img_id" name="img_id" value="<?php echo $topic_img['topic_img_id'] ?>">
                                                        <input type="file" name="topics_img" id="topics_img">
                                                        <button style="padding: 5px;">Train Image </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-group m-2 " role="group">
                                        <button type="button" class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editTopicsImg<?php echo $topic['topic_id'] ?>'>Edit Image</button>
                                        <button type="button" class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteTopicsImg<?php echo $topic['topic_id'] ?>'>Delete Image</button>
                                    </div>

                                    </p>
                                <?php
                                            }
                                ?>
                            <?php } ?>

                        <?php
                                    }

                        ?>
                    <?php } ?>

                <?php
                        }

                ?>
                    </div>
                </div>
            </div>
            <!---------------------------------------- kết thúc nội dung -------------------------------------->