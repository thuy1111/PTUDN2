<?php
session_start();

if (isset($_SESSION['customer'][0])) {
    $maBenhNhan = $_SESSION['customer'][0];
    $tenBenhNhan = $_SESSION['customer'][1]; 
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
        
    
    </style>
    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/gijgo.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/animated-headline.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/payment.css">
    <link rel="stylesheet" href="assets/css/dropdown.css">
</head>
<body>
<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-1 mt-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo_main.png" alt="Test Logo" style="width: 100px; height: auto;">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li><a href="khoa.php">Chuyên Khoa</a></li>
                                        <li><a href="bacsi.php">Bác Sĩ</a></li>
                                        <li><a href="tintuc.php">Tin Tức</a></li>
                                        <li><a href="lienhe.php">Liên Hệ</a></li>
                                        <li class="dropdown">
                                        <a class="dropbtn" href="#">Chức năng</a>
                                        <div class="dropdown-content">
                                            <a href="view/benhNhan/dangkylichkham.php">Đăng ký lịch khám</a>
                                            <a href="view/benhNhan/xemlichkham.php">Xem Lịch Khám</a>
                                            <a href="view/benhNhan/xemphieukham.php">Xem Phiếu Khám Bệnh</a>
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
                                        <li><a class="dropdown-item" href="view/dangxuat/">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <a href="view/dangNhap/" class="btn header-btn">Đăng nhập</a>
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
    <!--? slider Area Start-->
            <div class="slider-area position-relative">
            <div class="single-slider">
                <!-- Hình ảnh nền -->
                <img src="assets/images/hero/h1_hero.png" alt="Banner Image" class="banner-image">
                <!-- Nội dung banner -->
                <div class="hero__caption">
                    <h1>Chào mừng đến với Smiles Hospital</h1>
                    <p>Sức khỏe của bạn là ưu tiên hàng đầu của chúng tôi.</p>
                    
                </div>
            </div>
        </div>
                       <style>
                
                .header-area {
                    position: relative;
                    z-index: 10;
                }

                .main-header {
                    position: sticky;
                    top: 0;
                    z-index: 10;
                    background-color: #fff;
                    padding: 15px 0; 
                }

                .slider-area {
                    margin-top: 60px; 
                    position: relative;
                    height: 650px;
                    overflow: hidden;
                    background-color: #f5f5f5;
                    z-index: 1;
                }

                .hero__caption {
                    position: relative;
                    z-index: 2;
                    text-align: center;
                    color: #333;
                    background: rgba(255, 255, 255, 0.8);
                    padding: 15px 30px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                }

                .banner-image {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    z-index: 1;
                    filter: brightness(0.8);
                }

</style>                 
    <!-- slider Area End-->
    <!--? About Start-->
    <div class="about-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2 mb-35">
                            <h2>Chào Mừng Đến Bệnh Viện Của Chúng Tôi</h2>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="bacsi.php" class="btn about-btn">Tìm Bác Sĩ <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="bacsi.php" class="btn about-btn2">Đặt Lịch Hẹn <i class="ti-arrow-right"></i></a>
                        </div>
                        <div class="about-btn1 mb-30">
                            <a href="bacsi.php" class="btn about-btn2">Khẩn Cấp <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img "> 
                        <div class="about-font-img d-none d-lg-block">
                            <img src="assets/images/gallery/about2.png" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="assets/images/gallery/about3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About  End-->
    <!--? department_area_start  -->
    <div class="department_area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-100">
                        <h2>Các Chuyên Khoa</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="depart_ment_tab mb-30">
                        <!-- Tabs Buttons -->
                        <ul class="nav" id="myTab" role="tablist">
                        <li class="nav-item">
                                <a class="nav-link" id="Blood-tab" data-toggle="tab" href="#Blood" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-cell"></i>
                                    <h4>Xét Nghiệm</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="flaticon-cardiovascular"></i>
                                    <h4>Khám Bệnh</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-ear"></i>
                                    <h4>Dược</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Astrology-tab" data-toggle="tab" href="#Astrology" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-bone"></i>
                                    <h4>Nội Soi</h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Neuroanatomy-tab" data-toggle="tab" href="#Neuroanatomy" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-lung"></i>
                                    <h4>Chuẩn Đoán Hình </h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- depertment area end  -->
     <!--? Gallery Area Start -->
     <div class="gallery-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <h2>Các Chuyên Viên</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Left -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img" style="background-image: url(assets/images/gallery/gallery1.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/images/gallery/gallery2.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/images/gallery/gallery3.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right -->
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/images/gallery/gallery4.jpg);"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img small-img" style="background-image: url(assets/images/gallery/gallery5.png);"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-gallery mb-30">
                                <div class="gallery-img big-img" style="background-image: url(assets/images/gallery/gallery6.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
    
        <!--Right Contents  -->
        <div class="starups-img"></div>
    </div>
    <!--All startups End -->
     <!--? Team Start -->
     <div class="team-area section-padding30">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-tittle text-center mb-100">
                        <h2>Các Chuyên Gia Của Chúng Tôi</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single Tem -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/images/gallery/team4.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Nguyễn Văn An</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/images/gallery/team5.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Lê Văn Cẩn</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="assets/images/gallery/team6.png" alt="">
                        </div>
                        <div class="team-caption">
                            <h3><a href="#">Hoàng Văn Dụ</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
     <!--? Contact form Start -->
     <div class="contact-form-main">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-7">
                    <div class="form-wrapper">
                        <!--Section Tittle  -->
                        <div class="form-tittle">
                            <div class="row ">
                                <div class="col-xl-12">
                                    <div class="section-tittle section-tittle2">
                                        <span>Đăng Ký Lịch Khám</span>
                                        <h2>Form Đăng Ký</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Section Tittle  -->
                        <form id="contact-form" action="#" method="POST">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box user-icon mb-30">
                                        <input type="text" name="name" placeholder="Họ Và Tên">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box email-icon mb-30">
                                        <input type="text" name="phone" placeholder="Số Điện Thoại">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-30">
                                    <div class="select-itms">
                                        <select name="select" id="select2">
                                            <option value="">Nguyễn Văn An</option>
                                            <option value="">Lê Văn Cẩn</option>
                                            <option value="">Hoàng Văn Dụ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-box subject-icon mb-30">
                                        <input type="Email" name="subject" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-box message-icon mb-65">
                                        <textarea name="message" id="message" placeholder="">Ghi Chú</textarea>
                                    </div>
                                    <div class="submit-info">
                                        <button class="btn" type="submit">Đăng Ký</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact left Img-->
        <div class="from-left d-none d-lg-block">
            <img src="assets/images/gallery/form1.png" alt="">
        </div>
    </div>
    <!-- Contact form End -->
    <!--? gallery Products Start -->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/images/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/images/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/images/gallery/gallery3.jpg);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/images/gallery/gallery4.jpg);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                             <div class="gallery-img " style="background-image: url(assets/images/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(assets/images/gallery/gallery6.jpg);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Products End -->
</main>
    <footer>
        <!--? Footer Start-->
        <div class="footer-area section-bg" data-background="assets/images/gallery/footer_bg.jpg">
            <div class="container">
                <div class="footer-top footer-padding">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="index.php"><img src="assets/images/logo/logo2_footer.png" alt=""></a>
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

    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/superfish.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Jquery Mobile Menu -->
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/animated.headline.js"></script>
    
    <!-- Nice-select, sticky -->
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>

    <!-- contact js -->
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/mail-script.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="assets/js/plugins.js"></script>
    <script src="assets/libs/YearPicker-master/docs/yearpicker.js" async></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/main.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>