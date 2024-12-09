<?php
include_once("../../controller/cUser.php");
session_start();

// Kiểm tra xem nhân viên đã đăng nhập chưa
if (isset($_SESSION["user"][0])) {
    $maNV = $_SESSION["user"][0];
    $role = $_SESSION["user"][2]; // Lấy vai trò của nhân viên từ session
    $ten = $_SESSION["user"][1]; // Lấy tên nhân viên từ session

    // Chỉ cho phép nhân viên kế toán truy cập (role = 6)
    if ($role !== '6') {
        echo "<script>alert('Bạn không có quyền truy cập!');window.location.href = '../dangNhap/';</script>";
        exit();
    }
} else {
    // Nếu chưa đăng nhập, chuyển về trang đăng nhập
    echo "<script>alert('Vui lòng đăng nhập!');window.location.href = '../dangNhap/';</script>";
    exit();
}

// Xử lý điều hướng dựa trên action
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'thong_ke_khoa':
            header("Location: thongkedoanhthutheokhoa.php");
            exit();

        case 'thong_ke_thoi_gian':
            header("Location: thongkedoanhthutheoloaithoigian.php");
            exit();

        case 'phan_phong_kham':
            header("Location: phanphongkham.php");
            exit();

        default:
            echo "<script>alert('Chức năng không hợp lệ!');window.location.href = 'index.php';</script>";
            exit();
    }
}
?>

<?php
include_once('../../controller/cThongKe.php');
$p = new cThongKe();

$alert = "";
$hasData = false; // Check if data exists
$doanhThu = [];
$jsonDoanhThu = "";

