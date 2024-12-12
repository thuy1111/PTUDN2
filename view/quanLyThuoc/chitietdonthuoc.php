<!DOCTYPE html>
<html lang="en">

<!--Head Code-->
<?php include("../../assets/inc/head.php"); ?>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include('../../assets/inc/nav.php'); ?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('../../assets/inc/sidebarthuoc.php'); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Chi Tiết Đơn Thuốc</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <hr style="border-color: black;">
                    <?php
// Kết nối Controller
include_once("../../controller/cCTDT.php");
$p = new controlCTDT();

// Lấy ID từ URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $chiTiet = $p->get01CTDT($id); // Hàm lấy chi tiết đơn thuốc

    if ($chiTiet) {
        $donThuoc = mysqli_fetch_assoc($chiTiet);

        // Hiển thị thông tin chi tiết đơn thuốc
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Mã Đơn Thuốc: ' . $donThuoc['maDonThuoc'] . '</h5>';
        echo '<p><strong>Tên Bệnh Nhân:</strong> ' . $donThuoc['hoTenBenhNhan'] . '</p>';
        echo '<p><strong>Tên Bác Sĩ:</strong> ' . $donThuoc['hoTenBacSi'] . '</p>';
        echo '<p><strong>Chuẩn Đoán:</strong> ' . $donThuoc['chuanDoan'] . '</p>';
        echo '<p><strong>Tình Trạng:</strong> ' . $donThuoc['tinhTrang'] . '</p>';

        echo '<h6>Danh Sách Thuốc:</h6>';
        echo '<table class="table table-bordered">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>STT</th>';
        echo '<th>Tên Thuốc</th>';
        echo '<th>Đơn Vị</th>';
        echo '<th>Đơn Giá</th>';
        echo '<th>Số Lượng</th>';
        echo '<th>Thành Tiền</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Initialize the total cost variable
        $totalAmount = 0;

        // Lấy danh sách thuốc trong đơn thuốc
        $dsThuoc = $p->get01CTDT($id); // Hàm lấy danh sách thuốc
        $stt = 1;
        while ($thuoc = mysqli_fetch_assoc($dsThuoc)) {
            $thanhTien = $thuoc['donGia'] * $thuoc['soLuong'];  // Calculate the total for this drug
            $totalAmount += $thanhTien;  // Add to the total amount

            echo '<tr>';
            echo '<td>' . $stt++ . '</td>';
            echo '<td>' . $thuoc['tenThuoc'] . '</td>';
            echo '<td>' . $thuoc['donVi'] . '</td>';
            echo '<td>' . number_format($thuoc['donGia'], 0, ',', '.') . ' VND</td>';
            echo '<td>' . $thuoc['soLuong'] . '</td>';
            echo '<td>' . number_format($thanhTien, 0, ',', '.') . ' VND</td>';
            echo '</tr>';
        }

        // Display the total amount
        echo "<tr>
                <td colspan='5' class='text-right'><strong>Tổng Số Tiền:</strong></td>
                <td><strong>" . number_format($totalAmount, 0, ',', '.') . " VND</strong></td>
              </tr>";

        echo '</tbody>';
        echo '</table>';

        echo '</div>'; // Kết thúc card-body
        echo '</div>'; // Kết thúc card
    } else {
        echo '<p class="text-danger">Không tìm thấy thông tin chi tiết cho đơn thuốc này.</p>';
    }
} else {
    echo '<p class="text-danger">ID không hợp lệ.</p>';
}
?>

<div class="buttons">
    <!-- Update Status Button -->
    <button class="btn btn-danger" onclick="window.location.href='xulythuoc.php';">Quay Lại</button>
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
    </div>
</body>

</html>
