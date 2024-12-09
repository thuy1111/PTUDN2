<?php
include_once('../../controller/cThongkethuoc.php');
$p = new cThongkethuoc();

// Trạng thái bảo hiểm (true: có bảo hiểm, false: không bảo hiểm)
$baoHiem = true; // hoặc $baoHiem = false;

// Gọi hàm thống kê
$result = $Thongkethuoc->thongKeThuocTheoBaoHiem($baoHiem);

if ($result) {
    $status = $baoHiem ? "Có bảo hiểm" : "Không có bảo hiểm";
    echo "<h3>Thống kê thuốc ($status)</h3>";
    echo "<table border='1'>
            <tr>
                <th>Mã thuốc</th>
                <th>Tên thuốc</th>
                <th>Tổng số lượng</th>
                <th>Tổng tiền</th>
            </tr>";
    foreach ($result as $row) {
        echo "<tr>
                <td>" . $row['maThuoc'] . "</td>
                <td>" . $row['tenThuoc'] . "</td>
                <td>" . $row['tongSoLuong'] . "</td>
                <td>" . number_format($row['tongTien'], 0, ',', '.') . " VND</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Không có dữ liệu thống kê cho trạng thái bảo hiểm này.";
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
            <?php include('../../assets/inc/sidebarthuoc.php');?>
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
                                    
                                    <h4 class="page-title">Thống kê thuốc đã kê đơn</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12 text-center">
                                <a href="thongkethuoctheoloaibaohiem.php" class="btn btn-success mx-2">Theo loại bảo hiểm</a>
                                <a href="thongkethuoctheobacsi.php" class="btn btn-danger mx-2">Theo bác sĩ</a>
                            </div>
                        </div>

                        <hr style="border-color: black;">
                        
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
        <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>

        <!--Chart js-->
        <script src="../../assets/js/Chart.min.js"></script>

        <!--Jquery js-->
        <script src="../../assets/js/vendor/jquery-3.7.1.min.js"></script>
    </body>

</html>