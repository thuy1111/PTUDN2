<?php
session_start();

if (isset($_SESSION['user'][0])) {
    $maNhanVien = $_SESSION['user'][0];
    $tenNhanVien = $_SESSION['user'][1];
    $maChucVu = $_SESSION['user'][2];
    
    if ($maChucVu != 3) {
        echo "<script>alert('Bạn không có quyền truy cập vào trang này!');</script>";
        echo "<script>window.location.href = '../../index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Vui lòng đăng nhập để truy cập!');</script>";
    echo "<script>window.location.href = '../dangnhap';</script>";
    exit();
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
            <?php include('../../assets/inc/sidebar.php');?>
            <!-- Left Sidebar End -->

            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="col-12">
                                    <div class="page-title-box">
                                        <h4 class="page-title">Trang Quản Lý </h4>
                                        <p>Chào mừng bạn, nhân viên: <strong><?php echo $ten; ?></strong></p>
                                    </div>
                                </div>
                        </div>
                
                
            </main>

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
        
    </body>

</html>