if (isset($_REQUEST['submit'])) {
    $startDate = $_REQUEST['startDate'] ?? null;
    $endDate = $_REQUEST['endDate'] ?? null;
    $khoa = $_REQUEST['khoa'] ?? "0";
    $loaiTG = $_REQUEST['loaiTG'] ?? "0";
    $khoangTG = $_REQUEST['timeRange'] ?? null;
    $year = $_REQUEST['year'] ?? null;

    // Validate input
    if ($loaiTG == "0") {
        $alert = 'Vui lòng chọn loại thời gian.';
    } elseif ($loaiTG == "1" && $khoangTG == "4") {
        if (empty($startDate) || empty($endDate)) {
            $alert = 'Vui lòng chọn đầy đủ thời gian bắt đầu và kết thúc.';
        } elseif ($startDate > $endDate) {
            $alert = 'Thời gian bắt đầu không thể lớn hơn thời gian kết thúc.';
        }
    } elseif (($loaiTG == "2" || $loaiTG == "3") && empty($year)) {
        $alert = 'Vui lòng chọn năm.';
    }

    if (!empty($alert)) {
        echo "<script>alert('$alert'); window.location.href='thongkedoanhthutheokhoa.php';</script>";
        return;
    }

    // Call revenue statistics function
    $result = $p->thongKeDoanhThuTheoKhoa($khoa, $loaiTG, $khoangTG, $startDate, $endDate, $year);
    $doanhThu = $result['result'] ?? [];
    $jsonDoanhThu = $result['json'] ?? "";
    $hasData = !empty($doanhThu);

    if (!$hasData) {
        $alert = "Chưa có dữ liệu thống kê trong khoảng thời gian này.";
        echo "<script>alert('$alert'); window.location.href='thongkedoanhthutheokhoa.php';</script>";
        return;
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

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">
                            <li>
                                <a href="index.php">
                                    <i class="fe-airplay"></i>
                                    <span> Dashboard </span>
                                </a>
                                
                            </li>

                            <li>
                                <a href="thongkedoanhthu.php">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Thống kê doanh thu</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <!-- <li>
                                        <a href="thongketongdoanhthu.php">Tổng doanh thu</a>
                                    </li> -->
                                    <li>
                                        <a href="thongkedoanhthutheoloaithoigian.php?action=thong_ke_thoi_gian">Theo loại thời gian</a>
                                    </li>
                                    <li>
                                        <a href="thongkedoanhthutheoloaithoigian.php?action=thong_ke_khoa">Theo khoa</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="phanphongkham.php">
                                    <i class="mdi mdi-hospital-building"></i>
                                    <span>Phân số thứ tự, phòng khám</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                
                            </li>
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
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
                                    
                                    <h4 class="page-title">THỐNG KÊ DOANH THU THEO KHOA</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <hr style="border-color: black;">
                        
                        <div class="row mb-2">
                            <div class="col-12 text-center">
                                <a href="thongkedoanhthutheoloaithoigian.php?action=thong_ke_thoi_gian" class="btn btn-success mx-2">THEO LOẠI THỜI GIAN</a>
                                <a href="thongkedoanhthutheoloaithoigian.php?action=thong_ke_khoa" class="btn btn-danger mx-2">THEO KHOA</a>
                            </div>
                        </div>

                        <hr style="border-color: black;">

                        <form class="mb-3" method="POST" action="">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-md-4 text-start">
                                            <label for="khoa" class="form-label">KHOA</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select form-control" id="khoa" name="khoa">
                                                <option value="0" selected>Tất cả khoa</option>
                                                <?php
                                                    include_once("../../controller/cKhoa.php");
                                                    $p = new cKhoa();
                                                    $tbl = $p->layDSKhoa();

                                                    if (!$tbl) {
                                                        echo "<option>Không thể kết nối</option>";
                                                    } elseif ($tbl == -1) {
                                                        echo "<option>Chưa có dữ liệu</option>";
                                                    } else {
                                                        while ($row = $tbl->fetch_assoc()) {
                                                            if (isset($_POST['submit']) && $_POST['khoa'] == $row['maKhoa']) {
                                                                echo "<option value='{$row["maKhoa"]}' $selected>{$row["tenKhoa"]}</option>";
                                                            }else{
                                                                echo "<option value='{$row["maKhoa"]}'>{$row["tenKhoa"]}</option>";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="row mb-3 align-items-center">
                                        <div class="col-md-4 text-start">
                                            <label for="loaiTG" class="form-label">LOẠI THỜI GIAN</label>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select form-control" id="loaiTG" name="loaiTG">
                                                <option value='1' <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '1' ? 'selected' : '' ?>>Ngày</option>
                                                <option value='2' <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '2' ? 'selected' : '' ?>>Tháng</option>
                                                <option value='3' <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '3' ? 'selected' : '' ?>>Quý</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                                <div class = "col-md-6">
                                    <div class="form-group time-range <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '1' ? '' : 'd-none' ?>">
                                        <div class="row">
                                            <div class="col-md-4 text-start">
                                                <label for="timeRange">KHOẢNG THỜI GIAN</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control timeRange" id="timeRange" name="timeRange">
                                                    <option value='1' <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '1' ? 'selected' : '' ?>>Hôm nay</option>
                                                    <option value='2' <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '2' ? 'selected' : '' ?>>Trong 7 ngày</option>
                                                    <option value='3' <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '3' ? 'selected' : '' ?>>Trong tháng</option>
                                                    <option value='4' <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '4' ? 'selected' : '' ?>>Tùy chọn</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group year <?= isset($_POST['loaiTG']) && ($_POST['loaiTG'] == '2' || $_POST['loaiTG'] == '3') ? '' : 'd-none' ?>">
                                        <div class="row">
                                            <div class="col-md-4 text-start">
                                                <label for="year">NĂM</label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="yearpicker" name="year" value="<?= htmlspecialchars($_POST['year'] ?? '') ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="custom-date-range <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '4' ? '' : 'd-none' ?> mt-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="startDate">NGÀY BẮT ĐẦU</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" id="startDate" name="startDate" class="form-control" 
                                                    value="<?= htmlspecialchars($_POST['startDate'] ?? date('Y-m-d')) ?>" 
                                                    min="2023-03-08" max="<?= date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="endDate">NGÀY KẾT THÚC</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" id="endDate" name="endDate" class="form-control" 
                                                    value="<?= htmlspecialchars($_POST['endDate'] ?? date('Y-m-d')) ?>" 
                                                    min="2023-03-08" max="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <button type="reset" class="btn btn-primary mx-2" id="reset" name="reset">RESET</button>
                                    <button type="submit" class="btn btn-primary mx-2" id="submit" name="submit">XÁC NHẬN</button>
                                </div>
                            </div>
                        </form>

                        <hr style="border-color: black;">

                        <h4 class="header-title mb-3">DOANH THU BỆNH VIỆN</h4>
                        

                        <div class="row">
                            <!-- Revenue chart -->
                            <div class="card-box">
                                <div class="table-responsive">
                                    <canvas id="revenueChart" width="600" height="400"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- jQuery Library -->
                        <script src="../../assets/js/vendor/jquery-3.7.1.min.js"></script>

                        <!-- Flatpickr CSS -->
                        <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">

                        <!-- Flatpickr JS -->
                        <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>

                        <script>
                        $(document).ready(function() {
                            // Hiển thị đúng trường dữ liệu khi trang được tải
                            function updateVisibilityBasedOnType() {
                                var selectedType = $("#loaiTG").val();
                                if (selectedType == "1") { // Ngày
                                    $('.time-range').removeClass('d-none'); // Hiển thị khoảng thời gian
                                    $('.custom-date-range').addClass('d-none'); // Ẩn ngày bắt đầu/kết thúc nếu không chọn "Tùy chọn"
                                    $('.year').addClass('d-none'); // Ẩn năm
                                } else if (selectedType == "2" || selectedType == "3") { // Tháng hoặc Quý
                                    $('.time-range').addClass('d-none'); // Ẩn khoảng thời gian
                                    $('.custom-date-range').addClass('d-none'); // Ẩn ngày bắt đầu/kết thúc
                                    $('.year').removeClass('d-none'); // Hiển thị năm
                                } else {
                                    // Loại thời gian không hợp lệ
                                    $('.time-range, .custom-date-range, .year').addClass('d-none');
                                }
                            }

                            // Gọi cập nhật ban đầu khi trang được tải
                            updateVisibilityBasedOnType();

                            // Cập nhật khi loại thời gian thay đổi
                            $("#loaiTG").change(function() {
                                updateVisibilityBasedOnType();
                            });

                            // Hiển thị khung chọn ngày khi người dùng chọn "Tùy chọn" trong khoảng thời gian
                            $('#timeRange').on('change', function() {
                                if ($(this).val() == '4') { // Nếu chọn "Tùy chọn"
                                    $('.custom-date-range').removeClass('d-none'); // Hiển thị khoảng ngày
                                } else {
                                    $('.custom-date-range').addClass('d-none'); // Ẩn khoảng ngày
                                }
                            });

                            // Flatpickr cho ngày
                            $("#startDate, #endDate").flatpickr({
                                dateFormat: "Y-m-d",  // Format YYYY-MM-DD
                                enableTime: false     // Không cần chọn thời gian
                            });
                        });
                    </script>

                    <script>
                        $(function () {
                            // Lấy năm hiện tại
                            const currentYear = new Date().getFullYear();

                            // Khởi tạo YearPicker
                            $('.yearpicker').yearpicker({
                                autoHide: true,             // Ẩn sau khi chọn năm
                                year: currentYear,          // Mặc định hiển thị năm hiện tại
                                startYear: 2000,            // Năm bắt đầu hiển thị
                                endYear: currentYear + 10,  // Năm kết thúc hiển thị
                                itemTag: 'li',              // Tag của danh sách năm
                                selectedClass: 'selected',  // Lớp CSS cho năm được chọn
                                disabledClass: 'disabled',  // Lớp CSS cho năm bị vô hiệu hóa
                                hideClass: 'hide',          // Lớp CSS để ẩn danh sách
                                highlightedClass: 'highlighted' // Lớp CSS cho năm được đánh dấu
                            });

                            // Log ra năm được chọn
                            $('.yearpicker').on('change', function () {
                                console.log("Năm đã chọn:", $(this).val());
                            });
                        });
                    </script>

                    <script>
                        // Xử lý khi nhấn nút RESET
                        document.getElementById('reset').addEventListener('click', function () {
                            // Đặt lại Loại thời gian về "Ngày"
                            document.getElementById('loaiTG').value = "1";

                            // Hiển thị khoảng thời gian cho "Ngày"
                            $('.time-range').removeClass('d-none'); // Hiển thị trường khoảng thời gian
                            $('.custom-date-range').addClass('d-none'); // Ẩn ngày bắt đầu/kết thúc
                            $('.year').addClass('d-none'); // Ẩn trường Năm

                            // Đặt lại giá trị cho khoảng thời gian
                            document.getElementById('timeRange').value = "1"; // Mặc định "Hôm nay"
                        });
                    </script>

                        <!-- Script to draw charts with chart.js -->
                        <script src="../../assets/js/Chart.min.js"></script>
                        <script>
                            document.addEventListener("DOMContentLoaded", function () {
                            const ctx = document.getElementById('revenueChart').getContext('2d');
                            const doanhThu = <?php echo $jsonDoanhThu ?? '[]'; ?>;

                            if (doanhThu.length > 0) {
                                // Tạo danh sách nhãn (labels) tùy theo loại thời gian (loaiTG)
                                const labels = [];
                                const seenLabels = new Set(); // Set để lưu trữ các nhãn đã được thêm

                                if ("<?= $loaiTG ?>" === "1") { // Loại TG = Ngày
                                    doanhThu.forEach(item => {
                                        if (!seenLabels.has(item.ngayKham)) {
                                            labels.push(item.ngayKham);
                                            seenLabels.add(item.ngayKham);
                                        }
                                    });
                                } else if ("<?= $loaiTG ?>" === "2") { // Loại TG = Tháng
                                    doanhThu.forEach(item => {
                                        const label = `Tháng ${item.thang} / ${item.nam}`;
                                        if (!seenLabels.has(label)) {
                                            labels.push(label);
                                            seenLabels.add(label);
                                        }
                                    });
                                } else if ("<?= $loaiTG ?>" === "3") { // Loại TG = Quý
                                    doanhThu.forEach(item => {
                                        const label = `Quý ${item.quy} / ${item.nam}`;
                                        if (!seenLabels.has(label)) {
                                            labels.push(label);
                                            seenLabels.add(label);
                                        }
                                    });
                                }

                                // Khởi tạo đối tượng departments
                                const departments = {};
                                doanhThu.forEach(item => {
                                    if (!departments[item.tenKhoa]) {
                                        departments[item.tenKhoa] = { 
                                            label: item.tenKhoa, 
                                            data: [], 
                                            backgroundColor: getRandomColor() 
                                        };
                                    }
                                    departments[item.tenKhoa].data.push(item.doanhThu);
                                });

                                // Chuyển departments thành mảng datasets
                                const datasets = Object.values(departments);

                                // Khởi tạo biểu đồ với Chart.js
                                new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: datasets
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: { position: 'top' },
                                            tooltip: {
                                                callbacks: {
                                                    label: context => `${context.dataset.label}: ${context.raw} VND`
                                                }
                                            }
                                        },
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                title: { display: true, text: 'Doanh thu (VND)' }
                                            },
                                            x: {
                                                title: { display: true, text: 'Thời gian' } // Nhãn thời gian phù hợp cho cả ngày, tháng, quý
                                            }
                                        }
                                    }
                                });

                                // Hàm tạo màu ngẫu nhiên cho từng khoa
                                function getRandomColor() {
                                    const hue = Math.floor(Math.random() * 360);
                                    return `hsl(${hue}, 70%, 60%)`;
                                }
                            } else {
                                console.log("No revenue data available");
                            }
                        });

                        </script>

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

        <!--Chart js-->
        <script src="../../assets/js/Chart.min.js"></script>

        <!--Jquery js-->
        <script src="../../assets/js/vendor/jquery-3.7.1.min.js"></script>
        <script src="../../assets/libs/YearPicker-master/docs/yearpicker.js" async></script>
        
    </body>

</html>