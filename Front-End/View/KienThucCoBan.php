<body>

    <?php
    include "/xampp/htdocs/e-project1/Config/head.php";
    ?>
    <?php
    include "/xampp/htdocs/e-project1/Config/conn.php";
    

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;

    $result_row = mysqli_query($conn, 'select count(post_id) as total from post where post_category_id = 8 And status = 1');
    $row = mysqli_fetch_assoc($result_row);
    $total_records = $row['total'];

    $total_page = ceil($total_records / $limit);
    if ($current_page > $total_page) {
        $current_page = $total_page;
    } else if ($current_page < 1) {
        $current_page = 1;
    }
    $start = ($current_page - 1) * $limit;

    $sql = "SELECT * FROM post WHERE post_category_id = 1 AND status =1 LIMIT $start, $limit";
    $result = mysqli_query($conn, $sql);
    $sql1 = "SELECT * FROM book WHERE post_category_id = 9 ORDER BY RAND() LIMIT 4";
    $result1 = mysqli_query($conn, $sql1);

    ?>


    <div>
        <!---------- Slide ------------------------->
        <?php
        include "/xampp/htdocs/e-project1/Config/Slide.php";

        ?>

        <!-------------------------------->

        <div class="container mt-4 mb-3">

            <div class="sec-title centered ">
                <h1 class="text-success mb-4">Basic knowledge<h1>
            </div>
            <div class="row mb-2 ">
                <!-- Start PHP code -->
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($post = mysqli_fetch_assoc($result)) {

                ?>
                        <div class="col-sm-6 col-md-4 mb-3">
                            <a href="../../Front-End/View/ChiTietBaiViet.php?id=<?php echo $post['post_id'] ?>" class="card-link nav-link">
                                <div class="card col card_t">
                                    <img style="min-height: 250px; max-height:250px" src="../../Admin/img/<?php echo $post['post_img']; ?>" alt="img" class="card-img-top">
                                    <div class="card-body text">
                                        <h4 class="card-title " style="min-height: 100px; max-height:1000px"><?php echo $post['title'] ?></h4>
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
        <!-- Phan trang -->
        <div class="pagination">
            <?php
            if ($total_page > 1) {

                if ($current_page > 1 && $total_page > 1) {
                    echo '<a href="KienThucCoBan.php?page=' . ($current_page - 1) . '">Prev</a>';
                }

                // Lặp khoảng giữa
                for ($i = 1; $i <= $total_page; $i++) {
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                    if ($i == $current_page) {
                        echo '<a class="active">' . $i . '</a>';
                    } else {
                        echo '<a href="KienThucCoBan.php?page=' . $i . '">' . $i . '</a>';
                    }
                }

                // echo $current_page + 1;
                // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a href="KienThucCoBan.php?page=' . ($current_page + 1) . '">Next</a>';
                }
            }
            ?>
        </div>
        <!-- Sách liên quan: -->
        <div class="overlay-box px-5 mx-3">
            <h3 class="text-success mb-5">You can read the books below to be more sure about gardening!</h3>
            <p class="h5 my-3">You buy it at the store or read it online</p>

            <?php
            $sql1 = "SELECT * FROM book WHERE post_category_id = 9 ORDER BY RAND() ";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                while ($book = mysqli_fetch_assoc($result1)) {

            ?>
                    <article class="card mb-2 card_book" style="max-height:200px">
                        <a href="../../Front-End/View/Book.php?id=<?php echo $book['book_id'] ?>" class="card-link nav-link ">
                            <div class=" row">
                                <figure class=" col-sm-4">
                                    <img alt="" src="../../Admin/img/<?php echo $book['book_img']; ?>" class="img-fluid mt-3 px-2" style="border-radius: 5px; max-width: 150px; max-height:150px">
                                </figure>
                                <div class="col-sm-8">
                                    <p class="card-title" style="max-height:100px"><?php echo $book['book_name'] ?></p>
                                    <small style="font-size:small;"><?php echo $book['book_content'] ?></small>
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


    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>
    <script>
        function Scrolldown() {
            window.location.hash = '#post_category_name';
        }
        window.onload = Scrolldown();
    </script>
</body>