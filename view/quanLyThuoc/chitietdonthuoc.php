
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

            <!-- ========== Left Sidebar Start ========== -->
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
</div>
<div class="form-group">
    <label for="ma-don-thuoc">Tên Bệnh Nhân:</label>
    <input id="tenBenhNhan" type="text" />
    <label for="bao-hiem">Bảo hiểm y tế:</label>

<td>
    <?php
        include_once("../../controller/cBaoHiem.php"); // Update the controller to match "cBaoHiem"
        $pt = new controlBaoHiem(); // Update the class name to match the insurance controller
        $kq = $pt->getAllBaoHiem(); // Update the method to fetch insurance data
        if(!$kq){
            echo "No data!";
        } else {
            echo "<select name='cboBaoHiem'>"; // Update the name attribute to "cboBaoHiem"
            while($r = mysqli_fetch_assoc($kq)){
                if($r['quyenLoi'] == $baohiem){ // Update the column name and variable for insurance
                    echo "<option value=".$r['maBaoHiem']." selected>".$r['quyenLoi']."</option>"; // Update with insurance field
                } else {
                    echo "<option value=".$r['maBaoHiem'].">".$r['quyenLoi']."</option>"; // Update with insurance field
                }
            }
            echo "</select>";
        }
    ?>
</td>



</div>
<div class="form-group">
    <label for="bac-si">Bác sĩ kê đơn:</label>
    <input id="$maNhanVien" type="text" />

    </select>
    <label for="tinh-trang">Tình Trạng</label>
    <select id="tinhTrang">
        <option>Tình Trạng</option>
        <option>Đã Thanh Toán</option>
        <option>Chưa Thanh Toán</option>
    </select>
</div>
<div class="form-group">
    <label for="chan-doan">Chuẩn đoán:</label>
    <input id="chuanDoan" type="text" />
</div>

<div class="table-container">
    <?php
    include("../../controller/cCTDT.php");
    $p = new controlCTDT();
    $con = $p->getAllCTDT();

    if (!$con) {
        echo "No data available.";
    } else {
        echo "<table border='1' width='100%'>";
        echo "<tr>
                <td colspan='7' align='center'></td>
            </tr>";
        echo "
            <tr>
                <th>STT</th>
                <th>Tên Thuốc</th>
                <th>Đơn Vị</th>
                <th>Đơn Giá</th>
                <th>Số Lượng</th>
                <th>Thành Tiền</th>
            </tr>
        ";
}
        // Loop through each record from the query result
        while ($r = mysqli_fetch_assoc($con)) {
            echo "
                <tr>
                <td>".$r["STT"]."</td>
                <td>".$r["tenThuoc"]."</td>
                <td>".$r["donVi"]."</td>
                <td>".number_format($r["donGia"], 0, ',', '.')." VNĐ</td>
                <td>".$r["soLuong"]."</td>
                <td>".number_format($r["thanhTien"], 0, ',', '.')." VNĐ</td>
                </tr>
            ";
        }
        echo "</table>";

    ?>
</div>

<div class="summary">
    <div class="summary-box">
        <label for="tong-tien">Tổng tiền:</label>
        <input id="tong-tien" type="text" /><br>
        <label for="kham-bhyt">Khám từ BHYT:</label>
        <input id="kham-bhyt" type="text" /><br>
        <label for="tong-thanh-toan">Tổng số tiền thanh toán:</label>
        <input id="thanhTien" type="text" /><br>
    </div>
</div>

<div class="buttons">
<style>
    .btn-custom-blue {
        background-color: #007bff; /* Customize the blue color */
        color: white;
    }
</style>

<button class="btn btn-custom-blue">Cập Nhật</button>

    <button class="btn btn-danger" onclick="window.location.href='xulythuoc.php';">Quay Lại</button>

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