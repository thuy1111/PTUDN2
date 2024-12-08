<?php
session_start(); // Start session for user tracking

// Secure session check (to avoid session hijacking or fixation)
if (!isset($_SESSION['user']) || !isset($_SESSION['user'][2]) || $_SESSION['user'][2] != 1) {
    echo "<script>alert('Vui lòng đăng nhập với tài khoản bác sĩ!'); window.location.href = '../dangNhap/';</script>";
    exit();
}

// Controller file inclusion
require_once("../../controller/cBacSi.php");

// Initialize controller
$controller = new cBacSi();

// Get doctor’s employee ID from session
$maNhanVien = $_SESSION['user'][0]; // Assuming employee ID is stored at index 0 in session

// Fetch appointment list for the logged-in doctor
$dsLichKham = $controller->hienThiLichKham($maNhanVien);
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

            <!-- Main Content -->
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Danh Sách Lịch Khám Cần Chuẩn Bị</h1>
                </div>

                <div class="card">
                    <div class="card-header">
                        Danh Sách Lịch Khám
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã Lịch Khám</th>
                                        <th>Ngày Khám</th>
                                        <th>Giờ Khám</th>
                                        <th>Vấn Đề Khám</th>
                                        <th>Giá Dịch Vụ</th>
                                        <th>Chi Tiết</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Check if appointments exist and display them
                                    if (is_array($dsLichKham) && count($dsLichKham) > 0) {
                                        foreach ($dsLichKham as $row) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row["maLichKham"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["ngayKham"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["gioKham"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["vanDeKham"]) . "</td>";
                                            echo "<td>" . number_format($row["giaDichVuKham"], 0, ',', '.') . " VND</td>";
                                            echo "<td><a href='chitietLK.php?id=" . htmlspecialchars($row["maLichKham"]) . "' class='btn btn-sm btn-outline-primary btn-view'>Xem Chi Tiết</a></td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center text-danger'>Không có lịch khám cần chuẩn bị.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
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
