<?php
if (isset($_POST['btnadd'])) {
    include_once("../../controller/cThuoc.php");
    $p = new cThuoc();

    $tenThuoc = $_POST['tenThuoc'];
    $soLuong = $_POST['soLuongTon'];
    $donViCungCap = $_POST['donViCungCap'];
    $donGia = $_POST['donGia'];
    $donViTinh = $_POST['donViTinh'];
    $cachDung = $_POST['cachDung'];
    $trangThai = $_POST['trangThai'];
    $loaiThuoc = $_POST['loaiThuoc'];

    // Kiểm tra thuốc đã tồn tại
    if ($p->thuocTonTai($tenThuoc)) {
        echo "<script>alert('Thuốc đã tồn tại trong hệ thống! Không thể thêm mới.');</script>";
        echo "<script>window.location.href = 'quanlythuoc.php';</script>";
    } else {
        // Gọi hàm thêm thuốc
        $addResult = $p->addthuoc($tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $loaiThuoc);

        if ($addResult) {
            echo "<script>alert('Thêm thuốc mới thành công.');</script>";
            echo "<script>window.location.href = 'quanlythuoc.php';</script>";
        } else {
            echo "<script>alert('Thêm thuốc mới thất bại!');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<!-- Head Code -->
<?php include("../../assets/inc/head.php");?>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <?php include('../../assets/inc/nav.php'); ?>
        <!-- end Topbar -->
        <?php include('../../assets/inc/sidebarthuoc.php'); ?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Thêm Thuốc</h4>
                            </div>
                        </div>
                    </div>     
                    <!-- end page title --> 
                    
                    <form class="mb-3" method="post">
                        <hr style="border-color: black;">
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" name="btnadd" class="btn btn-primary mx-2" value="Thêm thuốc">
                                <button class="btn btn-danger" onclick="window.location.href='quanlythuoc.php';">Quay Lại</button>
                            </div>
                        </div>
                        
                        <hr style="border-color: black;">
                        <h4 class="header-title mb-3">Thông tin thuốc</h4>

                        <div class="row">
                            <!-- Left column -->
                            <div class="col-md-6">
                                <!-- Tên thuốc -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="tenThuoc" class="form-label">Tên thuốc</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" id="tenThuoc" name="tenThuoc" placeholder="Nhập tên thuốc" required>
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
                </div> <!-- container -->
            </div> <!-- content -->
        </div><!-- content-page -->
    </div><!-- wrapper -->

    <!-- Scripts -->
</body>
</html>
