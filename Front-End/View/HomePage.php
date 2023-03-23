<?php include "/xampp/htdocs/e-project1/Config/head.php" ?>
<style>
    .content {
        font-size: 20px;
        border-left: #E0E0E0 6px solid;
        color: #A0A0A0;
    }
</style>
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="data:image/jpeg;base64,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" class="d-block" style="width:100%">
        </div>
        <div class="carousel-item" style="position: relative; font-weight: bold">
            <img src="../img/Monstera-soil-banner.jpg" class="d-block w-100 img-fluid" alt="Banner 2" />
            <div style="color: #f8fbf8">
                <p class="banner">
                    Tôi yêu thiên nhiên cảnh sắc này nơi chỉ có thiên nhiên mới giúp
                    con người trở nên thư thái và quên mọi ưu tư, muộn phiền.
                </p>
            </div>
        </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container">
    <div class="text-center my-4">

        <h1>
            <span style="color: green;">Lợi ích của việc làm vườn</span>
        </h1>
    </div>
    <div class="w-100 my-5 px-4 content">
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