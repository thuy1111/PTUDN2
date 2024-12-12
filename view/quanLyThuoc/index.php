<?php
session_start();

if (isset($_SESSION['user'][0])) {
    $maNhanVien = $_SESSION['user'][0];
    $tenNhanVien = $_SESSION['user'][1];
    $maChucVu = $_SESSION['user'][2];
    
    if ($maChucVu != 5) {
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
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Head Resources -->
    <?php include("../../assets/inc/head.php"); ?>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
<div id="wrapper">
    <?php include('../../assets/inc/nav.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="left-side-menu">
                <div class="slimscroll-menu">
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                            <li><a href="quanlythuoc.php"><i class="fas fa-user-tie"></i><span>Quản lý thông tin thuốc</span><span class="menu-arrow"></span></a></li>
                            <li><a href="xulythuoc.php"><i class="mdi mdi-hospital-building"></i><span>Xử lý đơn thuốc</span><span class="menu-arrow"></span></a></li>
                            <li><a href="thongke.php"><i class="mdi mdi-hospital-building"></i><span>Thống kê thuốc đã kê đơn</span><span class="menu-arrow"></span></a></li>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Trang Quản Lý - Nhân viên quản lý thuốc</h4>
                                <p>Chào mừng bạn, nhân viên: <strong><?php echo $ten; ?></strong></p>
                            </div>
                        </div>
                </div>
                
                
            </main>
        </div>
    </div>

    <!-- Footer -->
    <?php include('../../assets/inc/footer.php'); ?>
</div>

<!-- Scroll to Top Button -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

</body>
</html>
