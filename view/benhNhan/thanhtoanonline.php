<?php
    if(isset($_SESSION['maBenhNhan'])){
        $maBenhNhan = $_SESSION['maBenhNhan'];
        include_once('../../controller/cBenhNhan.php');
        $p = new cBenhNhan();
    }
    else{
        header('Location: /QuanLyBenhVien/login');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý khám chữa bệnh bệnh viện</title>
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<style>
/* Body styling */
body {
    font-family: Arial, sans-serif;
    background-color: #e9f8f8;
}

/* Header styling */
.header {
    background-color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 50px; /* Tăng khoảng cách với lề trái/phải */
    border-bottom: 1px solid #ddd;
}

.header img {
    height: 40px;
    margin-right: 25px; /* Cách logo ra khỏi menu */
}

.header nav a {
    margin: 0 15px; /* Giảm khoảng cách giữa các mục menu để cân đối */
    color: #333;
    text-decoration: none;
    font-weight: bold;
}

.header .users {
    display: flex;
    align-items: center;
    margin-left: 25px; /* Cách phần tài khoản ra khỏi menu */
}

.header .user img {
    border-radius: 50%;
    width: 35px;
    height: 35px;
}

/* Dropdown menu styling */
.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: -40px; /* Điều chỉnh để dropdown gần với phần tài khoản hơn */
    z-index: 1000;
    min-width: 160px;
    padding: 0.5rem 0;
    margin: 0;
    font-size: 1rem;
    color: #333;
    text-align: left;
    list-style: none;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 0.25rem;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Thêm đổ bóng nếu cần */
}

/* Hiển thị dropdown khi hover vào phần tài khoản */
.dropdown:hover .dropdown-menu {
    display: block;
}

/* Note section styling */
.note {
    width: 750px;
    height: 100px;
    background-color: #A9E6F0;
    border-radius: 10px;
    padding: 15px;
}

/* Container custom styling */
.container-custom {
    max-width: 1300px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Section title styling */
.section-title {
    color: #333;
    margin-top: 20px;
    font-weight: bold;
}

/* Information sections styling */
.transfer-info, .summary, .qr-section {
    background-color: #f0f8ff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
}

.transfer-info, .qr-section, .summary {
    height: 100%;
}

.qr-section img {
    width: 200px;
    height: 200px;
    display: block;
    margin: 0 auto 10px;
}

/* Cancel button styling */
.cancel-button {
    width: 100px;
    padding: 10px;
    text-align: center;
    color: #fff;
    background-color: #5bc0de;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
}

.cancel-button:hover {
    background-color: #31b0d5;
}

</style>

<div class="header">
    <img class="logo" src="../../assets/images/logo/hospital.png" alt="Hospital Logo">
    <nav>
        <a href="#">Giới Thiệu</a>
        <a href="#">Chuyên Khoa</a>
        <a href="#">Bác Sĩ</a>
        <a href="#">Dịch Vụ</a>
        <a href="#">Liên Hệ</a>
    </nav>

<!--User account-->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" href="#" role="button" onclick="toggleDropdown()">
                    <img src="../../assets/images/users/defaultimg.jpg" alt="dpic" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                        <i class="mdi mdi-chevron-down"></i> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <a href="#" class="dropdown-item notify-item">
                        <i class="fas fa-user"></i>
                        <span>Tài khoản của tôi</span>
                    </a>

                    <a href="#" class="dropdown-item notify-item">
                        <i class="fas fa-user-tag"></i>
                        <span>Cập nhật tài khoản</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="#" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Đăng xuất</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="container-custom">
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
            <div class="transfer-info flex-grow-1">
                <h5 class="text-center"><strong>THÔNG TIN CHUYỂN KHOẢN</strong></h5>
                <p><strong>Tài khoản:</strong> NGUYEN ANH</p>
                <p><strong>Ngân hàng:</strong> TECHCOMBANK</p>
                <p><strong>Số tài khoản:</strong> 1231234567</p>
                <p><strong>Nội dung:</strong> LK.05.2023</p>
                <p><strong>Số tiền:</strong> 550.000 VND</p>
                <div class="d-flex justify-content-between">
                    <p style="width: 350px; height:60px; padding: 5px; background-color: #F5F5F5;"><em style="font-size: 14px;">Lưu ý: Vui lòng kiểm tra nội dung chuyển khoản trước khi thực hiện thanh toán</em></p>
                    <div class="text-center" style="width: 100px; height: 100px;">
                        <img src="../../assets/images/patient/cloud-upload_5206589.png" alt="iconUpload" style="width:50px; height:50px;">
                        <p><em style="font-size: 12px;">Upload hóa đơn</em></p>
                    </div>
                </div>
            </div>
            <div class="qr-section ms-3">
                <img src="../../assets/images/patient/barcode_14021414.png" alt="QR Code">
                <p class="text-center">Mã QR thanh toán tự động</p>
                <p class="text-center"><strong>Đang chờ thanh toán</strong></p>
            </div>
        </div>

        <!-- Summary Information -->
        <div class="col-md-4">
            <div class="summary">
                <h6 class="text-center"><strong>THÔNG TIN THANH TOÁN LỊCH KHÁM</strong></h6>
                <p><strong>Họ tên khách hàng:</strong> Nguyễn Văn A</p>
                <p><strong>Số điện thoại:</strong> 0355615214</p>
                <p><strong>Dịch vụ khám:</strong> Tai mũi họng</p>
                <p><strong>Số lượng:</strong> 1</p>
                <p><strong>Đơn giá:</strong> 550.000 VND</p>
                <hr style="height: 5px; background: teal;"/>
                <p><strong>Tổng tiền:</strong> 550.000 VND</p>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button class="cancel-button">HỦY</button>
    </div>
</div>
<?php include("../../assets/inc/footer.php");?>
</body>
</html>


<?php
if(isset($_SESSION['maBenhNhan']) && $_SESSION['btnPayment'] ){
    include_once('thanhtoanonline.php');
}
?>

<?php
    if(isset($_SESSION['maBenhNhan']) && $_SESSION['maLichKham']){
        $maBenhNhan = $_SESSION['maBenhNhan'];
        $maLichKham = $_SESSION['maLichKham'];
        $p->layThongTinLichKham($maBenhNhan, $maLichKham);
        if($tbl){
            if($tbl->num_rows > 0){
                $row = $tbl->fetch_assoc();
                $ngayKham = $row['ngayKham'];
                $tienKham = $row['tienKham'];
            }
            else{
                echo '<script>alert("Không có dữ liệu trong bảng");</script>';
            }
        }
        else{
            echo '<script>alert("Lỗi truy vấn");</script>';
        }
    }
    else{
        header('Location: /QuanLyBenhVien/login');
    }
?>