<?php
$sql_b = 'SELECT * FROM banner ;';
$result_b = mysqli_query($conn, $sql_b);
?>

<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
    <div class="carousel-inner" style="font-size: 2vw">
        <?php

        if (mysqli_num_rows($result_b) > 0) {
            while ($banner = mysqli_fetch_assoc($result_b)) {

        ?>
                <div class="carousel-item active" style="position: relative; font-weight: bold">
                    <img src="../../Front-End/img/<?php echo $banner['banner_img'];  ?>" class="d-block w-100" alt="<?php echo $banner['banner_img']    ?>" />
                    <div style="color: White">
                        <p class="banner">
                            <?php echo $banner['banner_text'] ?>
                        </p>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>