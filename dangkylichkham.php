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
            width: 50%;
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
<>
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
<body>
<div class="form-container">
        <h1 class="text-center mb-20" style="color: #0056b3; font-weight: bolder;">ĐĂNG KÝ KHÁM BỆNH</h1>
        <form>
            <div class="mb-5">
                <label for="chuyen-khoa" class="form-label mb-3">* Chọn chuyên khoa</label>
                <select id="chuyen-khoa" class="form-select mb-5" required>
                    <option value="" disabled selected>Chọn chuyên khoa</option>
                    <option value="khoa1">Khoa Nội</option>
                    <option value="khoa2">Khoa Ngoại</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="bac-si" class="form-label mb-3">* Chọn bác sĩ</label>
                <select id="bac-si" class="form-select mb-5" required>
                    <option value="" disabled selected>Chọn bác sĩ</option>
                    <option value="bacsi1">Bác sĩ A</option>
                    <option value="bacsi2">Bác sĩ B</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="ngay-kham" class="form-label mb-3">* Chọn ngày muốn khám</label>
                <input type="date" id="ngay-kham" class="form-control mb-5" style = "height: 40px;"required>
            </div>

            <div class="mb-5">
                <label for="ngay-kham" class="form-label mb-3">* Chọn giờ muốn khám</label>
                <input type="time" id="gio-kham" class="form-control mb-5" style = "height: 40px;" required>
            </div>

            <div class="mb-5">
                <label for="suc-khoe" class="form-label">* Nhập vấn đề sức khỏe cần khám</label>
                <textarea id="suc-khoe" class="form-control" rows="5" placeholder="Nhập tình trạng sức khỏe của bạn, câu hỏi dành cho bác sĩ và các vấn đề sức khỏe cần khám" required></textarea>
            </div>

            <div class="btn-container text-center">
                <button type="submit" class="btn btn-primary">ĐĂNG KÝ</button>
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

    <?php
    // Cấu hình kết nối cơ sở dữ liệu
    $servername = "localhost";
    $username = "root"; // thay bằng username của bạn
    $password = ""; // thay bằng password của bạn
    $dbname = "hospital_db"; // tên database bạn đã import

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname, 3305);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Xử lý khi form được gửi
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $department = $_POST['department'];
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $notes = $_POST['notes'];

        // Lưu thông tin đăng ký vào cơ sở dữ liệu
        $sql = "INSERT INTO appointments (department_id, doctor_id, date, time, notes)
                VALUES ('$department', '$doctor', '$date', '$time', '$notes')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Đăng ký thành công!</p>";
        } else {
            echo "<p>Lỗi: " . $conn->error . "</p>";
        }
    }
    ?>

    <h1>Đăng Ký Khám Bệnh</h1>
    <form method="POST" action="">
        <!-- Chọn chuyên khoa -->
        <label for="department">Chọn chuyên khoa:</label>
        <select name="department" id="department" required>
            <option value="">Chọn chuyên khoa</option>
            <?php
            $sql = "SELECT id, name FROM departments";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>
        <br>

        <!-- Chọn bác sĩ -->
        <label for="doctor">Chọn bác sĩ:</label>
        <select name="doctor" id="doctor" required>
            <option value="">Chọn bác sĩ</option>
            <?php
            $sql = "SELECT id, name FROM doctors";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>
        <br>

        <!-- Chọn ngày -->
        <label for="date">Chọn ngày muốn khám:</label>
        <input type="date" name="date" id="date" required>
        <br>

        <!-- Chọn giờ -->
        <label for="time">Chọn giờ muốn khám:</label>
        <input type="time" name="time" id="time" required>
        <br>

        <!-- Ghi chú -->
        <label for="notes">Nhập vấn đề sức khỏe cần khám:</label>
        <textarea name="notes" id="notes" placeholder="Nhập tình trạng sức khỏe..." required></textarea>
        <br>

        <!-- Nút đăng ký -->
        <button type="submit">Đăng ký</button>
    </form>

    <?php
    // Đóng kết nối
    $conn->close();
    ?>
</body>
</html>