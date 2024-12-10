<?php
include_once("../../controller/cUser.php");
session_start();

// Kiểm tra xem nhân viên đã đăng nhập chưa
if (isset($_SESSION["user"][0])) {
    $maNV = $_SESSION["user"][0];
    $role = $_SESSION["user"][2]; // Lấy vai trò của nhân viên từ session
    $ten = $_SESSION["user"][1]; // Lấy tên nhân viên từ session

    // Chỉ cho phép nhân viên kế toán truy cập (role = 6)
    if ($role !== '6') {
        echo "<script>alert('Bạn không có quyền truy cập!');window.location.href = '../dangNhap/';</script>";
        exit();
    }
} else {
    // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    echo "<script>alert('Vui lòng đăng nhập!');window.location.href = '../dangNhap/';</script>";
    exit();
}

// Xử lý điều hướng dựa trên action
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'thong_ke_khoa':
            header("Location: thongkedoanhthutheokhoa.php");
            exit();

        case 'thong_ke_thoi_gian':
            header("Location: thongkedoanhthutheoloaithoigian.php");
            exit();

        case 'phan_phong_kham':
            header("Location: phanphongkham.php");
            exit();

        default:
            echo "<script>alert('Chức năng không hợp lệ!');window.location.href = 'index.php';</script>";
            exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    
    <!--Head Code-->
    <?php include("../../assets/inc/head.php");?>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <?php include('../../assets/inc/nav.php');?>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">
                            <li>
                                <a href="index.php">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                                
                            </li>

                            <li>
                            <a href="thongkedoanhthu.php" style="text-decoration:none;">
                                <i class="fas fa-chart-line"></i>
                                <span>Thống kê doanh thu</span>
                                <span class="menu-arrow"></span>
                            </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!-- <li>
                                        <a href="thongketongdoanhthu.php">Tổng doanh thu</a>
                                    </li> -->
                                    <li>
                                        <a href="thongkedoanhthutheoloaithoigian.php">Theo loại thời gian</a>
                                    </li>
                                    <li>
                                        <a href="thongkedoanhthutheokhoa.php">Theo khoa</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="phanphongkham.php">
                                    <i class="mdi mdi-hospital-building"></i>
                                    <span>Phân số thứ tự, phòng khám</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <!-- Start Content -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Trang Quản Lý - Nhân Viên Kế Toán</h4>
                                <p>Chào mừng bạn, nhân viên: <strong><?php echo $ten; ?></strong></p>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12 text-center">
                            <a href="index.php?action=thong_ke_thoi_gian" class="btn btn-success mx-2">Thống Kê Doanh Thu</a>
                            <a href="index.php?action=phan_phong_kham" class="btn btn-primary mx-2">Phân Số Thứ Tự, Phòng Khám</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Hướng Dẫn Sử Dụng</h5>
                                    <p class="card-text">Sử dụng các nút chức năng phía trên để thực hiện các tác vụ liên quan đến thống kê doanh thu và phân phòng khám, số thứ tự.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Vendor js -->
        <script src="../../assets/js/vendor.min.js"></script>
        <!-- Plugins js-->
        <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="../../assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>

        <!--Chart js-->
        <script src="../../assets/js/Chart.min.js"></script>

        <!--Jquery js-->
        <script src="../../assets/js/vendor/jquery-3.7.1.min.js"></script>
    </body>

</html>