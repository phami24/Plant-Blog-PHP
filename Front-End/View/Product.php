<?php
include "/xampp/htdocs/e-project1/Config/head.php";

include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM product ;';
$result = mysqli_query($conn, $sql);
?>


<div class="bg_img container mt-5">

    <div class="row mb-2 ">
        <!-- Start PHP code -->
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($product = mysqli_fetch_assoc($result)) {
                $productID = $product['product_id'];
                $sql4 = "SELECT * FROM product_img Where product_id = '$productID'";
                $result4 = mysqli_query($conn, $sql4);
                $product_img = mysqli_fetch_assoc($result4)

        ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <a href="ProductDetail.php?product_id=<?php echo $product['product_id']?>" class="card-link nav-link">
                        <div class="card col">
                            <img style="min-height: 200px; max-height:200px" src="../../Admin/img/<?php  echo $product_img['product_img']; ?>" alt="img" class="card-img-top">
                            <div class="card-body text">
                                <h4 class="card-title " style="min-height: 100px; max-height:100px"><?php echo $product['product_name'] ?></h4>
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

</div>


<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>


