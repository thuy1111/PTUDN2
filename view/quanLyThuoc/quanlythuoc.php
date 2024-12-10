
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
                                    <h4 class="page-title">Quản Lý Thuốc</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <form class="mb-3" method="post">
                        <hr style="border-color: black;">
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" name="btnadd" class="btn btn-primary mx-2"value="Thêm">
                                <input type="submit" name="btnupdate"  class="btn btn-success mx-2" value="Cập nhật"> 
                                <input type="submit" class="btn btn-danger mx-2" value="Hủy">
                            </div>
                        
                        </div>
                        <?php

include_once("../../controller/cThuoc.php");
$p= new cThuoc();
if(isset($_REQUEST['maThuoc']))
{
    $kq= $p->xemthongtinthuoc($_REQUEST['maThuoc']);
    if($kq)
    {
        while($r=mysqli_fetch_assoc($kq))
        {
            $tenThuoc=$r['tenThuoc'];
            $soLuong=$r['soLuong'];
            $donViCungCap=$r['donViCungCap'];
            $donGia=$r['donGia'];
            $donViTinh=$r['donViTinh'];
            $cachDung=$r['cachDung'];
            $trangThai=$r['trangThai'];
        }
    }
}
?>
                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">Thông tin thuốc</h4>

                        <form class="mb-3">
    <div class="row">
        <!-- Left column -->
        <div class="col-md-6">
            <!-- Tên thuốc -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="tenThuoc" class="form-label">Tên thuốc</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="tenThuoc" placeholder="Nhập tên thuốc" required>
                </div>
            </div>

            <!-- Số lượng tồn -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="soLuongTon" class="form-label">Số lượng tồn</label>
                </div>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="soLuongTon" id="soLuongTon" placeholder="Nhập số lượng tồn" min="0" required>
                </div>
            </div>

            <!-- Đơn vị cung cấp -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="donViCungCap" class="form-label">Đơn vị cung cấp</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="donViCungCap" id="donViCungCap" placeholder="Nhập đơn vị cung cấp" required>
                </div>
            </div>

            <!-- Đơn giá -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="donGia" class="form-label">Đơn giá</label>
                </div>
                <div class="col-md-9">
                    <input type="number" class="form-control" name="donGia" id="donGia" placeholder="Nhập đơn giá" min="0" required>
                </div>
            </div>
        </div>

        <!-- Right column -->
        <div class="col-md-6">
            <!-- Đơn vị tính -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="donViTinh" class="form-label">Đơn vị tính</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="donViTinh" id="donViTinh" placeholder="Nhà sản xuất" required>
                </div>
            </div>

            <!-- Cách dùng -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="cachDung" class="form-label">Cách dùng</label>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="cachDung" id="cachDung" placeholder="Cách dùng" required>
                </div>
            </div>

            <!-- Loại thuốc -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="loaiThuoc" class="form-label">Loại thuốc</label>
                </div>
                <div class="col-md-9">
                    <select name="loaiThuoc" class="form-select" id="loaiThuoc" required>
                        <option value="" disabled selected>Chọn loại thuốc</option>
                        <?php
                        include("../../controller/cLoaiThuoc.php");
                        $controller = new cLoaiThuoc();
                        $dsLoaiThuoc = $controller->layDSLoaiThuoc();
                        
                        // Fetch and populate options
                        if ($dsLoaiThuoc) {
                            while ($loai = $dsLoaiThuoc->fetch_assoc()) {
                                echo "<option value='{$loai['maLoaiThuoc']}'>{$loai['tenLoaiThuoc']}</option>";
                            }
                        } else {
                            echo "<option value=''>Không có dữ liệu Loại Thuốc</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <!-- Trạng thái -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="trangThai" class="form-label">Trạng thái</label>
                </div>
                <div class="col-md-9">
                    <select name="trangThai" class="form-select" id="trangThai" required>
                        <option value="" disabled selected>Chọn trạng thái</option>
                        <option value="1">Còn hàng</option>
                        <option value="2">Gần hết</option>
                        <option value="3">Hết hàng</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>

                        <hr style="border-color: black;">

                        <!--Clinic list-->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Danh sách thuốc</h4>
                                    <div class="row mb-3">
                                    <div class="col-md-6">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã nhân viên">
                <input type="submit" name ="btnsearch"class="btn btn-primary" value="Tìm kiếm">
            </div>
        </form>
    </div>
</div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>TÊN THUỐC</th>
                                                    <th>SỐ LƯỢNG TỒN</th>
                                                    <th>ĐƠN VỊ CUNG CẤP</th>
                                                    <th>ĐƠN GIÁ</th>
                                                    <th>ĐƠN VỊ TÍNH</th>
                                                    <th>CÁCH DÙNG</th>
                                                    <th>LOẠI THUỐC</th>
                                                    <th>TRẠNG THÁI </th>
                                                </tr>
                                            </thead>
                                            <?php
    include_once("../../controller/cThuoc.php");
    $qk= new cThuoc();
    if(isset($_REQUEST['btnsearch']))
    {
        $tbl = $qk->timkiemthuoc($_REQUEST['search']);
        
    }
    else{
        $tbl = $qk->layDSThuoc();
    }
    

    if($tbl)
    {
        echo ' <tbody>';
        $stt= 1;
        while ($r=mysqli_fetch_assoc($tbl))
        {
            echo'<tr>
                                                    <td>'.$stt.'</td>   
                                                    <td><a href="?maThuoc='.$r['maThuoc'].'">'.$r['tenThuoc'].'</a></td>
                                                    <td>'.$r['soLuong'].'</td>
                                                    <td>'.$r['donViCungCap'].'</td>
                                                    <td>'.$r['donGia'].'</td>
                                                    <td>'.$r['donViTinh'].'</td>
                                                    <td>'.$r['cachDung'].'</td>
                                                    <td>'.$r['maLoaiThuoc'].'</td>
                                                    <td>'.$r['trangThai'].'</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>';
                                                $stt++;
        }

    }
    else{
        echo "Không có kết quả";
    }
?>
     <?php
if(isset($_REQUEST['btnadd']) && $_REQUEST['btnadd']=='Thêm' )

{
   
    $insert= $qk->addthuoc($_REQUEST['tenThuoc'],$_REQUEST['soLuongTon'],$_REQUEST['donViCungCap'],$_REQUEST['donGia'],$_REQUEST['donViTinh'],$_REQUEST['cachDung'],$_REQUEST['loaiThuoc'],$_REQUEST['trangThai']);
    if($insert)
    {
        echo "<script>alert('Thêm thuốc thành công');</script>";
        echo "<script>window.location.href = 'quanlythuoc.php';</script>";
    }
    else {
        echo "<script>alert('Thêm thuốc không thành công');</script>";
        echo "<script>window.location.href = 'quanlythuoc.php';</script>";
    }
}

?>      
<?php
if(isset($_REQUEST['btnupdate']) && $_REQUEST['btnupdate']=='Cập nhật' )

{
    
    
    $update= $qk->updatettthuoc($_REQUEST['maThuoc'],$_REQUEST['tenThuoc'],$_REQUEST['soLuongTon'],$_REQUEST['donViCungCap'],$_REQUEST['donGia'],$_REQUEST['donViTinh'],$_REQUEST['cachDung'],$_REQUEST['loaiThuoc'],$_REQUEST['trangThai']);
    if($update)
    {
        echo "<script>alert('Cập nhật thông tin thuốc thành công');</script>";
        echo "<script>window.location.href = 'quanlythuoc.php';</script>";
    }
    else {
        echo "<script>alert('Cập nhật thông tin thuốc không thành công');</script>";
        echo "<script>window.location.href = 'quanlythuoc.php';</script>";
    }
}

?>       
                                            <tbody>
                                                <tr>

                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>    
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->                                                                                                                                                                                                                                         
                        </div>
                        <!-- end row -->
                        
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
        
    </body>

</html>