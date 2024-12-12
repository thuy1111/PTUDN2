<?php
error_reporting(0);
include_once("../../controller/cCustomer.php");
include_once("../../controller/cBenhNhan.php");

session_start();

// Kiểm tra xem khách hàng đã đăng nhập chưa
if (isset($_SESSION["customer"][0])) {
    $maBN = $_SESSION["customer"][0]; // Mã bệnh nhân
    $ten = $_SESSION["customer"][1]; // Tên bệnh nhân
} else {
    // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    echo "<script>alert('Vui lòng đăng nhập để tiếp tục!'); window.location.href = '../dangNhap/';</script>";
    exit();
}

$p = new cBenhNhan();

// Kiểm tra nếu người dùng gửi yêu cầu đăng ký lịch khám
if (isset($_POST['dangky'])) {
    // Lấy dữ liệu từ form
    $maBenhNhan = $maBN;
    $maLichKham = time(); // Tạo mã lịch khám dựa trên timestamp
    $ngayKham = $_POST['ngay_kham'] ?? '';
    $gioKham = $_POST['giokham'] ?? '';
    $vanDeKham = $_POST['vande'];
    $dichVu = $_POST['dichvu'] ?? '';
    $maBacSi = $_POST['bacsi'] ?? '';
    $maKhoa = $_POST['khoa'] ?? '';

    // Kiểm tra dữ liệu đầu vào
    if (empty($ngayKham) || empty($gioKham) || empty($dichVu) || empty($vanDeKham) || empty($maBacSi) || empty($maKhoa)) {
        echo "<script>alert('Vui lòng chọn đầy đủ thông tin trước khi đăng ký!');</script>";
    } else {
        // Xác định tiền khám dựa trên loại dịch vụ
        $tienKham = ($dichVu == 1) ? 200000 : 400000;

        // Gọi hàm cập nhật lịch khám
        $result = $p->capNhatLichKham($maLichKham, $ngayKham, $gioKham, $vanDeKham, $tienKham, $maBacSi, $maBenhNhan, $maKhoa);

        if ($result) {
            // Hiển thị thông báo đặt lịch thành công và sau đó điều hướng sang trang thanh toán
            echo "
            <script>
                alert('Đặt lịch khám thành công! Bạn sẽ được chuyển đến trang thanh toán trong giây lát.');
                setTimeout(function() {
                    // Tạo một form ẩn để chuyển dữ liệu qua POST
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = 'thanhtoan_vnp.php';
                    
                    var maLichKhamInput = document.createElement('input');
                    maLichKhamInput.type = 'hidden';
                    maLichKhamInput.name = 'maLichKham';
                    maLichKhamInput.value = '$maLichKham';
                    form.appendChild(maLichKhamInput);
                    
                    var tienKhamInput = document.createElement('input');
                    tienKhamInput.type = 'hidden';
                    tienKhamInput.name = 'tienKham';
                    tienKhamInput.value = '$tienKham';
                    form.appendChild(tienKhamInput);
                    
                    document.body.appendChild(form);
                    form.submit();
                }, 1000); // Chờ 1 giây trước khi chuyển hướng
            </script>";
        } else {
            echo "<script>alert('Đăng ký lịch khám thất bại. Vui lòng thử lại sau!');</script>";
        }
    }
}
?>

