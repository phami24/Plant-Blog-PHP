<?php
include "/xampp/htdocs/e-project1/Config/head.php";
?>
<?php
include "/xampp/htdocs/e-project1/Config/conn.php";
$sql = 'SELECT * FROM post WHERE post_category_id = 6 AND status =1;';

$result = mysqli_query($conn, $sql);
?>
<style>
    .index-intro .jumbotron{
    border-radius: 5px;
    height: 150px;
    font-family:'Times New Roman', Times, serif;
    width: 100%;
  }
  .index-intro {
    background-image: url(../img/Banner1.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    max-width: 100%;

  }
  .tt:hover{
    
    border-radius: 30px;
    color:chocolate;
  }
  .h5{
    padding-top: 70px;
    color:#585c58;
    font-size: 23px;
    padding: 50px auto 50px 50px;
  }
  .h5:hover{
    font-size: 25px;
    font-family:'Courier New', Courier, monospace;
  }
</style>


<div class="container-fluid mt-2 mb-2 ">

    <article class="index-intro">
        <div class="tt">
            <div class="jumbotron">
                <p class="h5">Nature trips are a way to re-energize and help you discover the wonderful things in nature.</p>
            </div>
        </div>
    </article>
    <div class="container mt-3 mb-3">
        <div class="row mb-2 ">
            <!-- Start PHP code -->
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($post = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <a href="../../Front-End/View/ChiTietBaiViet.php?id=<?php echo $post['post_id'] ?>" class="card-link nav-link">
                            <div class="card col">
                                <img style="min-height: 250px; max-height:250px" src="../../Admin/img/<?php echo $post['post_img']; ?>" alt="img" class="card-img-top">
                                <div class="card-body text">
                                    <h4 class="card-title " style="min-height: 100px; max-height:100px"><?php echo $post['title'] ?></h4>
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

</div>


<?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>