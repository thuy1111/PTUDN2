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
                                <input type="reset" class="btn btn-danger mx-2" value="Hủy">
                            </div>
                        
                        </div>
<?php
error_reporting(0);
include_once("../../controller/cNhanVien.php");
$id = $_GET['$id'];
$p= new cNhanVien();
$nhanvien= $p->xemthongtinnv($id);
if(isset($_REQUEST['maNhanVien']))
{
    $kq= $p->xemthongtinnv($_REQUEST['maNhanVien']);
    if($kq)
    {
        while($r=mysqli_fetch_assoc($kq))
        {
            $tennv=$r['hoTen'];
            $ngaySinh=$r['ngaySinh'];
            $diachi=$r['diaChi'];
            $sdt=$r['soDienThoai'];
            $gioiTinh=$r['gioiTinh'];
            $email=$r['email'];
            $soDienThoai=$r['soDienThoai'];
            $tdn=$r['tenDangNhap'];
            $tdn=$r['tenDangNhap'];
            $mk=$r['matKhau'];
            $trangthai=$r['tinhTrangNhanVien'];
            $machucvu=$r['maChucVu'];
            $maChucVu=$r['maChucVu'];
        }
    }
}
?>
                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">Thông tin nhân viên</h4>

                        <form class="mb-3" onsubmit="return validateForm();" novalidate>
        <div class="row">
            <!-- Cột bên trái -->
            <div class="col-md-6">
                <!-- Tên nhân viên -->
                <div class="row mb-3">
                    <label for="tenNhanVien" class="col-md-3 col-form-label">Tên nhân viên</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="tenNhanVien" name="tenNhanVien" 
                               placeholder="Nhập tên nhân viên" aria-label="Tên nhân viên" value="<?= isset($tennv) ? $tennv : '' ?>" 
                               required maxlength="50"
                               oninput="validatetenNhanVien()">
                        <span id="tbtenNV" class="text-danger"></span>
                    </div>
                </div>
                

                <!-- Ngày sinh -->
                <div class="row mb-3">
                    <label for="ngaySinh" class="col-md-3 col-form-label">Ngày sinh</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" 
                               placeholder="Chọn ngày sinh" aria-label="Ngày sinh" value="<?= isset($ngaySinh) ? $ngaySinh : '' ?>" required>
                        <span id="tbngaySinh" class="text-danger"></span>
                    </div>
                </div>

                

                <!-- Địa chỉ -->
                <div class="row mb-3">
                    <label for="diaChi" class="col-md-3 col-form-label">Địa chỉ</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="diaChi" name="diaChi" 
                               placeholder="Nhập địa chỉ" aria-label="Địa chỉ" value="<?= isset($diachi) ? $diachi : '' ?>" required>
                        <span id="tbdiaChi" class="text-danger"></span>
                    </div>
                </div>

                <!-- Giới tính -->
                <div class="row mb-3">
                    <label for="gioiTinh" class="col-md-3 col-form-label">Giới tính</label>
                    <div class="col-md-9">
                        <select name="gioiTinh" id="gioiTinh" class="form-select" aria-label="Giới tính" required>
                            <option value="" selected disabled>Chọn giới tính</option>
                            <option value="Nam" <?= isset($gioiTinh) && $gioiTinh == 'Nam' ? 'selected' : '' ?>>Nam</option>
                            <option value="Nữ" <?= isset($gioiTinh) && $gioiTinh == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                        </select>
                        <span id="tbgioiTinh" class="text-danger"></span>
                    </div>
                </div>

                <!-- Bộ phận -->
                <div class="row mb-3">
                <label for="boPhan" class="col-md-3 col-form-label">Khoa</label>
                <div class="col-md-9">
                    <select name="boPhan" id="boPhan" class="form-select" aria-label="Bộ phận" required>
                        <option value="" selected disabled>Chọn khoa</option>
                        <?php
                            include("../../controller/cKhoa.php");
                            $controller = new cKhoa();
                            $dsKhoa = $controller->layDSKhoa();
                            $selectedKhoa = isset($_REQUEST['maKhoa']) ? $_REQUEST['maKhoa'] : '';
                            
                            if ($dsKhoa) {
                                while ($khoa = $dsKhoa->fetch_assoc()) {
                                    $selected = ($selectedKhoa == $khoa['maKhoa']) ? 'selected' : '';
                                    echo "<option value='{$khoa['maKhoa']}' {$selected}>{$khoa['tenKhoa']}</option>";
                                }
                            } else {
                                echo "<option value='' disabled>Không có dữ liệu Khoa</option>";
                            }
                        ?>
                    </select>
                    <span id="tbBoPhan" class="text-danger"></span>
                </div>
        </div>
            </div>

            <!-- Cột bên phải -->
            <div class="col-md-6">
                <!-- Số điện thoại -->
                <div class="row mb-3">
                    <label for="sDT" class="col-md-3 col-form-label">Số điện thoại</label>
                    <div class="col-md-9">
                    <input type="text" class="form-control" id="sDT" name="sDT" 
                    placeholder="Nhập số điện thoại"  
                    value="<?= isset($soDienThoai) ? $soDienThoai : '' ?>" 
                    required maxlength="10" oninput="validateSoDienThoai()">
                    <span id="tbSDT" class="text-danger"></span>
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                    <label for="eMail" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="eMail" name="eMail" 
                               placeholder="Nhập email" aria-label="Email" value="<?= isset($email) ? $email : '' ?>"  required>
                        <span id="tbEmail" class="text-danger"></span>
                    </div>
                </div>

                <!-- Tên đăng nhập -->
                <div class="row mb-3">
                    <label for="tdn" class="col-md-3 col-form-label">Tên đăng nhập</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="tdn" name="tdn" 
                               placeholder="Nhập tên đăng nhập" value="<?= isset($tdn) ? $tdn : '' ?>" required>
                    </div>
                </div>

                <!-- Mật khẩu -->
                <div class="row mb-3">
                    <label for="mk" class="col-md-3 col-form-label">Mật khẩu</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="mk" name="mk" 
                               placeholder="Nhập mật khẩu" value="<?= isset($mk) ? $mk : '' ?>" required>
                    </div>
                </div>

                <!-- Chức vụ -->
                <div class="row mb-3">
                    <label for="chucVu" class="col-md-3 col-form-label">Chức vụ</label>
                    <div class="col-md-9">
                        <select name="chucVu" id="chucVu" class="form-select" aria-label="Chức vụ" required>
                            <?php
                                include("../../controller/cChucVu.php");
                                $controller = new cChucVu();
                                $dsChucVu = $controller->layDSChucVu();
                                $selectedChucVu = isset($_REQUEST['maChucVu']) ? $_REQUEST['maChucVu'] : '';
                                
                                if ($dsChucVu) {
                                    while ($chucVu = $dsChucVu->fetch_assoc()) {
                                        $selected = ($selectedChucVu == $chucVu['maChucVu']) ? 'selected' : '';
                                        echo "<option value='{$chucVu['maChucVu']}' {$selected}>{$chucVu['tenChucVu']}</option>";
                                    }
                                } else {
                                    echo "<option value='' disabled>Không có dữ liệu Chức vụ</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>

                
                <!-- Trạng thái làm việc -->
                
                <div class="col-md-3">
                    <label for="trangthai" class="form-label">Trạng thái nhân viên</label>
                </div>
                <div class="col-md-9">
                    <select 
                        name="trangthai" 
                        class="form-select" 
                        id="trangthai" 
                        required>
                        <option value="">Chọn trạng thái nhân viên</option>
                        <option value="Đang làm việc">Đang làm việc</option>
                        <option value="Tạm nghỉ">Tạm nghỉ</option>
                        <option value="Nghỉ việc">Nghỉ việc</option>
                    </select>
                    <span id="tbtrangthai" class="text-danger"></span>
                </div>
                
            
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
                                                    <th>THUỘC KHOA</th>
                                                    <th>CHỨC VỤ</th>
                                                    <th>TÌNH TRẠNG LÀM VIỆC</th>
                                                </tr>

                                                <script>
        function validatetenNhanVien() {
    var tenNhanVien = document.getElementById('tenNhanVien').value;
    var errorMsg = document.getElementById('tbtenNV');
    
    // Biểu thức chính quy hỗ trợ tiếng Việt có dấu và khoảng trắng, không chứa số
    var regex = /^[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàạáâầãèéêìịíễòọóôõùúăýđĩũơớƯĂẮẶẰẲẴÂẤẬẦẨẪÊẾỆỀỂỄÔỐỘỒỔỖƠỚỢỜỞỠƯỨỰỪỬỮỲỴỶỸÝỳỵỷỹý\s]+$/;

    if (tenNhanVien.length > 50) {
        errorMsg.textContent = 'Tên nhân viên không được quá 50 ký tự';
    } else if (!regex.test(tenNhanVien)) {
        errorMsg.textContent = 'Tên nhân viên chỉ được chứa chữ cái tiếng Việt và khoảng trắng, không được chứa số';
    } else {
        errorMsg.textContent = ''; // Xóa thông báo lỗi nếu hợp lệ
    }   
}
function validateSoDienThoai() {
    // Lấy giá trị từ trường input
    var soDienThoai = document.getElementById('sDT').value.trim();
    var errorMsg = document.getElementById('tbSDT');
    
    // Biểu thức kiểm tra số điện thoại hợp lệ
    var regex = /^(03|08|09)\d{8}$/;
    
    // Kiểm tra hợp lệ
    if (!regex.test(soDienThoai)) {
        errorMsg.textContent = 'Số điện thoại phải bắt đầu bằng 03, 08, hoặc 09 và có 10 chữ số';
    } else {
        errorMsg.textContent = ''; // Xóa thông báo lỗi nếu hợp lệ
    }
}


</script>
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
        echo "Không có kết quả";
    }
