<?php
session_start();

if (isset($_SESSION["customer"][0])) {
    $maBN = $_SESSION["customer"][0];
    $tenBenhNhan = $_SESSION["customer"][1]; // Lấy tên khách hàng từ session
} else {
    // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    echo "<script>alert('Vui lòng đăng nhập!');window.location.href = '../../dangNhap/';</script>";
    exit();
}

if (isset($_POST['maLichKham']) && isset($_POST['tienKham'])) {

    $maLichKham = $_POST['maLichKham'];
    $tienKham = $_POST['tienKham'];
    
} else {
    echo "<script>alert('Không tìm thấy mã lịch khám hoặc tiền khám!');window.location.href = '../../index.php';</script>";
    exit();
}
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Smiles Hospital | Trang chủ</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/logo/hospital.png">
    <style>
        /* Giãn khoảng cách giữa nội dung chính và footer */
        /* Đảm bảo body và html chiếm toàn bộ chiều cao */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Căn giữa toàn bộ nội dung */
        main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center; /* Căn giữa theo chiều ngang */
            padding: 50px 0; /* Khoảng cách phía trên và dưới */
        }

        /* Định dạng khung (card) */
        .card {
            width: 60%; /* Đặt chiều rộng khung là 60% màn hình */
            max-width: 800px; /* Giới hạn tối đa */
            padding: 40px; /* Tạo khoảng cách bên trong khung */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Hiệu ứng nổi */
            border-radius: 10px; /* Bo tròn góc khung */
            background-color: #fff; /* Đặt màu nền cho khung */
            text-align: center; /* Căn giữa nội dung bên trong */
            margin: 100px 100px 100px 350px;
        }
    </style>
    <!-- CSS here -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../assets/css/slicknav.css">
    <link rel="stylesheet" href="../../assets/css/flaticon.css">
    <link rel="stylesheet" href="../../assets/css/gijgo.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/animated-headline.css">
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/slick.css">
    <link rel="stylesheet" href="../../assets/css/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/payment.css">
    <link rel="stylesheet" href="../../assets/css/dropdown.css">
</head>
<body>
<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-1 mt-3">
                        <div class="logo">
                            <a href="../../index.php"><img src="../../assets/images/logo/logo_main.png" alt="Test Logo" style="width: 100px; height: auto;">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../../index.php">Trang Chủ</a></li>
                                        <li><a href="../../khoa.php">Chuyên Khoa</a></li>
                                        <li><a href="../../bacsi.php">Bác Sĩ</a></li>
                                        <li><a href="../../tintuc.php">Tin Tức</a></li>
                                        <li><a href="../../lienhe.php">Liên Hệ</a></li>
                                        <li class="dropdown">
                                        <a class="dropbtn" href="#">Chức năng</a>
                                        <div class="dropdown-content">
                                            <a href="../../view/benhNhan/dangkylichkham.php">Đăng ký lịch khám</a>
                                            <a href="../../view/benhNhan/xemlichkham.php">Xem Lịch Khám</a>
                                            <a href="../../view/benhNhan/xemphieukham.php">Xem Phiếu Khám Bệnh</a>
                                        </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                            <?php if (isset($tenBenhNhan)) { ?>
                                <div class="dropdown">
                                    <button class="btn header-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo htmlspecialchars($tenBenhNhan); ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="../../view/dangxuat/">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <a href="../../view/dangNhap/" class="btn header-btn">Đăng nhập</a>
                            <?php } ?>
                        </div>

                        </div>
                    </div>   
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<main>
    <div class="card text-center justify-content-center">
        <h1 class="text-primary mb-3">Hoàn tất thanh toán</h1>
        <p class="text-muted" style="font-size:20px;">Vui lòng nhấn nút dưới đây để tiếp tục thanh toán.</p>
        <form action="../../controller/cThanhToanOnline.php" method="post" class="mt-4">
            <input type="hidden" name="total" value="<?php echo $tienKham; ?>">
            <input type="hidden" name="maLK" value="<?php echo $maLichKham; ?>">
            <input type="hidden" name="maBN" value="<?php echo $maBN; ?>">
            <button name="redirect" type="submit" class="btn btn-success btn-lg px-5" style="width: 200px; height: 50px; font-size: 21px;">Thanh Toán</button>
        </form>
    </div>
</main>
<footer>
    <!--? Footer Start-->
    <div class="footer-area section-bg" data-background="../../assets/images/gallery/footer_bg.jpg">
        <div class="container">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo">
                                <a href="index.php"><img src="../../assets/images/logo/logo2_footer.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>CHÍNH SÁCH</h4>
                                <div class="footer-pera">
                                    <p class="info1">Chính sách bảo mật</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-number mb-50">
                                <h4>0123565678</h4>
                                <p>smiles@gmail.com</p>
                            </div>
                            <!-- Form -->
                            <div class="footer-form">
                                <div id="mc_embed_signup">
                                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative mail_part" novalidate="true">
                                        <input type="email" name="EMAIL" id="newsletter-form-email" placeholder=" Email Address " class="placeholder hide-on-focus" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email address'">
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                Send
                                            </button>
                                        </div>
                                        <div class="mt-10 info"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p>CÔNG TY CỔ PHẦN BỆNH VIỆN ĐA KHOA SMILES <i class="fa fa-heart" aria-hidden="true"></i></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="../../assets/js/vendor/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="../../assets/js/vendor/superfish.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="../../assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="../../assets/js/owl.carousel.min.js"></script>
<script src="../../assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="../../assets/js/wow.min.js"></script>
<script src="../../assets/js/animated.headline.js"></script>

<!-- Nice-select, sticky -->
<script src="../../assets/js/jquery.nice-select.min.js"></script>
<script src="../../assets/js/jquery.sticky.js"></script>
<script src="../../assets/js/jquery.magnific-popup.js"></script>

<!-- contact js -->
<script src="../../assets/js/contact.js"></script>
<script src="../../assets/js/jquery.form.js"></script>
<script src="../../assets/js/jquery.validate.min.js"></script>
<script src="../../assets/js/mail-script.js"></script>
<script src="../../assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->	
<script src="../../assets/js/plugins.js"></script>
<script src="../../assets/libs/YearPicker-master/docs/yearpicker.js" async></script>
<script src="../../assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
<script src="../../assets/js/main.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>