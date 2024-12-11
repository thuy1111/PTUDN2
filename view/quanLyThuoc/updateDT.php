
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
                    
                    <?php

                include_once("../../controller/cCTDT.php");
                include_once("../../controller/cDonThuoc.php");
                $p= new controlCTDT();
                if(isset($_REQUEST['maChiTietDT']))
                {
                    $kq= $p->getAllCTDT($_REQUEST['maChiTietDT']);
                    if($kq)
                    {
                        while($r=mysqli_fetch_assoc($kq))
                        {
                            $maBenhNhan=$r['hoTenBenhNhan'];
                            $maBacSi=$r['hoTenBacSi'];
                            $chuanDoan=$r['chuanDoan'];
                            $STT=$r['STT'];
                            $maThuoc=$r['tenThuoc'];
                            $donVi=$r['donVi'];
                            $donGia=$r['donGia'];
                            $soLuong=$r['soLuong'];
                            $thanhTien=$r['thanhTien'];
                            $trangThai=$r['trangThai'];
                        }
                    }
                }
                ?>
                <!-- Trạng Thái -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="trangThai" class="form-label">Trạng thái</label>
                </div>
                <div class="col-md-9">
                    <select name="trangThai" class="form-select" id="htmlspecialchars($r['tinhTrang'])" required>
                        <option value="" disabled selected>Chọn trạng thái</option>
                        <option value="2">Đã Thanh Toán</option>
                        <option value="3">Chưa Thanh Toán</option>
                    </select>
                </div>
            </div>
<?php
if(isset($_REQUEST['btnupdate']) && $_REQUEST['btnupdate']=='Cập nhật' )
{
    $update= $qk->updateCTDT($_REQUEST['maThuoc'],$_REQUEST['trangThai']);
    if($update)
    {
        echo "<script>alert('Cập nhật thông tin đơn thuốc thành công');</script>";
        echo "<script>window.location.href = 'xulythuoc.php';</script>";
    }
    else {
        echo "<script>alert('Cập nhật thông tin đơn thuốc không thành công');</script>";
        echo "<script>window.location.href = 'xulythuoc.php';</script>";
    }
}
?>

<div class="buttons">

    <input type="submit" name="btnupdate"  class="btn btn-success mx-2" value="Cập nhật"> 

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