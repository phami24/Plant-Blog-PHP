<?php
include "/xampp/htdocs/e-project1/Config/head.php";
include "/xampp/htdocs/e-project1/Config/conn.php";
$book_id = $_GET['id'];
$sql1 = "SELECT * FROM book WHERE book_id = '$book_id' ORDER BY RAND() LIMIT 4";
$result1 = mysqli_query($conn, $sql1);
?>

<div class="container bg-secondary-subtle">
    <div class="row m-5  p-5 ">
        <div class="img col-6">
            <?php
            if (mysqli_num_rows($result1) > 0) {
                $book = mysqli_fetch_assoc($result1);

            ?>
                <img src="../../Admin/img/<?php echo $book['book_img']; ?>" alt="Ảnh sản phẩm">
        </div>
        <div class="desc col-6 bg-white p-5">
            <div>
                <h4 class="text-success text-center bg-secondary-subtle "><?php echo $book['book_name'] ?></h4>
            </div>

            <div>
                <p class="text_p">
                    <?php echo $book['book_content'] ?>
                </p>
            </div>
        </div>
    <?php
            }

    ?>
    </div>
</div>



<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>