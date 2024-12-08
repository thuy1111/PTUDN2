
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
                                    <h4 class="page-title">Các Đơn Thuốc</h4>
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
            include_once("../../controller/cXuly.php");
            $p = new cXuly();
            $con = $p->getAllXuly();
            if($con){
                echo "<table border=1>";
                echo "<tr><th>Mã đơn thuốc </th><th>Tên Bệnh nhân</th><th>Chuẩn đoán</th><th>Thao Tác</th></tr>";
                while($r = mysqli_num_rows($con)){
                    echo "<tr>";
                    echo "<td>".$r['maDonThuoc']."</td>";
                    echo "<td>".$r['maBenhNhan']."</td>";
                    echo "<td>".$r['chuanDoan']."</td>";
                    echo "<td><a href='thanhtoan.php'=".$r['maDonThuoc']."'>Thanh Toán</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
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