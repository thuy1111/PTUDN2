<?php
    session_start();

    // Check if the user is logged in and if they are not a doctor (you can change the logic based on your requirement)
    if (!isset($_SESSION['user']) || !isset($_SESSION['user'][2]) || $_SESSION['user'][2] != 1) {
        echo "<script>
            alert('Bạn không có quyền truy cập!');
            window.location.href = '../dangNhap';
        </script>";
        exit; // To ensure the page stops here if the user is not authorized
    }
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
                            <li><a href="xemlichkham.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                            <li><a href="dangkicalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                            <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="main-content">
            <?php
            $p = isset($_GET["p"]) ? $_GET["p"] : "trangchu";

            if ($p != "trangchu") {
                include_once($p . ".php");
            } else {
                echo "<div class='px-6 py-4 rounded shadow-md w-full'>
                        <div class='text-xl font-bold mb-4 pb-3 border-b border-black'>TRANG CHỦ</div>
                    </div>";
                include_once("index.php");
            }
            ?>
        </div>
            
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
