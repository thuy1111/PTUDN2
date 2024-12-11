<?php
    session_start();

    if (!isset($_SESSION['user']) || !isset($_SESSION['user'][2]) || $_SESSION['user'][2] != 2) {
        echo "<script>alert('Vui lòng đăng nhập với tài khoản Y tá!'); window.location.href = '../dangNhap/';</script>";
        exit();
    }
        include_once ("../../controller/cYTa.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Lịch Khám</title>

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
                            <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                            <li><a href="dangkicalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                            <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Trang Quản Lý - Y tá</h4>
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