?>
     <?php
    
    

if (isset($_REQUEST['btnadd']) && $_REQUEST['btnadd'] == 'Thêm') {
    // Lấy dữ liệu từ form
    $tenNhanVien = trim($_REQUEST['tenNhanVien']);
    $ngaySinh = date('Y/m/d', strtotime($_REQUEST['ngaySinh']));
    $gioiTinh = $_REQUEST['gioiTinh'];
    $tenDangNhap = trim($_REQUEST['tdn']);
    $matKhau = password_hash($_REQUEST['mk'], PASSWORD_BCRYPT); // Mã hóa mật khẩu
    $soDienThoai = trim($_REQUEST['sDT']);
    $email = trim($_REQUEST['eMail']);
    $diaChi = trim($_REQUEST['diaChi']);
    $chucVu = $_REQUEST['chucVu'];
    $boPhan = $_REQUEST['boPhan'];
    $trangThai = $_REQUEST['trangthai'];

    // Kiểm tra nếu tên nhân viên đã tồn tại
    if ($qk->nhanVienTonTai($tenNhanVien)) {
        echo "<script>alert('Tên nhân viên đã tồn tại.');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
        exit;
    }

    // Thực hiện thêm nhân viên
    $insert = $qk->addnhanvien($tenNhanVien, $ngaySinh, $gioiTinh, $tenDangNhap, $matKhau, $soDienThoai, $email, $diaChi, $chucVu, $boPhan, $trangThai);

    if ($insert) {
        echo "<script>alert('Thêm nhân viên thành công');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    } else {
        echo "<script>alert('Thêm nhân viên không thành công. Vui lòng thử lại.');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    }
}

?>      
<?php
if(isset($_REQUEST['btnupdate']) && $_REQUEST['btnupdate']=='Cập nhật' )

{
    $ngaysinh=$_REQUEST['ngaySinh'];
    $ngaysinh = date('Y/m/d', strtotime($ngaysinh));
    
    $update= $qk->updatettnv($_REQUEST['maNhanVien'],$_REQUEST['tenNhanVien'],$ngaysinh,$_REQUEST['sDT'],$_REQUEST['eMail'],$_REQUEST['diaChi'],$_REQUEST['trangthai'],$_REQUEST['chucVu'],$_REQUEST['boPhan']);
    if($update)
    {
        echo "<script>alert('Cập nhật thông tin nhân viên thành công');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    }
    else {
        echo "<script>alert('Cập nhật thông tin nhân viên không thành công');</script>";
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
        <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
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