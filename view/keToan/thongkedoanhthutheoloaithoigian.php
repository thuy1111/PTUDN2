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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $startDate = $_REQUEST['startDate'] ?? null;
    $endDate = $_REQUEST['endDate'] ?? null;
    $loaiTG = $_REQUEST['loaiTG'] ?? "0";
    $khoangTG = $_REQUEST['timeRange'] ?? null;
    $year = $_REQUEST['year'] ?? null;

    // // Validate input
    // if ($loaiTG == "0") {
    //     $alert = 'Vui lòng chọn loại thời gian.';
    // } elseif ($loaiTG == "1" && $khoangTG == "4") {
    //     if (empty($startDate) || empty($endDate)) {
    //         $alert = 'Vui lòng chọn đầy đủ thời gian bắt đầu và kết thúc.';
    //     } elseif ($startDate > $endDate) {
    //         $alert = 'Thời gian bắt đầu không thể lớn hơn thời gian kết thúc.';
    //     }
    // } elseif (($loaiTG == "2" || $loaiTG == "3") && empty($year)) {
    //     $alert = 'Vui lòng chọn năm.';
    // }

    if (!empty($alert)) {
        echo "<script>alert('$alert'); window.location.href='thongkedoanhthutheoloaithoigian.php';</script>";
        return;
    }

    // Call revenue statistics function
    $result = $p->thongKeDoanhThuTheoLoaiThoiGian($loaiTG, $khoangTG, $startDate, $endDate, $year);
    $doanhThu = $result['result'] ?? [];
    $jsonDoanhThu = $result['json'] ?? "";
    $hasData = !empty($doanhThu);

    if (!$hasData) {
        $alert = "Chưa có dữ liệu thống kê trong khoảng thời gian này.";
    }
}

?>

