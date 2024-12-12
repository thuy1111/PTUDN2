<?php
include_once("../../controller/cPhieuKham.php");

$controller = new cPhieuKhamBenh();

$maBenhNhan = isset($_GET['maBenhNhan']) ? $_GET['maBenhNhan'] : "";

$dsPKB = $controller->hienThiDanhSachPKB("", $maBenhNhan);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu Khám Bệnh</title>

    <?php include("../../assets/inc/head.php"); ?>

    <style>
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
                        <h1 class="h2">Danh Sách Phiếu Khám Bệnh</h1>
                    </div>
                <!-- Form tìm kiếm -->
                <div class="row mb-3">
                        <div class="col mt-2">
                            <form class="d-flex" method="get" action="">
                                <input class="form-control me-2" type="text" name="maBenhNhan" placeholder="Nhập mã bệnh nhân" value="<?php echo isset($_GET['maBenhNhan']) ? htmlspecialchars($_GET['maBenhNhan']) : ''; ?>">
                                <button class="btn btn-custom-search" type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Danh Sách Phiếu Khám Bệnh
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mã Phiếu</th>
                                            <th>Phòng Khám</th>
                                            <th>Ngày Khám</th>
                                            <th>Bệnh Nhân</th>
                                            <th>Bác sĩ phụ trách</th>
                                            <th>Lý Do</th>
                                            <th>Kết Luận</th>
                                            <th>Chi Tiết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                        
                                        if ($dsPKB && $dsPKB->num_rows > 0) {
                                            while ($row = $dsPKB->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row['maPhieuKhamBenh'] . "</td>";
                                                echo "<td>" . $row['maPhongKham'] . "</td>";
                                                echo "<td>" . $row['ngayKham'] . "</td>";
                                                echo "<td>" . $row['tenBenhNhan'] . "</td>";
                                                echo "<td>" . $row['tenNhanVien'] . "</td>";
                                                echo "<td>" . $row['lyDoKham'] . "</td>";
                                                echo "<td>" . $row['ketLuan'] . "</td>";
                                                echo "<td><a href='chitietPKB.php?id=" . $row['maPhieuKhamBenh'] . "' class='btn btn-sm btn-outline-primary btn-view'>Xem chi tiết</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' class='text-center'>Không tìm thấy phiếu khám bệnh.</td></tr>";
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
        <footer>

        </footer>
    </div>


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
