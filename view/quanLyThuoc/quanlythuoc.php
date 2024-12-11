<?php
// Include necessary files
include_once("../../controller/cThuoc.php");
$p = new cThuoc();

// Fetch the selected medicine's details if `maThuoc` is set
if (isset($_REQUEST['maThuoc'])) {
    $kq = $p->xemthongtinthuoc($_REQUEST['maThuoc']);
    if ($kq) {
        $r = mysqli_fetch_assoc($kq);
        if ($r) {
            $tenThuoc = $r['tenThuoc'];
            $soLuong = $r['soLuong'];
            $donViCungCap = $r['donViCungCap'];
            $donGia = $r['donGia'];
            $donViTinh = $r['donViTinh'];
            $cachDung = $r['cachDung'];
            $trangThai = $r['trangThai'];
            $maLoaiThuoc = $r['maLoaiThuoc'];
            $maThuoc = $r['maThuoc']; // Save maThuoc to update the right record later
        }
    }
}

// Handle the form submission for update
if (isset($_POST['btnupdate'])) {
    // Sanitize the input data
    $maThuoc = isset($_POST['maThuoc']) ? intval($_POST['maThuoc']) : 0;
    $tenThuoc = htmlspecialchars(trim($_POST['tenThuoc']));
    $soLuong = intval($_POST['soLuongTon']);
    $donViCungCap = htmlspecialchars(trim($_POST['donViCungCap']));
    $donGia = floatval($_POST['donGia']);
    $donViTinh = htmlspecialchars(trim($_POST['donViTinh']));
    $cachDung = htmlspecialchars(trim($_POST['cachDung']));
    $trangThai = intval($_POST['trangThai']); // Change to intval
    $maLoaiThuoc = intval($_POST['loaiThuoc']);

    // Validate that the necessary fields are not empty
    if (empty($tenThuoc) || empty($soLuong) || empty($donViCungCap) || empty($donGia) || empty($donViTinh) || empty($cachDung) || empty($trangThai) || empty($maLoaiThuoc)) {
        echo "<script>alert('Vui lòng điền đầy đủ thông tin.');</script>";
    } else {
        // Call the update method from the controller
        $updateResult = $p->capnhatThuoc($maThuoc, $tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $maLoaiThuoc);

        if ($updateResult) {
            echo "<script>alert('Cập nhật thuốc thành công');</script>";
            echo "<script>window.location.href = 'quanlythuoc.php';</script>";
            exit;
        } else {
            echo "<script>alert('Cập nhật thuốc thất bại');</script>";
        }
    }
}

// Handle form submission for adding a new medicine
if (isset($_POST['btnadd'])) {
    $tenThuoc = $_POST['tenThuoc'];
    $soLuong = $_POST['soLuongTon'];
    $donViCungCap = $_POST['donViCungCap'];
    $donGia = $_POST['donGia'];
    $donViTinh = $_POST['donViTinh'];
    $cachDung = $_POST['cachDung'];
    $trangThai = $_POST['trangThai'];
    $loaiThuoc = $_POST['loaiThuoc'];

    // Check for duplicate medicine
    if ($p->thuocTonTai($tenThuoc)) {
        echo "<script>alert('Thuốc đã tồn tại! Không thể thêm mới.');</script>";
        echo "<script>window.location.href = 'quanlythuoc.php';</script>";
    } else {
        $addResult = $p->addthuoc($tenThuoc, $soLuong, $donViCungCap, $donGia, $donViTinh, $cachDung, $trangThai, $loaiThuoc);

        if ($addResult) {
            echo "<script>alert('Thêm thuốc mới thành công');</script>";
            echo "<script>window.location.href = 'quanlythuoc.php';</script>";
            exit;
        } else {
            echo "<script>alert('Thêm thuốc mới thất bại');</script>";
        }
    }
}

