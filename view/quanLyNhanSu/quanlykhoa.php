
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
                                    <h4 class="page-title">Quản Lý Thông Tin Khoa</h4>
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
                                <input type="reset" class="btn btn-danger mx-2" value="Hủy">
                            </div>
                        
                        </div>
<?php
error_reporting(0);
include_once("../../controller/cKhoa.php");
$id = $_GET['$id'];
$p= new cKhoa();
$khoa= $p->xemthongtinkhoa($id);
if(isset($_REQUEST['maKhoa']))
{
    $kq= $p->xemthongtinkhoa($_REQUEST['maKhoa']);
    if($kq)
    {
        while($r=mysqli_fetch_assoc($kq))
        {
            $tenKhoa=$r['tenKhoa'];
            
            $truongKhoa=$r['truongKhoa'];
            $soDienThoai=$r['soDienThoai'];
            $email=$r['email'];
            $trangthai=$r['trangThaiKhoa'];
        }
    }
}
?>

                        
                        
                        
                        
                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">Thông tin khoa</h4>

<form class="mb-3" onsubmit="return validateForm() ;" >
    <div class="row">
        <!-- Left column -->
        <div class="col-md-6">
            <!-- Tên khoa -->
            <div class="row mb-3">
                    <div class="col-md-3">
                        <label for="tenKhoa" class="form-label">Tên khoa</label>
                    </div>
                    <div class="col-md-9">
                        <input 
                            type="text" 
                            name="tenKhoa" 
                            class="form-control" 
                            id="tenKhoa" 
                            placeholder="Nhập tên khoa" 
                            value="<?= isset($tenKhoa) ? $tenKhoa : '' ?>"
                            required 
                            maxlength="30"
                            oninput="validateTenKhoa()">
                        <span id="tbtenKhoa" class="text-danger"></span>
                    </div>
                </div>

            <!-- Số điện thoại -->
            <div class="row mb-3">
            <div class="col-md-3">
                <label for="soDienThoai" class="form-label">Số điện thoại</label>
            </div>
            <div class="col-md-9">
                <input 
                    type="text" 
                    name="soDienThoai" 
                    class="form-control" 
                    id="soDienThoai" 
                    placeholder="Nhập số điện thoại" 
                    value="<?= isset($soDienThoai) ? htmlspecialchars($soDienThoai) : '' ?>"
                    required 
                    maxlength="10"
                    oninput="validateSoDienThoai()"> <!-- Gọi hàm khi người dùng nhập dữ liệu -->
                <span id="tbSoDienThoai" class="text-danger"></span> <!-- Hiển thị thông báo lỗi nếu có -->
            </div>
        </div>
        </div>

        <!-- Right column -->
        <div class="col-md-6">
            <!-- Email -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="eMail" class="form-label">Email</label>
                </div>
                <div class="col-md-9">
                    <input 
                        type="email" 
                        name="eMail" 
                        class="form-control" 
                        id="eMail" 
                        placeholder="Nhập email" value="<?= isset($email) ? $email : '' ?>"
                        required>
                    <span id="tbeMail" class="text-danger"></span>
                </div>
            </div>

            <!-- Trưởng khoa -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="truongKhoa" class="form-label">Trưởng khoa</label>
                </div>
                <div class="col-md-9">
                    <input 
                        type="text" 
                        name="truongKhoa" 
                        class="form-control" 
                        id="truongKhoa" 
                        placeholder="Nhập trưởng khoa" value="<?= isset($truongKhoa) ? $truongKhoa : '' ?>"
                        required maxlength="50"
                        oninput="validateTruongKhoa()">
                    <span id="tbtruongKhoa" class="text-danger"></span>
                </div>
            </div>
            
            <!-- Trạng thái khoa -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="trangthai" class="form-label">Trạng thái khoa</label>
                </div>
                <div class="col-md-9">
                    <select 
                        name="trangthai" 
                        class="form-select" 
                        id="trangthai" 
                        required>
                        <option value="">Chọn trạng thái khoa</option>
                        <option value="Đang hoạt động">Đang hoạt động</option>
                        <option value="Tạm nghỉ">Tạm nghỉ</option>
                    </select>
                    <span id="tbtrangthai" class="text-danger"></span>
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
                                    <h4 class="header-title mb-3">Danh sách khoa</h4>
                                    <div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã khoa">
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
                                                    <th>TÊN KHOA</th>
                                                   
                                                    <th>TRƯỞNG KHOA</th>
                                                    <th>SĐT</th>
                                                    <th>EMAIL</th>
                                                    <th>TRẠNG THÁI HOẠT ĐỘNG</th>
                                                </tr>
    <script>
        function validateTenKhoa() {
            var tenKhoa = document.getElementById('tenKhoa').value;
            var errorMsg = document.getElementById('tbtenKhoa');
            
            // Kiểm tra tên khoa chỉ chứa chữ cái và không vượt quá 30 ký tự
            var regex = /^[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàạáâãèéêìíòọóôõùúăđĩũơớƯĂẮẶẰẲẴÂẤẬẦẨẪÊẾỆỀỂỄÔỐỘỒỔỖƠỚỢỜỞỠƯỨỰỪỬỮỲỴỶỸÝỳỵỷỹý\s]+$/;
            if (tenKhoa.length > 30) {
                errorMsg.textContent = 'Tên khoa không được quá 30 ký tự';
            } else if (!regex.test(tenKhoa)) {
                errorMsg.textContent = 'Tên phòng khám chỉ được chứa chữ cái tiếng Việt và khoảng trắng';
            } else {
                errorMsg.textContent = ''; // Xóa thông báo lỗi nếu hợp lệ
            }
        }
        function validateSoDienThoai() {
            var soDienThoai = document.getElementById('soDienThoai').value;
            var errorMsg = document.getElementById('tbSoDienThoai');
            
            // Biểu thức chính quy kiểm tra số điện thoại bắt đầu bằng 03, 08, 09 và có 10 chữ số
            var regex = /^(03|08|09)\d{8}$/;
            if (!regex.test(soDienThoai)) {
                errorMsg.textContent = 'Số điện thoại phải bắt đầu bằng 03, 08, hoặc 09 và có 10 chữ số';
            } else {
                errorMsg.textContent = ''; // Xóa thông báo lỗi nếu hợp lệ
            }
        }
        function validateTruongKhoa() {
            var TruongKhoa = document.getElementById('truongKhoa').value;
            var errorMsg = document.getElementById('tbtruongKhoa');
            
            // Kiểm tra trưởng khoa chỉ chứa chữ cái và không vượt quá 30 ký tự
            var regex = /^[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàạáâãèéêìíòọóôõùúăđĩũơớƯĂẮẶẰẲẴÂẤẬẦẨẪÊẾỆỀỂỄÔỐỘỒỔỖƠỚỢỜỞỠƯỨỰỪỬỮỲỴỶỸÝỳỵỷỹý\s]+$/;
            if (TruongKhoa.length > 50) {
                errorMsg.textContent = 'Tên trưởng khoa không được quá 30 ký tự';
            } else if (!regex.test(TruongKhoa)) {
                errorMsg.textContent = 'Tên trưởng khoa chỉ được chứa chữ cái và khoảng trắng';
            } else {
                errorMsg.textContent = ''; // Xóa thông báo lỗi nếu hợp lệ
            }
        }
    </script>

                                            </thead>
                                            <?php
    include_once("../../controller/cKhoa.php");
    $qk= new cKhoa();
    if(isset($_REQUEST['btnsearch']))
    {
        $tbl = $qk->timkiemkhoa($_REQUEST['search']);
        
    }
    else{
        $tbl = $qk->layDSKhoa();
    }
    

    if($tbl)
    {
        echo ' <tbody>';
        $stt= 1;
        while ($r=mysqli_fetch_assoc($tbl))
        {
            echo'<tr>
                                                    <td>'.$stt.'</td>   
                                                    <td><a href="?maKhoa='.$r['maKhoa'].'">'.$r['tenKhoa'].'</a></td>
                                                    
                                                    <td>'.$r['truongKhoa'].'</td>
                                                    <td>'.$r['soDienThoai'].'</td>
                                                    <td>'.$r['email'].'</td>
                                                    <td>'.$r['trangThaiKhoa'].'</td>
                                                
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
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
    $insert= $qk->addkhoa($_REQUEST['tenKhoa'],$_REQUEST['truongKhoa'],$_REQUEST['soDienThoai'],$_REQUEST['eMail'],$_REQUEST['trangthai']);
    if($insert)
    {
        echo "<script>alert('Thêm khoa thành công');</script>";
        echo "<script>window.location.href = 'quanlykhoa.php';</script>";
    }
    else {
        echo "<script>alert('Thêm khoa không thành công');</script>";
        echo "<script>window.location.href = 'quanlykhoa.php';</script>";
    }
}

?>      
<?php
if(isset($_REQUEST['btnupdate']) && $_REQUEST['btnupdate']=='Cập nhật' )

{
    
    
    $update= $qk->updatettkhoa($_REQUEST['maKhoa'],$_REQUEST['tenKhoa'],$_REQUEST['truongKhoa'],$_REQUEST['soDienThoai'],$_REQUEST['eMail'],$_REQUEST['trangthai']);
    if($update)
    {
        echo "<script>alert('Cập nhật thông tin khoa thành công');</script>";
        echo "<script>window.location.href = 'quanlykhoa.php';</script>";
    }
    else {
        echo "<script>alert('Cập nhật thông tin khoa không thành công');</script>";
        echo "<script>window.location.href = 'quanlykhoa.php';</script>";
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