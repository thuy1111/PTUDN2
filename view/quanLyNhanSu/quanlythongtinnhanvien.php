
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
                               placeholder="Nhập tên nhân viên" aria-label="Tên nhân viên" required>
                        <span id="tbtenNV" class="text-danger"></span>
                    </div>
                </div>
                

                <!-- Ngày sinh -->
                <div class="row mb-3">
                    <label for="ngaySinh" class="col-md-3 col-form-label">Ngày sinh</label>
                    <div class="col-md-9">
                        <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" 
                               placeholder="Chọn ngày sinh" aria-label="Ngày sinh" required>
                        <span id="tbngaySinh" class="text-danger"></span>
                    </div>
                </div>

                

                <!-- Địa chỉ -->
                <div class="row mb-3">
                    <label for="diaChi" class="col-md-3 col-form-label">Địa chỉ</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="diaChi" name="diaChi" 
                               placeholder="Nhập địa chỉ" aria-label="Địa chỉ" required>
                        <span id="tbdiaChi" class="text-danger"></span>
                    </div>
                </div>

                <!-- Giới tính -->
                <div class="row mb-3">
                    <label for="gioiTinh" class="col-md-3 col-form-label">Giới tính</label>
                    <div class="col-md-9">
                        <select name="gioiTinh" id="gioiTinh" class="form-select" aria-label="Giới tính" required>
                            <option value="" selected disabled>Chọn giới tính</option>
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                        <span id="tbgioiTinh" class="text-danger"></span>
                    </div>
                </div>

                <!-- Bộ phận -->
                <div class="row mb-3">
                <label for="boPhan" class="col-md-3 col-form-label">Bộ phận</label>
                <div class="col-md-9">
                    <select name="boPhan" id="boPhan" class="form-select" aria-label="Bộ phận" required>
                        <option value="" selected disabled>Chọn bộ phận</option>
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
                    placeholder="Nhập số điện thoại" maxlength="10" pattern="(03|08|09)\d{8}" 
                    title="Số điện thoại phải bắt đầu bằng 03, 08 hoặc 09 và có đúng 10 chữ số" required>
                    <span id="tbSDT" class="text-danger"></span>
                    </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                    <label for="eMail" class="col-md-3 col-form-label">Email</label>
                    <div class="col-md-9">
                        <input type="email" class="form-control" id="eMail" name="eMail" 
                               placeholder="Nhập email" aria-label="Email" required>
                        <span id="tbEmail" class="text-danger"></span>
                    </div>
                </div>

                <!-- Tên đăng nhập -->
                <div class="row mb-3">
                    <label for="tdn" class="col-md-3 col-form-label">Tên đăng nhập</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" id="tdn" name="tdn" 
                               placeholder="Nhập tên đăng nhập" required>
                    </div>
                </div>

                <!-- Mật khẩu -->
                <div class="row mb-3">
                    <label for="mk" class="col-md-3 col-form-label">Mật khẩu</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" id="mk" name="mk" 
                               placeholder="Nhập mật khẩu" required>
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
                <div class="row mb-3">
                    <label for="trangthai" class="col-md-3 col-form-label">Trạng thái</label>
                    <div class="col-md-9">
                        <select name="trangthai" id="trangthai" class="form-select" required>
                            <option selected disabled>Cập nhật trạng thái</option>
                            <option value="Đang làm việc">Đang làm việc</option>
                            <option value="Nghỉ việc">Nghỉ việc</option>
                            <option value="Tạm nghỉ">Tạm nghỉ</option>
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
        echo "Không có kết quả";
    }
?>
     <?php
if(isset($_REQUEST['btnadd']) && $_REQUEST['btnadd']=='Thêm' )

