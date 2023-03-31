<?php
include "/xampp/htdocs/e-project1/Config/head.php";
include "/xampp/htdocs/e-project1/Config/conn.php";
$product_id = $_GET['product_id'];
$sql = "SELECT * FROM product_detail WHERE product_id = '$product_id'";
$sql1 = "SELECT * FROM product_img WHERE product_id = '$product_id'";
$result = mysqli_query($conn, $sql);
?>
<div class="container bg-secondary-subtle">
    <div class="row m-5  p-5 ">
        <div class="img col-6">
            <?php
            if (mysqli_num_rows($result) > 0) {
                $product_detail = mysqli_fetch_assoc($result);

                $result1 = mysqli_query($conn, $sql1);
                $product_img = mysqli_fetch_assoc($result1);
            ?>
                <img src="../../Admin/img/<?php echo $product_img['product_img']; ?>" alt="Ảnh sản phẩm">
        </div>
        <div class="desc col-6 bg-white p-5">
            <div>
                <h4><?php echo $product_detail['product_name'] ?></h4>
            </div>
            <div>
                <h3>$<?php echo $product_detail['price'] ?></h3>
            </div>
            <div>
                <p>
                    <?php echo $product_detail['descriptions'] ?>
                </p>
            </div>

        </div>
    <?php
            }

    ?>
    </div>
</div>

<div class="overlay-box ">
    <p style="font-size:30px">Một số sản phẩm khác</p>
    <?php
    $sql3 = "SELECT * FROM product";
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

</div>

<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>