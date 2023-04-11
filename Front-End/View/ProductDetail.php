<body>

    <?php
    include "/xampp/htdocs/e-project1/Config/head.php";
    include "/xampp/htdocs/e-project1/Config/conn.php";
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM product_detail WHERE product_id = '$product_id'";
    $sql1 = "SELECT * FROM product_img WHERE product_id = '$product_id'";
    $result = mysqli_query($conn, $sql);
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

        .main_p {
            background-color: burlywood;
        }

        img {
            border-radius: 10px;
        }

        h4 {
            font-size: 40px;
            color: green;
            text-shadow: 1px 1px 0 black;
            margin-bottom: 20px;
        }

        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #eee;
            color: #000;
            margin: 0;
            padding: 0;
            font-size: 18px;
        }

        .swiper {
            width: 100%;
            height: 50%;
        }

        .swiper-slide {
            text-align: center;
            font-size: 28px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            object-fit: cover;
        }
        .totop {
            position: fixed;
            bottom: 10px;
            right: 10px;
            background-color: #f3f5ee;
            padding: 5px;
            border-radius: 50px;
        }

        .totop img {
            width: 30px;
        }
    </style>
    <div class="container bg-secondary-subtle">
        <div class="row m-5 p-5 ">
            <div class="img col-6 ">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    $product_detail = mysqli_fetch_assoc($result);

                    $result1 = mysqli_query($conn, $sql1);
                    $product_img = mysqli_fetch_assoc($result1);
                ?>
                    <img style="margin: 100px 100px 0 0;" src="../../Admin/img/<?php echo $product_img['product_img']; ?>" alt="Ảnh sản phẩm">
            </div>
            <div class="desc col-6 bg-white p-5">
                <div>
                    <h4><?php echo $product_detail['product_name'] ?></h4>
                </div>
                <div>
                    <h3 class="bg-secondary-subtle text-center">$<?php echo $product_detail['price'] ?></h3>
                </div>
                <div>
                    <small>
                        <?php echo $product_detail['descriptions'] ?>
                    </small>
                </div>

            </div>
        <?php
                }

        ?>
        </div>
    </div>

    <div class=" container mx-5 px-5">
        <p style="font-size:30px">Some other products: </p>
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $sql3 = "SELECT * FROM product ORDER BY 'product_img'";
                $result3 = mysqli_query($conn, $sql3);
                if (mysqli_num_rows($result3) > 0) {
                    while ($product = mysqli_fetch_assoc($result3)) {
                        $productID = $product['product_id'];
                        $sql4 = "SELECT * FROM product_img Where product_id = '$productID'";
                        $result4 = mysqli_query($conn, $sql4);
                        $product_img = mysqli_fetch_assoc($result4)
                ?>
                        <div class="swiper-slide">
                            <a href="ProductDetail.php?product_id=<?php echo $product['product_id'] ?>" class="card-link nav-link ">
                                <img style="max-width: 18rem;max-height: 18rem; " src="../../Admin/img/<?php echo $product_img['product_img']; ?>">
                                <p class="card-title"><?php echo $product['product_name']; ?></p>
                            </a>
                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Swiper JS -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                freeMode: true,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });
        </script>

    </div>
        <!-- to top of content -->
        <a href="#" class="totop">
            <ion-icon name="arrow-up-outline" style="font-size:30px; color: #0ece0e"></ion-icon>
        </a>
    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>

</body>