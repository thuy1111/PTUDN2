<?php
include_once("controller/cBenhNhan.php");
$p = new cBenhNhan();
if (isset($_SESSION['maBenhNhan']) && isset($_GET['maLichKham'])) {
    $maBenhNhan = $_SESSION['maBenhNhan'];
    $maLichKham = $_GET['maLichKham'];
    $tbl = $p->layThongTinLichKham($maBenhNhan, $maLichKham);
    if ($tbl) {
        if ($tbl->num_rows > 0) {
            $row = $tbl->fetch_assoc();
            $ngayKham = $row['ngayKham'];
            $tienKham = $row['giaDichVuKham'];
            $tenBenhNhan = $row['tenBenhNhan'];
            $sdt = $row['sdt'];
            $vanDe = $row['vanDeKham'];
        } else {
            echo '<script>alert("Không có dữ liệu trong bảng");</script>';
        }
    } else {
        echo '<script>alert("Lỗi truy vấn");</script>';
    }
}

?>

<?php
    if (isset($_POST['cancel'])) {
        header('Location: index.php');
        exit();
    }    
?>

<?php
    include_once("controller/cUpload.php");
    $p = new myfile();

    if (isset($_FILES['hoadon']) && $_FILES['hoadon']['error'] == 0) {
        $file_name = $_FILES['hoadon']['name'];
        $tmp_name = $_FILES['hoadon']['tmp_name'];
        $file_size = $_FILES['hoadon']['size'];
        $des = "upload";
        $allow = true;
        // Kiểm tra đuôi tệp hợp lệ
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

        if (!in_array(strtolower($file_extension), $allowed_extensions)) {
            echo "<script>alert('Chỉ chấp nhận các file hình ảnh: jpg, jpeg, png, gif');</script>";
            $allow = false;
        }

        // Kiểm tra kích thước tệp (giới hạn 5MB)
        if ($file_size > 5 * 1024 * 1024) {
            echo "<script>alert('Dung lượng file vượt quá 5MB');</script>";
            $allow = false;
        }

        // Tiến hành upload nếu hợp lệ
        if ($allow) {
            if ($p->upload($file_name, $tmp_name, $des) == 1) {
                echo "<script>alert('Upload hóa đơn thành công!');</script>";
            } else {
                echo "<script>alert('Upload thất bại, vui lòng thử lại.');</script>";
            }
        }
    }
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> Medical HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

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
</head>
<body>
<header>
    <!--? Header Start -->
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
            <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1 mt-3">
                        <div class="logo">
                            <a href="index.php"><img src="assets/images/logo/logo_main.png" alt="" width="100"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="menu-main d-flex align-items-center justify-content-end">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="index.php">Trang Chủ</a></li>
                                        <li><a href="khoa.php">Chuyên Khoa</a></li>
                                        <li><a href="bacsi.php">Bác Sĩ</a></li>
                                        <li><a href="tintuc.php">Tin Tức</a></li>
                                        <li><a href="lienhe.php">Liên Hệ</a></li>
                                        <li><a href="dangkykham.php">Đăng Ký Khám</a></li>
                                        <li><a href="thanhtoan.php">Thanh toán</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <a href="view/dangNhap/" class="btn header-btn">Đăng Nhập</a>
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
<main>
    <div class="container-custom">
        <form action ="" method="post" enctype="multipart/form-data">
            <h2 class="section-title">THANH TOÁN</h2>
            <div class="instructions">
                <p><strong>CHUYỂN KHOẢN BẰNG MÃ QR</strong></p>
                <div class="note">
                    <p>1. Mở ứng dụng ngân hàng/ví điện tử</p>
                    <p>2. Quét mã QR hoặc nhập thông tin bên dưới để chuyển khoản</p>
                </div>
            </div>

            <div class="row mt-4 justify-content-between">
                <!-- Transfer Information and QR Code -->
                <div class="col-md-7 d-flex">
                    <div class="transfer-info flex-grow-1 mr-3">
                        <h3 class="text-center"><strong>THÔNG TIN CHUYỂN KHOẢN</strong></h3>
                        <p><strong>Tài khoản:</strong> NGUYEN ANH</p>
                        <p><strong>Ngân hàng:</strong> TECHCOMBANK</p>
                        <p><strong>Số tài khoản:</strong> 1231234567</p>
                        <p><strong>Nội dung:</strong>
                            <?php 
                                echo !empty($ngayKham) 
                                    ? 'LK' . rand(1000, 9999) . $ngayKham 
                                    : 'Chưa có thông tin'; 
                            ?>
                        </p>
                        <p><strong>Số tiền:</strong><?php echo !empty($tienKham) ? $tienKham : ' Chưa có thông tin'; ?></p>
                        <div class="d-flex justify-content-between">
                            <p style="width: 350px; height:60px; padding: 5px; background-color: #F5F5F5;"><em style="font-size: 14px;">Lưu ý: Vui lòng kiểm tra nội dung chuyển khoản trước khi thực hiện thanh toán</em></p>
                            <div class="text-center" style="width: 110px; height: 110px; position: relative;">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <img src="assets/images/patient/cloud-upload_5206589.png" alt="iconUpload" style="width:50px; height:50px; display: block; margin: 0 auto;">
                                    <p><em style="font-size: 12px; color: #555;">Upload hóa đơn</em></p>
                                    <input name="hoadon" id="hoadon" type="file" style="opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer;">
                                    <button type="submit" style="width: 70px; height: 30px; background-color:#31b0d5; border: none; border-radius: 10px; font-size: 15px;">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="qr-section ms-3">
                        <img id="qr-code" src="assets/images/patient/barcode_14021414.png" alt="QR Code">
                        <p class="text-center">Mã QR thanh toán tự động</p>
                        <p class="text-center">
                            <strong>Thời gian còn lại: <span id="countdown"></span></strong>
                        </p>
                        <p class="text-center" id="status"><strong>Đang chờ thanh toán</strong></p>

                    </div>

                    <script>
                        function startCountdown(duration, display) {
                            let timer = duration, minutes, seconds;

                            const countdownInterval = setInterval(function () {
                                minutes = Math.floor(timer / 60);
                                seconds = timer % 60;

                                display.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                                if (--timer < 0) {
                                    clearInterval(countdownInterval);

                                    // Xử lý khi hết thời gian: Tạo mã QR mới
                                    document.getElementById("status").textContent = "Đã hết thời gian, đang tạo mã QR mới...";
                                    
                                    // Mô phỏng tạo lại mã QR
                                    setTimeout(() => {
                                        document.getElementById("qr-code").src = `assets/images/patient/barcode_14021414.png`;
                                        document.getElementById("status").textContent = "Đang chờ thanh toán";
                                        startCountdown(5, display); // Bắt đầu đếm ngược lại
                                    }, 2000); // Giả lập chờ 2 giây để tạo mã QR mới
                                }
                            }, 1000);
                        }

                        // Khởi tạo đếm ngược 10 phút
                        window.onload = function () {
                            const countdownDisplay = document.getElementById("countdown");
                            startCountdown(5, countdownDisplay); // 10 phút = 600 giây
                        };
                    </script>
                </div>

                <!-- Summary Information -->
                <div class="col-md-4">
                    <div class="summary">
                        <h3 class="text-center"><strong>THÔNG TIN THANH TOÁN LỊCH KHÁM</strong></h3>
                        <p><strong>Họ tên bệnh nhân:</strong><?php echo !empty($tenBenhNhan) ? $tenBenhNhan : ' Chưa có thông tin'; ?></p>
                        <p><strong>Số điện thoại:</strong><?php echo !empty($sdt) ? $sdt : ' Chưa có thông tin'; ?></p>
                        <p><strong>Vấn đề khám:</strong><?php echo !empty($vanDe) ? $vanDe : ' Chưa có thông tin'; ?></p>
                        <p><strong>Đơn giá:</strong><?php echo !empty($tienKham) ? $tienKham : ' Chưa có thông tin'; ?></p>

                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <input name="cancel" type="submit" class="cancel-button" id="cancel" value="Hủy"></input>
            </div>
        </form>
    </div>
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
    
    </body>
</html>