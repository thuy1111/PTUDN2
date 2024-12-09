
<?php
error_reporting(1);
session_start();

if (!isset($_SESSION["loginBN"]))
    echo "<script>
        if (alert('Bạn không có quyền truy cập!') != false)
            window.location.href = '../dangNhap';
    </script>";
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
        <!-- Topbar -->
        <?php include('../../assets/inc/nav.php'); ?>

        <div class="container-fluid">
            <div class="row">
                
                <!-- Sidebar -->
                <div class="left-side-menu">
            <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href=".php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichkham.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                        <li><a href="dangkylichkhambenh.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký Lịch Khám</span><span class="menu-arrow"></span></a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
            <div class="w-3/4 flex justify-between">
                <?php
                $p = "";

                if (isset($_GET["p"])) {
                    $p = $_GET["p"];
                } else $p = "trangchu";

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

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const navlinks = document.querySelectorAll(".navbar a");
                let idActive = "trangchu";

                navlinks.forEach(function(item) {
                    item.addEventListener("click", () => {
                        navlinks.forEach((i) => i.classList.remove("font-bold"));
                    });
                });

                if (window.location.search != "")
                    idActive = window.location.search.slice(3);

                window.addEventListener("load", () => {
                    navlinks.forEach(function(item) {
                        if (item.id == idActive) item.classList.add("font-bold");
                        else item.classList.remove("font-bold");
                    });
                });

            });
        </script>
</body>

</html>