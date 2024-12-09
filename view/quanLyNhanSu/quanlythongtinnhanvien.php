
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
            <?php include('../../assets/inc/sidebar.php');?>
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
                                    <h4 class="page-title">Quản Lý Thông Tin Nhân Viên</h4>
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
include_once("../../controller/cNhanVien.php");
$p= new cNhanVien();
if(isset($_REQUEST['maNhanVien']))
{
    $kq= $p->xemthongtinnv($_REQUEST['maNhanVien']);
    if($kq)
    {
        while($r=mysqli_fetch_assoc($kq))
        {
            $tennv=$r['hoTen'];
            $ngaysinh=$r['ngaySinh'];
            $diachi=$r['diaChi'];
            $sdt=$r['soDienThoai'];
            $email=$r['email'];
            $tinhtrang=$r['tinhTrangNhanVien'];
            $machucvu=$r['maChucVu'];
            $makhoa=$r['maKhoa'];
        }
    }
}
?>
                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">Thông tin nhân viên</h4>

                        
                            <div class="row">
                                <!-- Left column -->
                                <div class="col-md-6">
                                   
                                    <!-- Employee name -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="tenNhanVien" class="form-label">Tên nhân viên</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" name="tenNhanVien" id="tenNhanVien" placeholder="Nhập tên nhân viên" value="<?php if(isset($tennv)) {echo $tennv;} ?>">
                                            <span id="tbtenNV" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- date of birth -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                        <label for="ngaySinh"  class="form-label">Ngày sinh</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="date" name="ngaySinh" class="form-control" id="ngaySinh" placeholder="Chọn ngày sinh" value="<?php if(isset($ngaysinh)) {echo $ngaysinh;} ?>">
                                        <span id="tbngaySinh" class="text-danger"></span>
                                    </div>
                                </div>

                                    <!-- gender -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="gioiTinh" class="form-label">Giới tính</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="gioiTinh" class="form-select form-control" id="gioiTinh">
                                                <option selected>Chọn giới tính</option>
                                                <option value="1">Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                            <span id="tbgioiTinh" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <!-- Address -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="diaChi" class="form-label">Địa chỉ</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="diaChi" name="diaChi" placeholder="Nhập địa chỉ" value="<?php if(isset($diachi)) {echo $diachi;} ?>">
                                            <span id="tbdiaChi" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="boPhan" class="form-label">Bộ phận</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="boPhan" class="form-select form-control" id="boPhan">
                                                <option selected>Chọn bộ phận</option>
                                                <option value="1">Khoa 1</option>
                                                <option value="2">Khoa 2</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>

                                <!-- Right column -->
                                <div class="col-md-6">
                                    <!-- Phone number -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                            <label for="sDT" class="form-label">SDT</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="sDT" class="form-control" id="sDT" placeholder="Nhập số điện thoại" value="<?php if(isset($sdt)) {echo $sdt;} ?>">
                                            <span id="tbSDT" class="text-danger"></span>
                                        </div>
                                    </div>
                                    

                                    <!-- Email -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                            <label for="eMail" class="form-label">Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="eMail" id="eMail" class="form-control" id="eMail" placeholder="Nhập email" value="<?php if(isset($email)) {echo $email;} ?>">
                                            <span id="tbEmail" class="text-danger"></span>
                                        </div>
                                    </div>    
                                    <!-- tdn -->
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                            <label for="tdn" class="form-label">Ten  dang nhap</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="tdn" class="form-control"  placeholder="Nhập tdn">
                                        </div>
                                    </div>    
                                    <div class="row mb-1">
                                    <div class="col-md-3">
                                            <label for="mk" class="form-label">Mat khau</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="mk" class="form-control"  placeholder="Nhập mk">
                                        </div>
                                    </div>    


                                    <!-- position -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="chucVu" class="form-label">Chức vụ</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="chucVu" class="form-select form-control" id="chucVu">
                                                <option selected>Chọn chức vụ</option>
                                                <option value="1">Bác sĩ</option>
                                                <option value="2">Y tá</option>
                                                <option value="1">Quản lý thuốc</option>
                                                <option value="2">Kế toán</option>
                                            </select>
                                        </div>
                                    </div>  
                                    <!-- Trạng thái -->
                                    <div class="row mb-1">
                                        <div class="col-md-3">
                                            <label for="trangthai" class="form-label">Trạng thái làm việc</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select name="trangthai" class="form-select form-control" id="chucVu">
                                                <option selected>Cập nhật trạng thái</option>
                                                <option value="Đang làm việc">Đang làm việc</option>
                                                <option value="Nghỉ việc">Nghỉ việc</option>
                                                <option value="Tạm nghỉ">Tạm nghỉ</option>
                                               
                                            </select>
                                        </div>
                                    </div>  

                                    <!-- part -->
                                    
                                    
                                </div>
                            </div>
                        </form>

                        <hr style="border-color: black;">

                        <!--Clinic list-->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card-box">
                                    <h4 class="header-title mb-3">Danh sách nhân viên</h4>
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
                                                    <th>TÊN NHÂN VIÊN</th>
                                                    <th>NGÀY SINH</th>
                                                    <th>GIỚI TÍNH</th>
                                                    <th>SỐ ĐIỆN THOẠI</th>
                                                    <th>EMAIL</th>
                                                    <th>ĐỊA CHỈ</th>
                                                    <th>BỘ PHẬN</th>
                                                    <th>CHỨC VỤ</th>
                                                    <th>TÌNH TRẠNG LÀM VIỆC</th>
                                                </tr>
                                            </thead>
