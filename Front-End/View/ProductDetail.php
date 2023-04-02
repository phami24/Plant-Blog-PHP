<?php
include "/xampp/htdocs/e-project1/Config/head.php";
include "/xampp/htdocs/e-project1/Config/conn.php";
$product_id = $_GET['product_id'];
$sql = "SELECT * FROM product_detail WHERE product_id = '$product_id'";
$sql1 = "SELECT * FROM product_img WHERE product_id = '$product_id'";
$result = mysqli_query($conn, $sql);
?>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .main_p{
        background-color: burlywood;
    }
    img{
        border-radius: 10px;
    }
    h4{
        font-size: 40px;
        color: green;
        text-shadow: 1px 1px 0 black;
        margin-bottom: 20px;
    }
    img:hover{
        width: 95%;
        height: 75%;
        box-shadow: 0px 0px 10px 3px green;
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
                <h3>$<?php echo $product_detail['price'] ?></h3>
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

<div class= " container mx-5 px-5">
    <p style="font-size:30px">Some other products: </p>
    <?php
    $sql3 = "SELECT * FROM product ORDER BY RAND() LIMIT 5";
    $result3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result3) > 0) {
        while ($product = mysqli_fetch_assoc($result3)) {
            $productID = $product['product_id'];
            $sql4 = "SELECT * FROM product_img Where product_id = '$productID'";
            $result4 = mysqli_query($conn, $sql4);
            $product_img = mysqli_fetch_assoc($result4)
    ?>
            <article class="card mb-3 px-2 mx-5" style="max-height:200px">
                <a href="ProductDetail.php?product_id=<?php echo $product['product_id']?>" class="card-link nav-link ">
                    <div class="row px-5 mx-3">
                        <figure class=" col-sm-4">
                            <img style="max-width: 150px; max-height:150px" alt="" src="../../Admin/img/<?php echo $product_img['product_img']; ?>" class="w-1 mt-2 mx-2 mt-3 px-2">
                        </figure>
                        <div class="col-sm-8">
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