<?php
if (isset($_POST['huy'])) {
    // Hủy bỏ toàn bộ dữ liệu trong $_POST
    $_POST = [];
}
?>

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
    <link rel="stylesheet" href="../../assets/css/dropdown.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .form-container {
            max-width: 700px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-container label {
            font-weight: bold;
            font-size: 1.7rem;
        }

        .form-container select,
        .form-container input {
            background-color: rgba(255, 255, 255, 0.8);
            color: #000;
            font-size: 1.5rem;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 30%;
            font-weight: bold;
            background-color: #0056b3;
            border: none;
            font-size: 1.7rem;
            color: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #004494;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
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
                                        <li class="dropdown">
                                        <a class="dropbtn" href="#">Chức năng</a>
                                        <div class="dropdown-content">
                                            <a href="dangkylichkham.php">Đăng ký lịch khám</a>
                                            <a href="xemlichkham.php">Xem Lịch Khám</a>
                                            <a href="xemphieukham.php">Xem Phiếu Khám Bệnh</a>
                                        </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="header-right-btn f-right d-none d-lg-block ml-30">
                                <?php if (isset($tenBenhNhan)) { ?>
                                    <div class="dropdown">
                                        <button class="btn header-btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php echo htmlspecialchars($tenBenhNhan); ?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <li><a class="dropdown-item" href="../dangxuat/">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                <?php } else { ?>
                                    <a href="../dangNhap/" class="btn header-btn">Đăng nhập</a>
                                <?php } ?>
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
            <option value="0" disabled selected>Chọn dịch vụ</option>
            <option value="1" <?php echo (isset($_POST['dichvu']) && $_POST['dichvu'] == '1') ? 'selected' : ''; ?>>Khám trong giờ</option>
            <option value="2" <?php echo (isset($_POST['dichvu']) && $_POST['dichvu'] == '2') ? 'selected' : ''; ?>>Khám ngoài giờ</option>
        </select>
    </div>

    <!-- Chọn chuyên khoa -->
    <div class="mb-5">
        <label for="chuyen-khoa" class="form-label mb-3">* Chọn chuyên khoa</label>
        <select id="chuyen-khoa" class="form-select mb-5" name="khoa" onchange="this.form.submit()" required>
            <option value="0" disabled selected>Chọn chuyên khoa</option>
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
        <?php
            if((!isset($_REQUEST['khoa'])) && $_REQUEST['khoa'] == 0){
                echo "<div class='alert alert-danger'>Vui lòng chọn khoa trước</div>";
            }
        ?>
        <select id="bac-si" class="form-select mb-5" name="bacsi" onchange="this.form.submit()" required>
            <option value="0" disabled selected>Chọn bác sĩ</option>
            <?php
            if (isset($_POST['khoa']) && !empty($_POST['khoa'])) {
                $maKhoa = $_POST['khoa'];
                $tbl = $p->layDSBSTheoKhoa($maKhoa);
                if (!$tbl) {
                    echo "<option value=''>Không thể kết nối</option>";
                } elseif ($tbl == -1) {
                    echo "<option value=''>Chưa có dữ liệu</option>";
                } else {
                    while ($row = $tbl->fetch_assoc()) {
                        $selected = (isset($_POST['bacsi']) && $_POST['bacsi'] == $row['maNhanVien']) ? 'selected' : '';
                        echo "<option value='{$row["maNhanVien"]}' $selected>{$row["hoTen"]}</option>";
                    }
                }
            }
            ?>
        </select>
    </div>

    <!-- Chọn ngày khám -->
    <div class="mb-5">
        <label for="ngay-kham" class="form-label mb-3">* Chọn ngày muốn khám</label>
        <?php
            if((!isset($_REQUEST['bacsi'])) && $_REQUEST['bacsi'] == 0){
                echo "<div class='alert alert-danger'>Vui lòng chọn bác sĩ trước</div>";
            }
        ?>
        <select name='ngay_kham' class='form-select mb-5' onchange='this.form.submit()' required>
            <option value="0" disabled selected>* Chọn ngày khám</option>
            <?php
            include_once("../../controller/cBacSi.php");
            $p = new cBacSi();
            
            // Kiểm tra xem có bác sĩ nào được chọn không
            if (isset($_POST['bacsi']) && !empty($_POST['bacsi'])) {
                $maNhanVien = $_POST['bacsi'];
                $dsLichLamViec = $p->layLichLamViecTheoBS($maNhanVien);
                
                if ($dsLichLamViec && $dsLichLamViec->num_rows > 0) {
                    // Nếu có lịch làm việc, hiển thị các ngày
                    while ($row = $dsLichLamViec->fetch_assoc()) {
                        $selected = (isset($_POST['ngay_kham']) && $_POST['ngay_kham'] == $row['ngayLamViec']) ? 'selected' : '';
                        echo "<option value='{$row["ngayLamViec"]}' $selected>{$row["ngayLamViec"]}</option>";
                    }
                } else {
                    // Nếu không có lịch làm việc, hiển thị thông báo
                    echo "<option value='' disabled>Không có ngày làm việc cho bác sĩ này</option>";
                }
            }
            ?>
        </select>
    </div>

    <!-- Chọn khung giờ -->
    <div class="mb-5">
        <label for="gio-kham" class="form-label mb-3">* Chọn khung giờ muốn khám</label>
        <?php
            if((!isset($_REQUEST['ngay_kham'])) && $_REQUEST['ngay_kham'] == 0){
                echo "<div class='alert alert-danger'>Vui lòng chọn ngày khám trước</div>";
            }
        ?>
        <select id="gio-kham" class="form-select mb-5" name="giokham" required>
            <option value="0" disabled selected>* Chọn khung giờ muốn khám</option>
            <?php
                include_once("../../controller/cBacSi.php");
                $p = new cBacSi();
                
                if (isset($_POST['ngay_kham'], $_POST['bacsi'], $_POST['dichvu']) && !empty($_POST['ngay_kham'])) {
                    $maBS = $_POST['bacsi'];
                    $ngayKham = $_POST['ngay_kham'];
                    $dichVu = $_POST['dichvu'];
                    
                    // Lấy thông tin ca làm việc của bác sĩ
                    $tbl = $p->layCaLamViecTheoNgay($maBS, $ngayKham);
                    if ($tbl && $tbl->num_rows > 0) {
                        // Hiển thị các khung giờ dựa trên dịch vụ đã chọn
                        while ($row = $tbl->fetch_assoc()) {
                            if ($dichVu == '1') { // Khám trong giờ
                                if ($row['caLamViec'] == 'Ca 1') {
                                    echo "<option value='7:30 - 11:30'>Sáng: 7:30 - 11:30</option>";
                                } elseif ($row['caLamViec'] == 'Ca 2') {
                                    echo "<option value='13:30 - 17:30'>Chiều: 13:30 - 17:30</option>";
                                }
                            } elseif ($dichVu == '2') { // Khám ngoài giờ
                                if ($row['caLamViec'] == 'Ca 3') {
                                    echo "<option value='18:30 - 21:30'>Tối: 18:30 - 21:30</option>";
                                }
                            }
                        }
                    } else {
                        // Nếu không có ca làm việc, hiển thị thông báo
                        echo "<div class='alert alert-warning mt-3'>Không có ca làm việc nào được tìm thấy.</div>";
                    }
                } else {
                    // Nếu chưa chọn đủ thông tin, hiển thị thông báo
                    echo "<div class='alert alert-warning mt-3'>Vui lòng chọn đầy đủ thông tin.</div>";
                }
            ?>
        </select>

    </div>

    <div class="mb-6">
        <label for="vande" class="form-label mb-3">Vấn đề cần khám</label>
        <textarea id="vande" class="form-control" name="vande" rows="5"><?php echo $vanDeKham; ?></textarea>
    </div>

    <!-- Nút bấm -->
    <div class="mt-20 btn-container">
        <button type="submit" name="dangky" class="btn btn-primary">ĐĂNG KÝ</button>
        <button type="submit" name="huy" class="btn btn-secondary">HỦY</button>
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