{
    $ngaysinh=$_REQUEST['ngaySinh'];
    $ngaysinh = date('Y/m/d', strtotime($ngaysinh));
    $insert= $qk->addnhanvien($_REQUEST['tenNhanVien'],$ngaysinh,$_REQUEST['gioiTinh'],$_REQUEST['tdn'],$_REQUEST['mk'],$_REQUEST['sDT'],$_REQUEST['eMail'],$_REQUEST['diaChi'], $_REQUEST['chucVu'],$_REQUEST['boPhan']);
    if($insert)
    {
        echo "<script>alert('Thêm nhân viên thành công');</script>";
        echo "<script>window.location.href = 'quanlythongtinnhanvien.php';</script>";
    }
    else {
        echo "<script>alert('Thêm nhân viên không thành công');</script>";
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
                                           
                                           
    <script>
    function validateForm() {
        let isValid = true;

        // Lấy giá trị của các trường
        const tenNhanVien = document.getElementById("tenNhanVien").value.trim();
        const ngaySinh = document.getElementById("ngaySinh").value.trim();
        const gioiTinh = document.getElementById("gioiTinh").value;
        const diaChi = document.getElementById("diaChi").value.trim();
        const sDT = document.getElementById("sDT").value.trim();
        const eMail = document.getElementById("eMail").value.trim();
        const boPhan = document.getElementById("boPhan").value;
        const chucVu = document.getElementById("chucVu").value;
        const trangthai = document.getElementById("trangthai").value;

        // Xóa thông báo lỗi cũ
        document.getElementById("tbtenNV").textContent = "";
        document.getElementById("tbngaySinh").textContent = "";
        document.getElementById("tbgioiTinh").textContent = "";
        document.getElementById("tbdiaChi").textContent = "";
        document.getElementById("tbSDT").textContent = "";
        document.getElementById("tbEmail").textContent = "";

        // Kiểm tra tên nhân viên
        if (tenNhanVien === "") {
            document.getElementById("tbtenNV").textContent = "Tên nhân viên không được để trống.";
            isValid = false;
        }

        // Kiểm tra ngày sinh
        if (ngaySinh === "") {
            document.getElementById("tbngaySinh").textContent = "Ngày sinh không được để trống.";
            isValid = false;
        }

        // Kiểm tra giới tính
        if (gioiTinh === "Chọn giới tính") {
            document.getElementById("tbgioiTinh").textContent = "Vui lòng chọn giới tính.";
            isValid = false;
        }

        // Kiểm tra địa chỉ
        if (diaChi === "") {
            document.getElementById("tbdiaChi").textContent = "Địa chỉ không được để trống.";
            isValid = false;
        }

        // Kiểm tra số điện thoại
        // Kiểm tra số điện thoại
const sdtRegex = /^(03|08|09)\d{8}$/; // Bắt đầu bằng 03, 08, hoặc 09 và có đúng 10 chữ số
if (sDT === "") {
    document.getElementById("tbSDT").textContent = "Số điện thoại không được để trống.";
    isValid = false;
} else if (!sdtRegex.test(sDT)) {
    document.getElementById("tbSDT").textContent = "Số điện thoại không hợp lệ. Số điện thoại phải bắt đầu bằng 03, 08 hoặc 09 và có đúng 10 chữ số.";
    isValid = false;
} else {
    document.getElementById("tbSDT").textContent = ""; // Xóa lỗi nếu hợp lệ
}

        // Kiểm tra email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Định dạng email cơ bản
        if (eMail === "") {
            document.getElementById("tbEmail").textContent = "Email không được để trống.";
            isValid = false;
        } else if (!emailRegex.test(eMail)) {
            document.getElementById("tbEmail").textContent = "Email không hợp lệ.";
            isValid = false;
        }

        // Kiểm tra bộ phận
        if (boPhan === "") {
            alert("Vui lòng chọn bộ phận.");
            isValid = false;
        }

        // Kiểm tra chức vụ
        if (chucVu === "") {
            alert("Vui lòng chọn chức vụ.");
            isValid = false;
        }

        // Kiểm tra trạng thái
        if (trangthai === "Cập nhật trạng thái") {
            alert("Vui lòng chọn trạng thái làm việc.");
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