<?php
    include_once("../../controller/cNhanVien.php");
    $qk= new cNhanVien();
    if(isset($_REQUEST['btnsearch']))
    {
        $tbl = $qk->timkiemnv($_REQUEST['search']);
        
    }
    else{
        $tbl = $qk->laydanhsachnhanvien();
    }
    

    if($tbl)
    {
        echo ' <tbody>';
        $stt= 1;
        while ($r=mysqli_fetch_assoc($tbl))
        {
            echo'<tr>
                                                    <td>'.$stt.'</td>   
                                                    <td><a href="?maNhanVien='.$r['maNhanVien'].'">'.$r['hoTen'].'</a></td>
                                                    <td>'.$r['ngaySinh'].'</td>
                                                    <td>'.$r['gioiTinh'].'</td>
                                                    <td>'.$r['soDienThoai'].'</td>
                                                    <td>'.$r['email'].'</td>
                                                    <td>'.$r['diaChi'].'</td>
                                                    <td>'.$r['tenKhoa'].'</td>
                                                    <td>'.$r['tenChucVu'].'</td>
                                                    <td>'.$r['tinhTrangNhanVien'].'</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>';
                                                $stt++;
        }

    }
    else{
        echo "ko co kq";
    }
?>
     <?php
if(isset($_REQUEST['btnadd']) && $_REQUEST['btnadd']=='Thêm' )

{
    $insert= $q->addnhanvien($_REQUEST['tenNhanVien'],$_REQUEST['ngaySinh'],$_REQUEST['gioiTinh'],$_REQUEST['tdn'],$_REQUEST['mk'],$_REQUEST['sDT'],$_REQUEST['eMail'],$_REQUEST['diaChi'],$_REQUEST['chucVu'],$_REQUEST['boPhan']);
    if($insert)
    {
        echo "<script>alert('Theem thanh cong');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    }
    else {
        echo "<script>alert('Theem ko thanh cong');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    }
}

?>      
<?php
if(isset($_REQUEST['btnupdate']) && $_REQUEST['btnupdate']=='Cập nhật' )

{
    $ngaysinh=$_REQUEST['ngaySinh'];
    $ngaysinh = date('Y/m/d', strtotime($ngaysinh));
    
    $update= $q->updatettnv($_REQUEST['maNhanVien'],$_REQUEST['tenNhanVien'],$ngaysinh,$_REQUEST['sDT'],$_REQUEST['eMail'],$_REQUEST['diaChi'],$_REQUEST['trangthai'],$_REQUEST['chucVu'],$_REQUEST['boPhan']);
    if($update)
    {
        echo "<script>alert('cap nhat thanh cong');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    }
    else {
        echo "<script>alert('cap nhat ko thanh cong');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    }
}

?>                                    
                                           
                                           
                                                
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
        <script src=../../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>
        
                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            // Khởi tạo Flatpickr
            flatpickr("#ngaySinh", {
                dateFormat: "d-m-Y", // Định dạng ngày
                locale: "vn" // Ngôn ngữ (có thể cần import nếu muốn dùng tiếng Việt)
            });
        </script>
    </body>
 
</html>