
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
                                <input type="submit" class="btn btn-danger mx-2" value="Hủy">
                            </div>
                        
                        </div>
<?php
include_once("../../controller/cKhoa.php");
$p= new cKhoa();
if(isset($_REQUEST['maKhoa']))
{
    $kq= $p->layDSKhoa($_REQUEST['maKhoa']);
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
                        required 
                        maxlength="100">
                    <span id="tbtenKhoa" class="text-danger"></span>
                </div>
            </div>

            <!-- Số điện thoại -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="sDT" class="form-label">Số điện thoại</label>
                </div>
                <div class="col-md-9">
                    <input 
                        type="text" 
                        name="sDT" 
                        class="form-control" 
                        id="sDT" 
                        placeholder="Nhập số điện thoại" 
                        required 
                        pattern="[0-9]{10,11}">
                    <span id="tbsDT" class="text-danger"></span>
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
                        placeholder="Nhập email" 
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
                        placeholder="Nhập trưởng khoa" 
                        required>
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
                        <option value="1">Đang hoạt động</option>
                        <option value="2">Tạm nghỉ</option>
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
    $insert= $qk->addkhoa($_REQUEST['tenKhoa'],$_REQUEST['truongKhoa'],$_REQUEST['sDT'],$_REQUEST['eMail'],$_REQUEST['trangthai']);
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
    
    
    $update= $qk->updatettkhoa($_REQUEST['maKhoa'],$_REQUEST['tenKhoa'],$_REQUEST['truongKhoa'],$_REQUEST['sDT'],$_REQUEST['eMail'],$_REQUEST['trangthai']);
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
<script>
    function validateForm() {
        let isValid = true;

        // Lấy các giá trị từ form
        const tenKhoa = document.getElementById("tenKhoa").value.trim();
        const sDT = document.getElementById("sDT").value.trim();
        const eMail = document.getElementById("eMail").value.trim();
        const truongKhoa = document.getElementById("truongKhoa").value.trim();
        const trangthai = document.getElementById("trangthai").value;

        // Xóa các thông báo lỗi cũ
        document.getElementById("tbtenKhoa").textContent = "";
        document.getElementById("tbsDT").textContent = "";
        document.getElementById("tbeMail").textContent = "";
        document.getElementById("tbtruongKhoa").textContent = "";
        document.getElementById("tbtrangthai").textContent = "";

        // Kiểm tra Tên khoa
        if (tenKhoa === "") {
            document.getElementById("tbtenKhoa").textContent = "Tên khoa không được để trống.";
            isValid = false;
        }

        // Kiểm tra SDT (số điện thoại)
        const sdtRegex = /^[0-9][]{10}$/; // Chỉ cho phép 10-11 chữ số
        if (sDT === "") {
            document.getElementById("tbsDT").textContent = "Số điện thoại không được để trống.";
            isValid = false;
        } else if (!sdtRegex.test(sDT)) {
            document.getElementById("tbsDT").textContent = "Số điện thoại không hợp lệ.";
            isValid = false;
        }

        // Kiểm tra Email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Định dạng email cơ bản
        if (eMail === "") {
            document.getElementById("tbeMail").textContent = "Email không được để trống.";
            isValid = false;
        } else if (!emailRegex.test(eMail)) {
            document.getElementById("tbeMail").textContent = "Email không hợp lệ.";
            isValid = false;
        }

        // Kiểm tra Trưởng khoa
        if (truongKhoa === "") {
            document.getElementById("tbtruongKhoa").textContent = "Tên trưởng khoa không được để trống.";
            isValid = false;
        }

        // Kiểm tra Trạng thái khoa
        if (trangthai === "Trạng thái khoa") {
            document.getElementById("tbtrangthai").textContent = "Vui lòng chọn trạng thái khoa.";
            isValid = false;
        }

        return isValid; // Trả về kết quả kiểm tra
    }
</script>
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