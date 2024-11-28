<?php
include_once("../../controller/cPhieuKham.php");
$controller = new cPhieuKhamBenh();

// Lấy từ khóa tìm kiếm từ URL
$keyword = isset($_GET['search']) ? $_GET['search'] : "";

// Lấy danh sách phiếu khám bệnh (có tìm kiếm nếu có từ khóa)
$dsPKB = $controller->hienThiDanhSachPKB($keyword);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu Khám Bệnh</title>

    <!-- Include Head Resources -->
    <?php include("../../assets/inc/head.php"); ?>

    <style>
        /* Custom styles for shift registration page */
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <!-- Topbar -->
        <?php include('../../assets/inc/nav.php'); ?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <div class="left-side-menu">
                    <div class="slimscroll-menu">
                        <div id="sidebar-menu">
                            <ul class="metismenu" id="side-menu">
                                <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                                <li><a href="javascript: void(0);"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                                <li><a href="xemlichkham.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                                <li><a href="dangkicalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                                <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                

        <!-- Footer -->
        <footer>
            <!-- You can add footer content here -->
        </footer>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts -->
    <script src="../../assets/js/vendor.min.js"></script>
    <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../../assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
    <script src="../../assets/js/pages/dashboard-1.init.js"></script>
    <script src="../../assets/js/app.min.js"></script>
</body>

</html>
