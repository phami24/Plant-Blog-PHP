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
        .content{
            margin: 10px;
            background: #8ADE88;
            font-size: 15px;
            border-radius: 50px;
            color: brown;
        }
        .garden_balcony{
            width: 100%;
            border-radius: 50px;
        }
        .loi_ich{
            background: #B95E5E;
            padding-bottom: 10px;
            margin-bottom: 10px;
            margin-top: 10px;
            border: solid #8ADE88 3px;
            border-radius: 50px;
        }
        .new_text{
            color: #8ADE88;
        }
    </style>
    <div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
        <div class="carousel-inner" style="font-size: 2vw">
            <?php
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($banner = mysqli_fetch_assoc($result)) {

            ?>
                    <div class="carousel-item active" style="position: relative; font-weight: bold">
                        <img src="../../Front-End/img/<?php echo $banner['banner_img'];  ?>" class="d-block w-100" alt="Banner 1" />
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

    <div class="container loi_ich">
        <div class="text-center my-4">

            <h1>
                <span style="color: green;">Lợi ích của việc làm vườn</span>
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
                            Làm vườn là việc trồng các loại cây như hoa, cây bụi và cây cối như một sở thích hoặc
                            giải trí. Một số người cũng trồng rau hoặc trái cây trong vườn của họ. Mọi người làm
                            làm vườn ngoài trời trên đất ở sân sau của họ, hoặc trong chậu hoặc thùng chứa trên
                            ban công. Những khu vườn, ngay cả những khu vườn do con người tạo ra, đều có cây cối
                            có thể giảm mức độ carbon có hại trong không khí, đồng thời giải phóng
                            đưa oxy trở lại bầu khí quyển mà chúng ta cần để tồn tại.
                            Làm vườn đòi hỏi bạn phải thực hiện rất nhiều hoạt động như cắt tỉa, đào đất, tưới cây.
                            thực vật, uốn dẻo, v.v. Vì vậy, đó cũng là một chế độ tập luyện khá tốt.
                            Nghiên cứu cho thấy 3 giờ làm vườn vừa phải tương đương với 1 giờ trong
                            phòng thể dục!
                        </p>
                        <p>
                            Nhiều người cảm thấy hứng thú với việc làm vườn nhưng ngại bắt đầu vì thiếu kiến ​​thức
                            và thông tin chính xác về thực vật, cách chăm sóc, v.v. Do đó, chúng tôi phát
                            triển một trang web sẽ bao gồm tất cả những điều cơ bản về làm vườn.
                        </p>
                        <span>Garden World là một Website được lập ra với Mục đích:</span>
                        <li>Cung cấp cho mọi người những kiến thức về Trồng cây cảnh, trồng hoa hoặc làm vườn.
                            Để mỗi chúng ta có thể tự thiết kế cho mình những không gian xanh, trong lành và cảm
                            thấy sảng khoái hơn, yêu đời hơn.</li>
                        <li>Cung cấp cho mọi người thông tin hữu ích về những thực phẩm tự nhiên có lợi cho sức khỏe.</li>
                        <li>Cung cấp những cách thức tái chế những thứ không dùng trong nhà bạn biến nó thành
                            những vật dụng hữu ích trong cuộc sống. Nâng cao nhận thức của mọi người về việc
                            bảo vệ môi trường, bảo tồn động vật và những thông tin về việc biến đổi khí hậu.</li>
                        <span>Và còn rất nhiều thứ nữa chúng tôi sẽ phát triển trong Dự án Garden World này.
                            Vì thế bạn hãy cùng chúng tôi chung tay để khiến cuộc sống của chúng ta ngày càng tươi đẹp hơn nhé!</span>
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
                        Tin moi nhat
                    </p>
                </h2>
                <p style="text-align: center;">
                    Thong tin moi nhat ve nhung kien thuc lam vuon trong ngoi nha cua ban
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hover01 mb-5" style="width: 20rem;">
                    <a href="#">
                        <figure>
                            <img src="https://www.yeutrongcay.com/skins/user/finance/images/image-3.jpg" class="card-img-top" alt="...">
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">Loi ich cua lam vuon</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hover01 mb-5" style="width: 20rem;">
                    <a href="#">
                        <figure>
                            <img src="https://www.yeutrongcay.com/skins/user/finance/images/image-3.jpg" class="card-img-top" alt="...">
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">Loi ich cua lam vuon</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hover01 mb-5" style="width: 20rem;">
                    <a href="#">
                        <figure>
                            <img src="https://www.yeutrongcay.com/skins/user/finance/images/image-3.jpg" class="card-img-top" alt="...">
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">Loi ich cua lam vuon</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hover01 mb-5" style="width: 20rem;">
                    <a href="#">
                        <figure>
                            <img src="https://www.yeutrongcay.com/skins/user/finance/images/image-3.jpg" class="card-img-top" alt="...">
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">Loi ich cua lam vuon</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hover01 mb-5" style="width: 20rem;">
                    <a href="#">
                        <figure>
                            <img src="https://www.yeutrongcay.com/skins/user/finance/images/image-3.jpg" class="card-img-top" alt="...">
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">Loi ich cua lam vuon</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card hover01 mb-5" style="width: 20rem;">
                    <a href="#">
                        <figure>
                            <img src="https://www.yeutrongcay.com/skins/user/finance/images/image-3.jpg" class="card-img-top" alt="...">
                        </figure>
                        <div class="card-body">
                            <h5 class="card-title">Loi ich cua lam vuon</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </a>
                </div>
            </div>
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
                                <span style="color: #5BFD3B;">Garden World mang đến cho bạn</span>
                            </h1>
                        </div>
                    </div>
                    <div class="row clearfix mx-5 my-5">
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-5 ">
                            <h4><i>
                                    <span style="color: #5BFD3B;">1.</span>
                                    Ý tưởng mới lạ
                                </i>
                            </h4>
                            <div class="text-white-50">Những ý tưởng sáng tạo mới lạ, dễ thực hiện giúp cho bạn đọc thêm yêu công việc làm vườn.</div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-5">
                            <h4><i>

                                    <span style="color: #5BFD3B;">2.</span>
                                    Hướng dẫn chi tết
                                </i>
                            </h4>
                            <div class="text-white-50">Những bài hướng dẫn chi tiết từ các chuyên gia trong sản xuất nông nghiệp được chúng tôi đăng tải thường xuyên.</div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-">
                            <h4><i>
                                    <span style="color: #5BFD3B;">3.</span>
                                    Cập nhật xu hướng
                                </i>
                            </h4>
                            <div class="text-white-50">Những xu hướng, phát minh mới nhất trong ngành nông nghiệp sẽ được cập nhật tại gardenworld.vn</div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 mb-3">
                            <h4><i>

                                    <span style="color: #5BFD3B;">4.</span>
                                    Thông tin nhanh và chính xác
                                </i>
                            </h4>
                            <div class="text-white-50">Luôn đưa tin tức mới nhất về ngành nông nghiệp Việt Nam và Thế giới.</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <?php include "/xampp/htdocs/e-project1/Config/footer.php" ?>