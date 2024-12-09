<?php
    include_once ("../../controller/cBacSi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../../assets/inc/head.php"); ?>
    <style>
       
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }
        
    </style>
</head>
<body>
    <!-- Begin Page Wrapper -->
    <div id="wrapper">
        <!-- Topbar Section -->
        <?php include('../../assets/inc/nav.php'); ?>

        <!-- Left Sidebar Section -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <!-- Sidebar Menu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichkham.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                        <li><a href="javascript: void(0);"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                    </ul>
                </div>
                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End Left Sidebar -->

        <!-- Main Content Section -->
        <div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span></a></li>
                        <li><a href="xemlichkham.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span></a></li>
                        <li><a href="dangkicalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span></a></li>
                        <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <!-- Page Title -->
                    <?php include_once("dkllv.php"); ?>
            </div>
        </div>

    <!-- Footer -->
    <footer>
        
    </footer>
</div>

<!-- Scroll to Top Button -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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

