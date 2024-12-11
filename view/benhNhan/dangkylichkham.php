<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Đăng ký lịch khám</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/logo/hospital.png">

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

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .form-container {
            max-width: 700px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
        }

        .form-container label {
            font-weight: bold;
            font-size: 1.7rem; /* Tăng kích thước chữ của nhãn */
        }

        .form-container select,
        .form-container input,
        .form-container textarea {
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
            font-size: 1.5rem; /* Tăng kích thước chữ của các ô nhập */
        }

        .form-container select {
            width: 100%; /* Đảm bảo dropdown bao phủ toàn bộ chiều rộng */
        }

        .form-container textarea::placeholder {
            color: #666;
        }

        .btn-primary {
            width: 30%;
            font-weight: bold;
            background-color: #0056b3;
            border: none;
            font-size: 1.7rem;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .date-time-row {
            display: flex;
            gap: 10px;
        }

        .date-time-row input {
            flex: 1;
        }

        .btn-primary:hover {
            background-color: #004494;
        }

        /* Đảm bảo các dropdown option căn chỉnh theo chiều rộng */
        select option {
            width: 100%;
            text-align: left;
        }
        
    </style>
</head>
<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1 mt-3">
                        <div class="logo">
                            <a href="index.php"><img src="../../assets/images/logo/logo_main.png" alt="" width="100"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="../../index.php">Trang Chủ</a></li>
                                        <li><a href="../../khoa.php">Chuyên Khoa</a></li>
                                        <li><a href="../../bacsi.php">Bác Sĩ</a></li>
                                        <li><a href="../../tintuc.php">Tin Tức</a></li>
                                        <li><a href="../../lienhe.php">Liên Hệ</a></li>
                                        <li><a href="dangkylichkham.php">Đăng Ký Khám</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <a href="../../view/dangNhap/" class="btn header-btn">Đăng Nhập</a>
                            </div>
                        </div>
                    </div>   
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

</header>
<body>
    <div class="form-container">
        <h1 class="text-center mb-20" style="color: #0056b3; font-weight: bolder;">ĐĂNG KÝ KHÁM BỆNH</h1>
        <form method="POST" action="dangkylichkham.php">
            <!-- Chọn dịch vụ -->
            <div class="mb-5">
                <label for="dich-vu" class="form-label mb-3">* Chọn dịch vụ</label>
                <select id="dich-vu" class="form-select mb-5" name="dichvu" onchange="this.form.submit()" required>
                    <option value="" disabled selected>Chọn dịch vụ</option>
                    <option value="1" <?php echo (isset($_POST['dichvu']) && $_POST['dichvu'] == '1') ? 'selected' : ''; ?>>Khám trong giờ</option>
                    <option value="2" <?php echo (isset($_POST['dichvu']) && $_POST['dichvu'] == '2') ? 'selected' : ''; ?>>Khám ngoài giờ</option>
                </select>
            </div>

            <!-- Chọn chuyên khoa -->
            <div class="mb-5">
                <label for="chuyen-khoa" class="form-label mb-3">* Chọn chuyên khoa</label>
                <select id="chuyen-khoa" class="form-select mb-5" name="khoa" onchange="this.form.submit()" required>
                    <option value="" disabled selected>Chọn chuyên khoa</option>
                    <?php
                    include_once("../../controller/cKhoa.php");
                    $p = new cKhoa();
                    $tbl = $p->layDSKhoa();
                    if (!$tbl) {
                        echo "<option>Không thể kết nối cơ sở dữ liệu</option>";
                    } elseif ($tbl == -1) {
                        echo "<option>Chưa có dữ liệu</option>";
                    } else {
                        while ($row = $tbl->fetch_assoc()) {
                            $selected = (isset($_POST['khoa']) && $_POST['khoa'] == $row['maKhoa']) ? 'selected' : '';
                            echo "<option value='{$row["maKhoa"]}' $selected>{$row["tenKhoa"]}</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- Chọn bác sĩ -->
            <div class="mb-5">
                <label for="bac-si" class="form-label mb-3">* Chọn bác sĩ</label>
                <select id="bac-si" class="form-select mb-5" name="bacsi" required>
                    <option value="" disabled selected>Chọn bác sĩ</option>
                    <?php
                    include_once("../../controller/cKhoa.php");
                    $p = new cKhoa();
                    if (isset($_POST['khoa']) && !empty($_POST['khoa'])) {
                        $maKhoa = $_POST['khoa'];
                        $tbl = $p->layDSBSTheoKhoa($maKhoa);
                        if (!$tbl) {
                            echo "<option value=''>Không thể kết nối</option>";
                        } elseif ($tbl == -1) {
                            echo "<option value=''>Chưa có dữ liệu</option>";
                        } else {
                            while ($row = $tbl->fetch_assoc()) {
                                echo "<option value='{$row["maNhanVien"]}'>{$row["hoTen"]}</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- Chọn ngày khám -->
            <div class="mb-5">
                <label for="ngay-kham" class="form-label mb-3">* Chọn ngày muốn khám</label>
                <input type="date" id="ngay-kham" name="ngay_kham" class="form-control mb-5" style="height: 40px;" required>
                <?php
                    include_once("../../controller/cBacSi.php");
                    $p = new cBacSi();
                    if(isset($_REQUEST['bacsi']) && !empty($_REQUEST['bacsi'])){
                        $maNhanVien = $_REQUEST['bacsi'];
                        $startDate = date('Y-m-01');
                        $endDate = date('Y-m-t');
                        $dsLichLamViec = $p->layDSLichLamViecBacSi($maNhanVien);
                        if ($dsLichLamViec) {
                            echo "<div class='date-time-row'>";
                            echo "<input type='date' name='ngay_kham' class='form-control b=mb-5' placeholder='Chọn ngày khám' style='height: 40px; required>";
                            echo "<input type='time' name='gio_kham_ket_thuc' class='form-control' placeholder='Giờ kết thúc' required>";
                            echo "</div>";
                        } else {
                            echo "<p>Không có lịch làm việc</p>";
                        }
                    }
                ?>
            </div>

            <!-- Chọn khung giờ -->
            <div class="mb-5">
                <label for="gio-kham" class="form-label mb-3">* Chọn khung giờ muốn khám</label>
                <select id="gio-kham" class="form-select mb-5" name="giokham" required>
                    <option value="" disabled selected>Chọn khung giờ muốn khám</option>
                    <?php
                    if (isset($_POST['dichvu']) && !empty($_POST['dichvu'])) {
                        $dichvu = $_POST['dichvu'];
                        if ($dichvu == '1') {
                            echo "<option value='1'>Sáng</option>";
                            echo "<option value='2'>Trưa</option>";
                            echo "<option value='3'>Chiều</option>";
                        } elseif ($dichvu == '2') {
                            echo "<option value='4'>16:00-19:00</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            <!-- Mô tả vấn đề sức khỏe -->
            <div class="mb-5">
                <label for="suc-khoe" class="form-label">* Nhập vấn đề sức khỏe cần khám</label>
                <textarea id="suc-khoe" name="suc_khoe" class="form-control" rows="5" placeholder="Nhập tình trạng sức khỏe của bạn, câu hỏi dành cho bác sĩ và các vấn đề sức khỏe cần khám" required></textarea>
            </div>

            <!-- Nút bấm -->
            <div class="btn-container text-center justify-content-around">
                <button type="submit" name="dangky" class="btn btn-primary">ĐĂNG KÝ</button>
                <button type="reset" name="huy" class="btn btn-secondary">HỦY</button>
            </div>
        </form>


    </div>
</body>

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
</html>