<?php
if (isset($_POST['reset'])) {
    // Hủy bỏ toàn bộ dữ liệu trong $_POST
    $_POST = [];
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
                                    
                                    <h4 class="page-title">THỐNG KÊ DOANH THU THEO LOẠI THỜI GIAN</h4>
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

                        <form class="mb-3" method="POST" id="statisticsForm">
                            <div class="row mb-3">
                                <div class="col-md-2 text-start">
                                    <label for="loaiTG" class="form-label">LOẠI THỜI GIAN</label>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="loaiTG" name="loaiTG" data-default="1">
                                        <option value="1" <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '1' ? 'selected' : '' ?>>Ngày</option>
                                        <option value="2" <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '2' ? 'selected' : '' ?>>Tháng</option>
                                        <option value="3" <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '3' ? 'selected' : '' ?>>Quý</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group time-range <?= isset($_POST['loaiTG']) && $_POST['loaiTG'] == '1' ? '' : 'd-none' ?>">
                                        <div class="row">
                                            <div class="col-md-4 text-start">
                                                <label for="timeRange">KHOẢNG THỜI GIAN</label>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control timeRange" id="timeRange" name="timeRange" data-default="1">
                                                    <option value="1" <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '1' ? 'selected' : '' ?>>Hôm nay</option>
                                                    <option value="2" <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '2' ? 'selected' : '' ?>>Trong 7 ngày</option>
                                                    <option value="3" <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '3' ? 'selected' : '' ?>>Trong tháng</option>
                                                    <option value="4" <?= isset($_POST['timeRange']) && $_POST['timeRange'] == '4' ? 'selected' : '' ?>>Tùy chọn</option>
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
                                                <?php
                                                // Xác định giá trị năm
                                                $selectedYear = date('Y'); // Mặc định là năm hiện tại
                                                
                                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                                    if (isset($_POST['submit'])) {
                                                        // Nếu bấm nút submit, giữ lại giá trị từ input 'year'
                                                        $selectedYear = !empty($_POST['year']) ? htmlspecialchars($_POST['year']) : $selectedYear;
                                                    } elseif (isset($_POST['reset'])) {
                                                        // Nếu bấm nút reset, trả về năm hiện tại
                                                        $selectedYear = date('Y');
                                                    }
                                                }
                                                ?>
                                                <input type="text" class="yearpicker" name="year" value="<?= $selectedYear ?>" />
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
                                                    min="2023-03-08" max="<?= date('Y-m-d') ?>" data-default="<?= date('Y-m-d') ?>">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="endDate">NGÀY KẾT THÚC</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="date" id="endDate" name="endDate" class="form-control" 
                                                    value="<?= htmlspecialchars($_POST['endDate'] ?? date('Y-m-d')) ?>" 
                                                    min="2023-03-08" max="<?= date('Y-m-d') ?>" data-default="<?= date('Y-m-d') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row text-center">
                                <div class="col-md-12">
                                    <input name='reset' type="submit" value='RESET' class="btn btn-primary" />
                                    <input name='submit' type="submit" value='XÁC NHẬN' class="btn btn-success" />
                                </div>
                            </div>
                        </form>

                    <hr style="border-color: black;">

                    <h4 class="header-title mb-3">DOANH THU BỆNH VIỆN</h4>
                    <div class="row">
                        <!-- Thông báo -->
                        <div id="alert">
                            <?php if (!empty($alert)): ?>
                                <div class="alert alert-warning text-center" role="alert" style="font-size: 16px; background-color: #fff3cd; color: #856404; border-color: #ffeeba; padding: 10px;">
                                    <?php echo htmlspecialchars($alert); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Hiển thị bảng doanh thu -->
                        <?php if ($hasData): ?>
                            <div class="col-6">
                                <div class="card-box" id="statisticsTable">
                                    <div class="table-responsive">
                                        <table class='table table-borderless table-hover table-centered m-0'>
                                            <thead class='thead-light'>
                                                <tr>
                                                    <th>Thời gian</th>
                                                    <th>Doanh thu</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($doanhThu as $row): ?>
                                                    <tr>
                                                        <td>
                                                            <?php if ($loaiTG == "1"): ?>
                                                                <?= $row['ngayKham'] ?>
                                                            <?php elseif ($loaiTG == "2"): ?>
                                                                T<?= $row['thang'] . '/' . $row['nam'] ?>
                                                            <?php else: ?>
                                                                Q<?= $row['quy'] . '/' . $row['nam'] ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?= number_format($row['totalRevenue'], 0) ?> VND</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Hiển thị biểu đồ -->
                            <div class="col-6">
                                <div class="card-box" id="chartContainer">
                                    <canvas id="revenueChart" width="500" height="500"></canvas>
                                </div>
                            </div>
                        <?php endif; ?>
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
                            // Lấy giá trị năm từ PHP
                            const currentYear = new Date().getFullYear();

                            // Đảm bảo selectedYear là giá trị hợp lệ
                            let selectedYear = <?= isset($selectedYear) ? json_encode($selectedYear) : 'null' ?>;

                            // Kiểm tra nếu selectedYear không rỗng hoặc không hợp lệ, gán giá trị mặc định
                            if (!selectedYear || isNaN(selectedYear)) {
                                selectedYear = currentYear;  // Gán năm hiện tại nếu không có giá trị hợp lệ
                            }

                            // Khởi tạo YearPicker với giá trị từ PHP
                            $('.yearpicker').yearpicker({
                                autoHide: true,             // Ẩn sau khi chọn năm
                                year: selectedYear,         // Hiển thị năm từ PHP
                                startYear: 2021,            // Năm bắt đầu hiển thị
                                endYear: currentYear + 10, // Năm kết thúc hiển thị
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

                    <script src="../../assets/js/Chart.min.js"></script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            const ctx = document.getElementById('revenueChart').getContext('2d');
                            const doanhThu = <?php echo $jsonDoanhThu ?? '[]'; ?>;

                            if (doanhThu.length > 0) {
                                // Prepare labels and data arrays
                                const labels = [];
                                const data = [];

                                // Prepare labels based on selected time period (loaiTG)
                                if ("<?= $loaiTG ?>" === "1") { // Day
                                    doanhThu.forEach(item => labels.push(item.ngayKham));
                                } else if ("<?= $loaiTG ?>" === "2") { // Month
                                    doanhThu.forEach(item => labels.push(`T${item.thang} / ${item.nam}`));
                                } else if ("<?= $loaiTG ?>" === "3") { // Quarter
                                    doanhThu.forEach(item => labels.push(`Q${item.quy} / ${item.nam}`));
                                }

                                // Push revenue values for each time period
                                doanhThu.forEach(item => {
                                    // Push the total revenue for each time period
                                    data.push(item.totalRevenue); // Adjust this line if you want department-specific data
                                });

                                // Chart.js initialization
                                new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Doanh thu (VND)',
                                            data: data,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        }]
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
                                                title: { display: true, text: 'Thời gian' }
                                            }
                                        }
                                    }
                                });
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