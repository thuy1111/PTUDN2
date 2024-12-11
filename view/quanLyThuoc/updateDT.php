<?php
// Include necessary files
include("../../controller/cCTDT.php");

// Get the ID from the URL
$maChiTietDT = $_GET['id'];
$tinhTrang = "thanh toan"; // Setting the status to "thanh toán"

// Create an instance of the controlCTDT class and update the status
$p = new controlCTDT();
$updateResult = $p->updateCTDT($maChiTietDT, $tinhTrang);

if ($updateResult) {
    // Redirect to a success page or show a success message
    header('Location: xulythuoc.php?status=success');
} else {
    // Handle failure
    echo "Cập nhật trạng thái thất bại!";
}
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Head Code -->
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
                                    <h4 class="page-title">Thông Tin Đơn Thuốc</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <hr style="border-color: black;">

                        <style>
                        /* Chỉnh sửa bảng */
                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin: 20px 0;
                        }

                        table, th, td {
                            border: 1px solid #ddd;
                        }

                        th, td {
                            padding: 12px;
                            text-align: center;
                            font-size: 14px;
                        }

                        th {
                            background-color: #C0C0C0;
                            color: white;
                        }

                        /* Chỉnh sửa các đường viền của bảng */
                        tr:nth-child(even) {
                            background-color: #f2f2f2;
                        }

                        tr:hover {
                            background-color: #ddd;
                        }

                        /* Chỉnh sửa liên kết thanh toán */
                        a {
                            color: #4CAF50;
                            text-decoration: none;
                            font-weight: bold;
                        }

                        a:hover {
                            color: #45a049;
                        }

                        /* Bố cục trang */
                        .container-fluid {
                            padding: 20px;
                        }

                        .page-title-box {
                            margin-bottom: 20px;
                            font-size: 24px;
                            font-weight: 600;
                            color: #333;
                            text-align: center;
                        }

                        /* Tiêu đề trang */
                        hr {
                            border-color: #4CAF50;
                            margin-top: 20px;
                        }
                        </style>

                        <?php
                        include("../../controller/cCTDT.php");
                        $p = new controlCTDT();
                        $con = $p->getAllCTDT();

                        if(!$con || mysqli_num_rows($con) == 0) {
                            echo "No data available.";
                        } else {
                            $r = mysqli_fetch_assoc($con);

                            if ($r) {
                                echo "<div class='form-group'>
                                    <label for='bac-si'>Tên Bệnh Nhân:</label>
                                    <input type='text' class='form-control' id='bac-si' name='bacSi' value='" . htmlspecialchars($r['hoTenBenhNhan']) . "' readonly>
                                </div>";
                                echo "<div class='form-group'>
                                    <label for='bac-si'>Bác sĩ kê đơn:</label>
                                    <input type='text' class='form-control' id='bac-si' name='bacSi' value='" . htmlspecialchars($r['hoTenBacSi']) . "' readonly>
                                </div>";
                                echo "<div class='form-group'>
                                    <label for='chuandoan'>Chuẩn Đoán: </label>
                                    <input type='text' class='form-control' id='chuandoan' name='chuandoan' value='" . htmlspecialchars($r['chuanDoan']) . "' readonly>
                                </div>";
                                echo "<div class='form-group'>
                                    <label for='tinhTrang'>Tình Trạng: </label>
                                    <input type='text' class='form-control' id='tinhTrang' name='tinhTrang' value='" . htmlspecialchars($r['tinhTrang']) . "' readonly>
                                </div>";
                            }

                            // Now output the table of details
                            echo "<table border='1' width='100%'>";
                            echo "<tr>
                                    <th>STT</th>
                                    <th>Tên Thuốc</th>
                                    <th>Đơn Vị</th>
                                    <th>Đơn Giá</th>
                                    <th>Số Lượng</th>
                                    <th>Thành Tiền</th>
                                </tr>";

                            // Reset pointer back to the beginning of the result set
                            mysqli_data_seek($con, 0); // Move pointer back to the start

                            // Loop through the results
                            while ($r = mysqli_fetch_assoc($con)) {
                                echo "
                                    <tr>
                                        <td>" . htmlspecialchars($r["STT"]) . "</td>
                                        <td>" . htmlspecialchars($r["tenThuoc"]) . "</td>
                                        <td>" . htmlspecialchars($r["donVi"]) . "</td>
                                        <td>" . htmlspecialchars($r["donGia"]) . "</td>
                                        <td>" . htmlspecialchars($r["soLuong"]) . "</td>
                                        <td>" . htmlspecialchars($r["thanhTien"]) . "</td>
                                    </tr>
                                ";
                            }
                            echo "</table>";
                        }
                        ?>

                        <!-- Update status button -->
                        <div class="buttons">
                            <style>
                                .btn-custom-blue {
                                    background-color: #007bff; /* Customize the blue color */
                                    color: white;
                                }
                            </style>

                            <!-- Update Status Button -->
                            <button class="btn btn-custom-blue" onclick="window.location.href='updateStatus.php?id=<?php echo $r['maChiTietDT']; ?>'">Cập Nhật Trạng Thái</button>

                            <button class="btn btn-danger" onclick="window.location.href='xulythuoc.php';">Quay Lại</button>

                        </div>

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

            </div> <!-- content-page -->

        </div> <!-- wrapper -->

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

        <!-- Dashboard 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>

    </body>

</html>
