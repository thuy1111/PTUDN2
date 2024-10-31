<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống quản lý khám chữa bệnh bệnh viện</title>
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">
    <link href="../../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/thanhtoan.css">
</head>
<body>

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
    <div class="users navbar-custom">
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

<script>
    function toggleDropdown() {
        const dropdownMenu = document.querySelector('.profile-dropdown');
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
    }

    // Close Dropdown when clicking out
    window.onclick = function(event) {
        if (!event.target.matches('.nav-user')) {
            const dropdowns = document.getElementsByClassName("profile-dropdown");
            for (let i = 0; i < dropdowns.length; i++) {
                const openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    }
</script>


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
                <hr></hr>
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
