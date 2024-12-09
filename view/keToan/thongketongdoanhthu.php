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

$alert = ""; // Variable to store the alert message

if (isset($_REQUEST['submit'])) {
    $startDate = $_REQUEST['thoiGianBatDau'];
    $endDate = $_REQUEST['thoiGianKetThuc'];

    if (empty($startDate) || empty($endDate)) {
        $alert = "Vui lòng chọn thời gian bắt đầu và kết thúc";
    } else {
        $revenue = $p->thongKeTongDoanhThu($startDate, $endDate);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<!--Head Code-->
<?php include("../../assets/inc/head.php");?>

<body>

<div id="wrapper">
    <?php include('../../assets/inc/nav.php'); ?>
    <div class="left-side-menu">
        <div class="slimscroll-menu">
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li>
                        <a href="index.php" style="text-decoration:none;">
                            <i class="fe-airplay"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="thongkedoanhthu.php" style="text-decoration:none;">
                            <i class="fas fa-chart-line"></i>
                            <span>Thống kê doanh thu</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="thongkedoanhthutheoloaithoigian.php" style="text-decoration:none;">Theo loại thời gian</a></li>
                            <li><a href="thongkedoanhthutheokhoa.php" style="text-decoration:none;">Theo khoa</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">THỐNG KÊ DOANH THU</h4>
                        </div>
                    </div>
                </div>

                <hr style="border-color: black;">

                <div class="row mb-2">
                    <div class="col-12 text-center">
                        <a href="thongketongdoanhthu.php" class="btn btn-primary mx-2">Thống kê tổng doanh thu</a>
                        <a href="thongkedoanhthutheoloaithoigian.php" class="btn btn-success mx-2">Theo loại thời gian</a>
                        <a href="thongkedoanhthutheokhoa.php" class="btn btn-danger mx-2">Theo khoa</a>
                    </div>
                </div>

                <hr style="border-color: black;">

                <form class="mb-3" id="revenueForm" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4 text-start">
                                    <label for="thoiGianBatDau" class="form-label">Thời gian bắt đầu</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        id="thoiGianBatDau" 
                                        name="thoiGianBatDau" 
                                        value="<?php echo date('Y-m-d'); ?>" 
                                        min="2023-03-08" 
                                        max="<?php echo date('Y-m-d'); ?>"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-4 text-end">
                                    <label for="thoiGianKetThuc" class="form-label">Thời gian kết thúc</label>
                                </div>
                                <div class="col-md-6">
                                    <input 
                                        type="date" 
                                        class="form-control" 
                                        id="thoiGianKetThuc" 
                                        name="thoiGianKetThuc" 
                                        value="<?php echo date('Y-m-d'); ?>" 
                                        min="2023-03-08" 
                                        max="<?php echo date('Y-m-d'); ?>"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mx-2" id="submit" name="submit">Xác nhận</button>
                        </div>
                    </div>
                </form>

                <hr style="border-color: black;">

                <h4 class="header-title mb-3">DOANH THU BỆNH VIỆN</h4>
                <div class="row">
                    <div class="col-6">
                        <div class="card-box">
                            <table class="table table-borderless table-hover table-centered m-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Thời gian bắt đầu</th>
                                        <th>Thời gian kết thúc</th>
                                        <th>Tổng doanh thu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if (isset($revenue)) {
                                        $formattedRevenue = number_format($revenue['value'], 0, ',', '.') . " VND";
                                        echo '
                                        <tr>
                                            <td id="displayStartDate">'.$startDate.'</td>
                                            <td id="displayEndDate">'.$endDate.'</td>
                                            <td id="displayRevenue">'.$formattedRevenue.'</td>
                                        </tr>';
                                    }else{
                                        echo '<script type="text/javascript">alert("Không có dữ liệu thống kê");</script>';
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-6">
                        <canvas id="revenueChart" width="300" height="300"></canvas>
                    </div>
                </div>

                <script src="../../assets/js/Chart.min.js"></script>
                <script src="../../assets/js/vendor/jquery-3.7.1.min.js"></script>

                <script>
                $(document).ready(function() {
                    <?php if ($alert != ""): ?>
                        alert("<?php echo $alert; ?>");
                    <?php endif; ?>
                    <?php if (isset($revenue['json'])) : ?>
                        const data = JSON.parse('<?php echo $revenue['json']; ?>');
                        if (data && data.tongDoanhThu) {
                            const startDate = $('#thoiGianBatDau').val();
                            const endDate = $('#thoiGianKetThuc').val();
                            updateChart([startDate, endDate], [data.tongDoanhThu]);
                        }

                        function updateChart(labels, data) {
                            const ctx = document.getElementById('revenueChart').getContext('2d');
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Tổng doanh thu (VND)',
                                        data: data,
                                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            ticks: {
                                                callback: function(value) {
                                                    return new Intl.NumberFormat('vi-VN', {
                                                        style: 'currency',
                                                        currency: 'VND'
                                                    }).format(value);
                                                }
                                            }
                                        }
                                    },
                                    plugins: {
                                        tooltip: {
                                            callbacks: {
                                                label: function(context) {
                                                    return new Intl.NumberFormat('vi-VN', {
                                                        style: 'currency',
                                                        currency: 'VND'
                                                    }).format(context.raw);
                                                }
                                            }
                                        }
                                    }
                                }
                            });
                        }
                    <?php endif; ?>
                });
                </script>
            </div>
        </div>
    </div>
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

<!-- Dashboard 1 init js-->
<script src="../../assets/js/pages/dashboard-1.init.js"></script>

<!-- App js-->
<script src="../../assets/js/app.min.js"></script>

</body>
</html>