?>

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
        <?php include('../../assets/inc/sidebarthuoc.php');?>
        <!-- Left Sidebar End -->

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
                        <input type="hidden" name="maThuoc" value="<?= isset($maThuoc) ? $maThuoc : ''; ?>">
                        <hr style="border-color: black;">
                        <div class="row">
                            <div class="col-12 text-center">
                                <input type="submit" name="btnadd" class="btn btn-primary mx-2" value="Thêm">
                                <input type="submit" name="btnupdate" class="btn btn-success mx-2" value="Cập nhật"> 
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
                                        <input type="text" class="form-control" id="tenThuoc" name="tenThuoc" value="<?= isset($tenThuoc) ? $tenThuoc : ''; ?>" placeholder="Nhập tên thuốc" required>
                                    </div>
                                </div>

                                <!-- Số lượng tồn -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="soLuongTon" class="form-label">Số lượng tồn</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="soLuongTon" id="soLuongTon" value="<?= isset($soLuong) ? $soLuong : ''; ?>" placeholder="Nhập số lượng tồn" min="0" required>
                                    </div>
                                </div>

                                <!-- Đơn vị cung cấp -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="donViCungCap" class="form-label">Đơn vị cung cấp</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="donViCungCap" id="donViCungCap" value="<?= isset($donViCungCap) ? $donViCungCap : ''; ?>" placeholder="Nhập đơn vị cung cấp" required>
                                    </div>
                                </div>

                                <!-- Đơn giá -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="donGia" class="form-label">Đơn giá</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="donGia" id="donGia" value="<?= isset($donGia) ? $donGia : ''; ?>" placeholder="Nhập đơn giá" min="0" required>
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
                                        <input type="text" class="form-control" name="donViTinh" id="donViTinh" value="<?= isset($donViTinh) ? $donViTinh : ''; ?>" placeholder="Nhà sản xuất" required>
                                    </div>
                                </div>

                                <!-- Cách dùng -->
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="cachDung" class="form-label">Cách dùng</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="cachDung" id="cachDung" value="<?= isset($cachDung) ? $cachDung : ''; ?>" placeholder="Cách dùng" required>
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
                                                    $selected = (isset($maLoaiThuoc) && $maLoaiThuoc == $loai['maLoaiThuoc']) ? 'selected' : '';
                                                    echo "<option value='{$loai['maLoaiThuoc']}' $selected>{$loai['tenLoaiThuoc']}</option>";
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
                                            <option value="1" <?= (isset($trangThai) && $trangThai == 1) ? 'selected' : ''; ?>>Còn hàng</option>
                                            <option value="2" <?= (isset($trangThai) && $trangThai == 2) ? 'selected' : ''; ?>>Gần hết</option>
                                            <option value="3" <?= (isset($trangThai) && $trangThai == 3) ? 'selected' : ''; ?>>Hết hàng</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr style="border-color: black;">
                    
                    <!-- List of Medicines -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-3">Danh sách thuốc</h4>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <form method="GET" action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm theo tên hoặc loại thuốc">
                                                <input type="submit" name="btnsearch" class="btn btn-primary" value="Tìm kiếm">
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
                                                <th>TRẠNG THÁI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Fetch and display medicines
                                            $tbl = isset($_REQUEST['btnsearch']) ? $p->timkiemthuoc($_REQUEST['search']) : $p->layDSThuoc();

                                            if ($tbl) {
                                                $stt = 1;
                                                while ($r = mysqli_fetch_assoc($tbl)) {
                                                    
                                                    $trangThaiText = '';
                                                    switch ($r['trangThai']) {
                                                        case 1:
                                                            $trangThaiText = 'Còn hàng';
                                                            break;
                                                        case 2:
                                                            $trangThaiText = 'Gần hết';
                                                            break;
                                                        case 3:
                                                            $trangThaiText = 'Hết hàng';
                                                            break;
                                                        default:
                                                            $trangThaiText = 'Không xác định';
                                                    }

                                                    echo "<tr>
                                                            <td>$stt</td>
                                                            <td><a href='?maThuoc={$r['maThuoc']}'>$r[tenThuoc]</a></td>
                                                            <td>{$r['soLuong']}</td>
                                                            <td>{$r['donViCungCap']}</td>
                                                            <td>{$r['donGia']}</td>
                                                            <td>{$r['donViTinh']}</td>
                                                            <td>{$r['cachDung']}</td>
                                                            <td>{$r['tenLoaiThuoc']}</td>
                                                            <td>{$r['trangThai']}</td>
                                                          </tr>";
                                                    $stt++;
                                                }
                                            } else {
                                                echo "<tr><td colspan='9'>Không có kết quả</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- container -->
            </div> <!-- content -->
        </div><!-- content-page -->
    </div><!-- wrapper -->

    <!-- Scripts -->
</body>
</html>