<?php
include "/xampp/htdocs/e-project1/Config/head.php";

include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM product ;';
$result = mysqli_query($conn, $sql);


$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;

$result_row = mysqli_query($conn, 'select count(post_id) as total from post where post_category_id = 2 And status = 1');
$row = mysqli_fetch_assoc($result_row);
$total_records = $row['total'];

$total_page = ceil($total_records / $limit);
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;

$sql = "SELECT * FROM post WHERE post_category_id = 2 AND status =1 LIMIT $start, $limit";
$result = mysqli_query($conn, $sql);
$sql1 = "SELECT * FROM book WHERE post_category_id = 9 ORDER BY RAND() LIMIT 4";
$result1 = mysqli_query($conn, $sql1);
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
                    <a href="ProductDetail.php?product_id=<?php echo $product['product_id'] ?>" class="card-link nav-link">
                        <div class="card col">
                            <img style="min-height: 200px; max-height:200px" src="../../Admin/img/<?php echo $product_img['product_img']; ?>" alt="img" class="card-img-top">
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
    <!-- Phaan trang -->
    <div class="pagination">
        <?php
        if ($current_page > 1 && $total_page > 1) {
            echo '<a href="HatGiong.php?page=' . ($current_page - 1) . '">Prev</a>';

            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '<a class="active">' . $i . '</a>';
                } else {
                    echo '<a href="HatGiong.php?page=' . $i . '">' . $i . '</a>';
                }
            }

            // echo $current_page + 1;
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<a href="HatGiong.php?page=' . ($current_page + 1) . '">Next</a>';
            }
        }
        ?>
    </div>
</div>




<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>