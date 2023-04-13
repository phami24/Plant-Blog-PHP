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

        .hover01 figure img {
            -webkit-transform: scale(1);
            transform: scale(1);
            -webkit-transition: .3s ease-in-out;
            transition: .3s ease-in-out;
        }

        .hover01 figure:hover img {
            -webkit-transform: scale(1.3);
            transform: scale(1.3);
        }

        figure {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .content {
            margin: 10px;
            background: #8ADE88;
            font-size: 15px;
            border-radius: 50px;
            color: brown;
        }

        .garden_balcony {
            width: 100%;
            border-radius: 50px;
        }

        .loi_ich {
            background: #B95E5E;
            padding-bottom: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
            border: solid #8ADE88 3px;
            border-radius: 50px;
        }

        .new_text {
            color: #8ADE88;
        }

        .text-search {
            text-align: center;
            font-size: 30px;
            color: #8ADE88;
        }
    </style>
    <?php
    include "/xampp/htdocs/e-project1/Config/Slide.php";
    ?>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <?php
    if (isset($_POST['search2']) || isset($_POST['search'])) {
        $noidung = isset($_POST['search2']) ? $_POST['search2'] : (isset($_POST['search']) ? $_POST['search'] : "Can't find");
    }
    echo "<p class='text-search'>" . "Results for search : " . "<strong>" . $noidung . "</strong>" . "</p>";
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $sql = "SELECT * FROM post WHERE title LIKE '%$noidung%' ";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card hover01 mb-5" style="width: 20rem; min-height:300px; max-height:300px">
                        <a class="nav-link" href="ChiTietBaiViet.php?id=<?php echo $row['post_id'] ?>">
                            <figure>
                                <img src="../../Admin/img/<?php echo $row['post_img'] ?>" class="card-img-top" style="min-height:200px; max-height:200px">
                            </figure>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title'] ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php
    include "/xampp/htdocs/e-project1/Config/footer.php";
    ?>
</body>