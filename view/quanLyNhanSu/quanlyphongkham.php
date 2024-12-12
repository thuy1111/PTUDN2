<?php
session_start();

if (isset($_SESSION['user'][0])) {
    $maNhanVien = $_SESSION['user'][0];
    $tenNhanVien = $_SESSION['user'][1];
    $maChucVu = $_SESSION['user'][2];
    
    if ($maChucVu != 3) {
        echo "<script>alert('Bạn không có quyền truy cập vào trang này!');</script>";
        echo "<script>window.location.href = '../../index.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Vui lòng đăng nhập để truy cập!');</script>";
    echo "<script>window.location.href = '../dangnhap';</script>";
    exit();
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
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
                                    <h4 class="page-title">Quản Lý Phòng Khám</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <hr style="border-color: black;">

                        <form class="mb-3" method="post">
                        
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" name="btnadd" class="btn btn-primary mx-2"value="Thêm">
                                <input type="submit" name="btnupdate"  class="btn btn-success mx-2" value="Cập nhật"> 
                                <input type="reset" class="btn btn-danger mx-2" value="Hủy">
                            </div>
                        
                        </div>
<?php
error_reporting(0);
include_once("../../controller/cPhongKham.php");
$id = $_GET['$id'];
$p= new cPhongKham();
$phongkham= $p->xemthongtinphongkham($id);
if(isset($_REQUEST['maPhongKham']))
{
    $kq= $p->xemthongtinphongkham($_REQUEST['maPhongKham']);
    if($kq)
    {
        while($r=mysqli_fetch_assoc($kq))
        {
            $tenPhongKham=$r['tenPhongKham'];
            $maKhoa=$r['maKhoa'];
            $chucNang=$r['chucNang'];
            $trangthai=$r['tinhTrangHoatDong'];
        }
    }
}
?>

                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">Thông tin phòng khám</h4>

                        <form class="mb-3" onsubmit="return validateForm() ;">
    <div class="row">
        <!-- Left column -->
        <div class="col-md-6">
            <!-- Faculty of Management -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="khoaQuanLy" class="form-label">Khoa quản lý</label>
                </div>
                <div class="col-md-8">
                    <select name="khoaQuanLy" class="form-select form-control" id="khoaQuanLy" required>
                        <option value="" selected disabled>Chọn khoa quản lý</option>
                        <?php
                            include("../../controller/cKhoa.php");
                            $controller = new cKhoa();
                            $dsKhoa = $controller->layDSKhoa();
                            $selectedKhoa = isset($_REQUEST['maKhoa']) ? $_REQUEST['maKhoa'] : '';
                            
                            if ($dsKhoa) {
                                while ($loai = $dsKhoa->fetch_assoc()) {
                                    $selected = ($selectedKhoa == $loai['maKhoa']) ? 'selected' : '';
                                    echo "<option value='{$loai['maKhoa']}' {$selected}>{$loai['tenKhoa']}</option>";
                                }
                            } else {
                                echo "<option value='' disabled>Không có dữ liệu Khoa</option>";
                            }
                        ?>
                    </select>
                    <span id="tbKhoaQuanLy" class="text-danger"></span>
                </div>
            </div>

            <!-- Name of the clinic -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="tenPhongKham" class="form-label">Tên phòng khám</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="tenPhongKham" id="tenPhongKham" placeholder="Nhập tên phòng khám" value="<?= isset($tenPhongKham) ? $tenPhongKham : '' ?>" 
                    required maxlength="30"
                    oninput="validateTenPhongKham()">
                    <span id="tbTenPhongKham" class="text-danger"></span>
                </div>
            </div>
        </div>

        <!-- Right column -->
        <div class="col-md-6">
            <!-- Functions -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label for="chucNang" class="form-label">Chức năng</label>
                </div>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="chucNang" id="chucNang" placeholder="Nhập chức năng" value="<?= isset($chucNang) ? $chucNang : '' ?>"  required>
                    <span id="tbChucNang" class="text-danger"></span>
                </div>
            </div>

            <!-- Clinic Status -->
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
                                    <h4 class="header-title mb-3">Danh sách phòng khám</h4>
                                    <div class="row mb-3">
                                    <div class="col-md-6">
        <form method="GET" action="">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc mã phòng khám">
                <input type="submit" name ="btnsearch"class="btn btn-primary" value="Tìm kiếm">
            </div>
        </form>
    </div>
</form>
    </div>
</div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-hover table-centered m-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>STT</th>
                                                    <th>TÊN PHÒNG KHÁM</th>
                                                    <th>KHOA QUẢN LÝ</th>
                                                    <th>CHỨC NĂNG</th>
                                                   
                                                    <th>TRẠNG THÁI HOẠT ĐỘNG</th>
                                                </tr>
<script>
        function validateTenPhongKham() {
    var tenPhongKham = document.getElementById('tenPhongKham').value;
    var errorMsg = document.getElementById('tbTenPhongKham');
    
    // Biểu thức chính quy hỗ trợ tiếng Việt có dấu và khoảng trắng, không chứa số
    var regex = /^[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàạáâãèéẫêìíòấọóôõùúăđĩũơớƯĂẮẶẰẲẴÂẤẬẦẨẪÊẾỆỀỂỄÔỐỘỒỔỖƠỚỢỜỞỠƯỨỰỪỬỮỲỴỶỸÝỳỵỷỹý\s]+$/;

    if (tenPhongKham.length > 30) {
        errorMsg.textContent = 'Tên phòng khám không được quá 30 ký tự';
    } else if (!regex.test(tenPhongKham)) {
        errorMsg.textContent = 'Tên phòng khám chỉ được chứa chữ cái tiếng Việt và khoảng trắng, không được chứa số';
    } else {
        errorMsg.textContent = ''; // Xóa thông báo lỗi nếu hợp lệ
    }
}
        
        
    </script>
                                            </thead>
                                            <?php
    include_once("../../controller/cPhongKham.php");
    $qk= new cPhongKham();
    if(isset($_REQUEST['btnsearch']))
    {
        $tbl = $qk->timkiempk($_REQUEST['search']);
        
    }
    else{
        $tbl = $qk->laydanhsachphongkham();
    }
    

    if($tbl)
    {
        echo ' <tbody>';
        $stt= 1;
        while ($r=mysqli_fetch_assoc($tbl))
        {
            echo'<tr>
                                                    <td>'.$stt.'</td>   
                                                    <td><a href="?maPhongKham='.$r['maPhongKham'].'">'.$r['tenPhongKham'].'</a></td>
                                                    <td>'.$r['tenKhoa'].'</td>
                                                    <td>'.$r['chucNang'].'</td>
                                                
                                                    <td>'.$r['tinhTrangHoatDong'].'</td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                </tr>';
                                                $stt++;
        }

    }
    else{
        echo "Không có kết quả";
    }
?>
     <?php
if (isset($_REQUEST['btnadd']) && $_REQUEST['btnadd'] == 'Thêm') {
    // Lấy dữ liệu từ form
    $tenPhongKham = trim($_REQUEST['tenPhongKham']);
    $khoaQuanLy = trim($_REQUEST['khoaQuanLy']);
    $chucNang = trim($_REQUEST['chucNang']);
    $trangThai = $_REQUEST['trangthai'];

    // Kiểm tra nếu tên phòng khám đã tồn tại
    if ($qk->phongKhamTonTai($tenPhongKham)) {
        echo "<script>alert('Phòng khám đã tồn tại. Vui lòng nhập tên khác.');</script>";
        echo "<script>window.location.href = 'quanlyphongkham.php';</script>";
        exit;
    }

    // Thực hiện thêm phòng khám
    $insert = $qk->addphongkham($tenPhongKham, $khoaQuanLy, $chucNang, $trangThai);

    if ($insert) {
        echo "<script>alert('Thêm phòng khám thành công');</script>";
        echo "<script>window.location.href = 'quanlyphongkham.php';</script>";
    } else {
        echo "<script>alert('Thêm phòng khám không thành công. Vui lòng thử lại.');</script>";
        echo "<script>window.location.href = 'quanlyphongkham.php';</script>";
    }
}

?>      
<?php
if(isset($_REQUEST['btnupdate']) && $_REQUEST['btnupdate']=='Cập nhật' )

{
    
    
    $update= $qk->updatettpk($_REQUEST['maPhongKham'],$_REQUEST['tenPhongKham'],$_REQUEST['khoaQuanLy'],$_REQUEST['chucNang'],$_REQUEST['trangthai']);
    if($update)
    {
        echo "<script>alert('Cập nhật thông tin phòng khám thành công');</script>";
        echo "<script>window.location.href = 'quanlyphongkham.php';</script>";
    }
    else {
        echo "<script>alert('Cập nhật thông tin phòng khám không thành công');</script>";
        echo "<script>window.location.href = 'quanlyphongkham.php';</script>";
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
        <script src=../../assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="../../assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="../../assets/js/app.min.js"></script>
        <script>
    document.getElementById('formPhongKham').addEventListener('submit', function (event) {
        let isValid = true;
        const khoaQuanLy = document.getElementById('khoaQuanLy').value;
        const tenPhongKham = document.getElementById('tenPhongKham').value;
        const chucNang = document.getElementById('chucNang').value;
        const trangthai = document.getElementById('trangthai').value;

        // Validate Khoa Quản lý
        if (khoaQuanLy === "") {
            document.getElementById('tbKhoaQuanLy').textContent = "Vui lòng chọn khoa quản lý.";
            isValid = false;
        } else {
            document.getElementById('tbKhoaQuanLy').textContent = "";
        }

        // Validate Tên phòng khám
        if (tenPhongKham === "") {
            document.getElementById('tbTenPhongKham').textContent = "Vui lòng nhập tên phòng khám.";
            isValid = false;
        } else {
            document.getElementById('tbTenPhongKham').textContent = "";
        }

        // Validate Chức năng
        if (chucNang === "") {
            document.getElementById('tbChucNang').textContent = "Vui lòng nhập chức năng.";
            isValid = false;
        } else {
            document.getElementById('tbChucNang').textContent = "";
        }

        // Validate Trạng thái
        if (trangthai === "") {
            document.getElementById('tbTrangThai').textContent = "Vui lòng chọn trạng thái phòng khám.";
            isValid = false;
        } else {
            document.getElementById('tbTrangThai').textContent = "";
        }

        if (!isValid) {
            event.preventDefault(); // Ngăn không cho form submit
        }
    });
</script>       
    </body>

</html>