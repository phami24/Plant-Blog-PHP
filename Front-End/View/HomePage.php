    <?php
    include "/xampp/htdocs/e-project1/Config/head.php";
    include "/xampp/htdocs/e-project1/Config/conn.php";
    $sql = 'SELECT * FROM banner ;';
    ?>
    <style>
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
    </style>
   
   <?php
    include "/xampp/htdocs/e-project1/Config/Slide.php";

    ?>
    <div class="container loi_ich">
        <div class="text-center my-4">

            <h1>
                <span style="color: green;">Benefits of gardening</span>
            </h1>
        </div>
        <div class="row content">
            <div class="col-12 col-md-4 col-lg-4">
                <img src="https://images.pexels.com/photos/1684004/pexels-photo-1684004.jpeg?auto=compress&cs=tinysrgb&w=600" class="my-3 garden_balcony">
            </div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="w-100 my-5 px-4">
                    <span>
                        <p>
                            Gardening is the cultivation of plants such as flowers, shrubs and trees as a hobby or
                            entertainment. Some people also grow vegetables or fruits in their gardens. Everyone does
                            outdoor gardening on land in their backyard, or in pots or containers on
                            balcony. Gardens, even man-made ones, have trees
                            can reduce harmful carbon levels in the air, while releasing
                            put the oxygen back into the atmosphere that we need to survive.
                            Gardening requires you to perform a lot of activities such as pruning, digging, watering plants.
                            vegetative, malleable, etc. So that's also a pretty good workout regimen.
                            Research shows that 3 hours of moderate gardening is equivalent to 1 hour of
                            gym!
                        </p>
                        <p>
                            Many people feel interested in gardening but are afraid to start because of lack of knowledge
                            and accurate information about plants, how to care, etc. Therefore, we develop
                            develop a website that will cover all the basics of gardening.
                        </p>
                        <span>Garden World is a Website created with the Purpose:</span>
                        <li>Provide people with knowledge about Bonsai, flower growing or gardening.
                            So that each of us can design our own green, fresh and feeling
                            feel happier, love life more.</li>
                        <li>Provide people with useful information about healthy natural foods.</li>
                        <li>Provide ways to recycle unused things in your home and turn it into
                            useful things in life. Raise people's awareness about
                            environmental protection, animal conservation and information on climate change.</li>
                        <span>And there are many more things we will develop in this Garden World Project.
                            So let's join hands to make our life more and more beautiful!</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 new_text">
                <h2>
                    <p style="text-align: center;">
                        News Post
                    </p>
                </h2>
                <p style="text-align: center;">
                    The latest information on gardening knowledge
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php
            $sql1 = "SELECT * FROM post LIMIT 6";
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result) > 0) {
                while ($post = mysqli_fetch_assoc($result1)) {

            ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card hover01 mb-5" style="width: 20rem; min-height:300px; max-height:300px">
                            <a class="nav-link" href="ChiTietBaiViet.php?id=<?php echo $post['post_id'] ?>">
                                <figure>
                                    <img src="../../Admin/img/<?php echo $post['post_img'] ?>" class="card-img-top" style="min-height:200px; max-height:200px" alt="Post<?php echo $post['post_id'] ?>">
                                </figure>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $post['title'] ?></h5>
                                </div>
                            </a>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 g-0">
                <img src="https://www.yeutrongcay.com/skins/user/finance/images/image-3.jpg" style="width: 100%; height:100%">
            </div>
            <div class="col-lg-6 text-white" style="background: #3A3A3A;">
                <div class="content-column">
                    <div class="inner-box">
                        <br>
                        <div class="sec-title-two mx-3">
                            <h1>
                                <span style="color: #5BFD3B;">Garden World brings you</span>
                            </h1>
                        </div>
                    </div>
                    <div class="row clearfix mx-5 my-5">
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-5 ">
                            <h4><i>
                                    <span style="color: #5BFD3B;">1.</span>
                                    New ideas
                                </i>
                            </h4>
                            <div class="text-white-50">New creative, easy -to -make ideas help readers love gardening work.</div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-5">
                            <h4><i>

                                    <span style="color: #5BFD3B;">2.</span>
                                    Detailed instructions
                                </i>
                            </h4>
                            <div class="text-white-50">Detailed instructions from experts in agricultural production are regularly posted.</div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-">
                            <h4><i>
                                    <span style="color: #5BFD3B;">3.</span>
                                    Update trends
                                </i>
                            </h4>
                            <div class="text-white-50">The latest trends and inventions in the agricultural sector will be updated at GardenWorld.vn</div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                            <h4><i>

                                    <span style="color: #5BFD3B;">4.</span>
                                    Fast and accurate information
                                </i>
                            </h4>
                            <div class="text-white-50">Always bring the latest news about Vietnam's agriculture and the world.</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>