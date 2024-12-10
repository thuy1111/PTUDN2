<?php
include_once("../../controller/cUser.php");
include_once("../../controller/cCustomer.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem nhân viên hoặc khách hàng đã đăng nhập chưa
$maNV = $ten = $role = $maBN = $tenBN = null;

if (isset($_SESSION["user"]) && isset($_SESSION["user"][0])) {
    $maNV = $_SESSION["user"][0];
    $ten = $_SESSION["user"][1];
    $role = $_SESSION["user"][2];
} elseif (isset($_SESSION["customer"]) && isset($_SESSION["customer"][0])) {
    $maBN = $_SESSION["customer"][0];
    $tenBN = $_SESSION["customer"][1];
}
?>

<style>
.nav-user {
    display: flex;
    align-items: center;
    font-size: 14px;
    color: #333;
}

.nav-user img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.pro-user-name {
    font-weight: 600;
    margin-left: 5px;
}

.profile-dropdown {
    min-width: 200px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.profile-dropdown .notify-item {
    display: flex;
    align-items: center;
    font-size: 14px;
    padding: 10px 15px;
}

.profile-dropdown .notify-item i {
    margin-right: 10px;
}

.profile-dropdown .dropdown-header {
    background-color: #f8f9fa;
    font-size: 14px;
    font-weight: bold;
    padding: 10px 15px;
}
</style>

<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="../../assets/images/users/defaultimg.jpg" alt="User Image" class="rounded-circle">
                <span class="pro-user-name ml-1">
                    <?php
                    if ($ten) {
                        echo htmlspecialchars($ten, ENT_QUOTES, 'UTF-8');
                    } elseif ($tenBN) {
                        echo htmlspecialchars($tenBN, ENT_QUOTES, 'UTF-8');
                    }
                    ?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
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
                <a href="../dangXuat/" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Đăng xuất</span>
                </a>
            </div>
        </li>
    </ul>
    <div class="logo-box">
        <a href="#" class="logo text-center">
            <img src="../../assets/images/logo/logo_main.png" alt="Logo" height="50">
        </a>
    </div>
    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
            <button class="button-menu-mobile waves-effect waves-light">
                <i class="fe-menu"></i>
            </button>
        </li>
    </ul>
</div>
