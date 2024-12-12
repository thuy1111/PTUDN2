<?php
// Include controllers
include_once('../../controller/cThongkethuoc.php');
include_once('../../controller/cBacSi.php');

// Create instances of controllers
$thongKeController = new cThongkethuoc();
$bacSiController = new mBacsi();

// Default value for the selected doctor
$selectedBacSi = 0; // Default: show all

// Handle filter by doctor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bacsi'])) {
    $selectedBacSi = intval($_POST['bacsi']);
}

// Fetch data based on the selected doctor (or all if no filter applied)
if ($selectedBacSi > 0) {
    $result = $thongKeController->thongKeThuoc($selectedBacSi); // Fetch data filtered by selected doctor
} else {
    $result = $thongKeController->thongKeThuoc(); // Fetch all data initially
}

// Fetch list of doctors
$dsBacSi = $bacSiController->layDSBacSi();
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
        <?php include('../../assets/inc/sidebarthuoc.php');?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Thống kê thuốc đã kê đơn</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="thongkethuoctheobacsi.php" class="btn btn-danger mx-2">Theo bác sĩ</a>
                        </div>
                    </div>

                    <hr style="border-color: black;">

                    <!-- Filter by Doctor -->
                    <form method="POST" action="thongkethuoctheobacsi.php" class="mb-3">
                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <label for="bacsi" class="form-label">Chọn bác sĩ</label>
                                <select class="form-select form-control" id="bacsi" name="bacsi">
                                    <option value="0" <?= $selectedBacSi == 0 ? "selected" : ""; ?>>Tất cả bác sĩ</option>
                                    <?php while ($row = $dsBacSi->fetch_assoc()): ?>
                                        <option value="<?= $row['maNhanVien']; ?>" <?= $selectedBacSi == $row['maNhanVien'] ? "selected" : ""; ?>>
                                            <?= htmlspecialchars($row['hoTen']); ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary">Lọc</button>
                        </div>
                    </form>

                    <!-- Display Data -->
                    <div class="container">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã bác sĩ</th>
                                    <th>Tên bác sĩ</th>
                                    <th>Mã thuốc</th>
                                    <th>Tên thuốc</th>
                                    <th>Tổng số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result && is_array($result)): ?>
                                    <?php foreach ($result as $row): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($row['maBacSi']); ?></td>
                                            <td><?= htmlspecialchars($row['tenBacSi']); ?></td>
                                            <td><?= htmlspecialchars($row['maThuoc']); ?></td>
                                            <td><?= htmlspecialchars($row['tenThuoc']); ?></td>
                                            <td><?= htmlspecialchars($row['tongSoLuong']); ?></td>
                                            <td><?= number_format($row['tongTien'], 0, ',', '.') . " VND"; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Không có dữ liệu thống kê.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
        </div>

        <!-- Vendor js -->
        <script src="../../assets/js/vendor.min.js"></script>
        <!-- Plugins js-->
        <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="../../assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.js"></script>
        <script src=../../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>
    </body>
</html>
