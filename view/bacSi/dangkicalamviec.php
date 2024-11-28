<?php
session_start();
include_once('../../controller/cLichLamViec.php');

$controller = new LichLamViecController();
$message = '';

// Check if user is logged in
if (!isset($_SESSION['maNhanVien'])) {
    // Redirect to login page or show an error
    header("Location:view/dangnhap/index.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['shifts'])) {
        $successCount = 0;
        $failCount = 0;
        foreach($_POST['shifts'] as $shift) {
            list($ngayLamViec, $caLamViec) = explode('|', $shift);
            $data = array(
                "ngayLamViec" => $ngayLamViec,
                "caLamViec" => $caLamViec,
                "maNhanVien" => $_SESSION['maNhanVien']
            );
            $result = $controller->registerShift($data);
            if ($result === "Đăng ký ca làm việc thành công.") {
                $successCount++;
            } else {
                $failCount++;
            }
        }
        if ($successCount > 0) {
            $message .= "Đã đăng ký thành công $successCount ca làm việc. ";
        }
        if ($failCount > 0) {
            $message .= "Không thể đăng ký $failCount ca làm việc. ";
        }
    } else {
        $message = "Vui lòng chọn ít nhất một ca làm việc để đăng ký.";
    }
}

// Rest of your code...



// Get the current week's schedule
$startDate = date('Y-m-d', strtotime('this week monday'));
$endDate = date('Y-m-d', strtotime('this week sunday'));
$weeklySchedule = $controller->getWeeklySchedule($_SESSION['maNhanVien'], $startDate, $endDate);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../../assets/inc/head.php"); ?>
    <style>
        /* Custom styles for shift registration page */
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }
        
        #weekDateRange {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            padding: 0.5em 1em;
            border-radius: 8px;
        }

        .shift-table th, .shift-table td {
            text-align: center;
            vertical-align: middle;
        }

        .shift-table th {
            background-color: #e9ecef;
        }

        .shift-table td input[type="checkbox"] {
            transform: scale(1.3);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-danger:hover {
            background-color: #b21f2d;
            border-color: #8a1c23;
        }

        .shift-table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <!-- Begin Page Wrapper -->
    <div id="wrapper">
        <!-- Topbar Section -->
        <?php include('../../assets/inc/nav.php'); ?>

        <!-- Left Sidebar Section -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <!-- Sidebar Menu -->
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichkham.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                        <li><a href="javascript: void(0);"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                    </ul>
                </div>
                <!-- End Sidebar -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- End Left Sidebar -->

        <!-- Main Content Section -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <!-- Page Title -->
                    <h2 class="mb-4">ĐĂNG KÝ CA</h2>

                    <!-- Week Navigation -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <button class="btn btn-outline-primary" id="prevWeekBtn">Tuần Trước</button>
                        <span id="weekDateRange" class="h5">Tuần từ: <?php echo date('d/m/Y', strtotime($startDate)); ?> đến <?php echo date('d/m/Y', strtotime($endDate)); ?></span>
                        <button class="btn btn-outline-primary" id="nextWeekBtn">Tuần Sau</button>
                    </div>

                    <!-- Shift Table -->
                    <div class="card">
                        <div class="card-body">
                            <form method="POST">
                                <div class="table-responsive">
                                    <table class="table table-bordered shift-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th>CA</th>
                                                <th>THỨ 2</th>
                                                <th>THỨ 3</th>
                                                <th>THỨ 4</th>
                                                <th>THỨ 5</th>
                                                <th>THỨ 6</th>
                                                <th>THỨ 7</th>
                                                <th>CN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $shifts = array('CA 1' => '7:30-11:30', 'CA 2' => '13:00-16:30', 'CA 3' => '17:00-19:30');
                                            foreach ($shifts as $shiftName => $shiftTime) {
                                                echo "<tr>";
                                                echo "<td><div>$shiftName</div><div class='shift-time'>$shiftTime</div></td>";
                                                for ($i = 0; $i < 7; $i++) {
                                                    $currentDate = date('Y-m-d', strtotime($startDate . " +$i days"));
                                                    $isChecked = false;
                                                    foreach ($weeklySchedule as $schedule) {
                                                        if ($schedule['ngayLamViec'] == $currentDate && $schedule['caLamViec'] == $shiftName) {
                                                            $isChecked = true;
                                                            break;
                                                        }
                                                    }
                                                    echo "<td><input type='checkbox' name='shifts[]' value='$currentDate|$shiftName' " . ($isChecked ? 'checked' : '') . "></td>";
                                                }
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Action Buttons -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary me-2" style="background-color: #6f42c1; border-color: #6f42c1;">
                                        ĐĂNG KÝ
                                    </button>
                                    <button type="reset" class="btn btn-danger">
                                        HỦY
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Content -->
    </div>
    <!-- End Page Wrapper -->

    <!-- JavaScript Section -->
    <script>
        let currentDate = new Date();

        function formatDate(date) {
            const dd = String(date.getDate()).padStart(2, '0');
            const mm = String(date.getMonth() + 1).padStart(2, '0');
            const yyyy = date.getFullYear();
            return `${dd}/${mm}/${yyyy}`;
        }

        function updateWeekDisplay() {
            let startOfWeek = new Date(currentDate);
            let day = startOfWeek.getDay();
            let diff = startOfWeek.getDate() - day + (day == 0 ? -6 : 1);
            startOfWeek.setDate(diff);

            let endOfWeek = new Date(startOfWeek);
            endOfWeek.setDate(startOfWeek.getDate() + 6);

            const weekRange = `Tuần từ: ${formatDate(startOfWeek)} đến ${formatDate(endOfWeek)}`;
            document.getElementById('weekDateRange').textContent = weekRange;
        }

        document.getElementById('prevWeekBtn').addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() - 7);
            updateWeekDisplay();
        });

        document.getElementById('nextWeekBtn').addEventListener('click', function() {
            currentDate.setDate(currentDate.getDate() + 7);
            updateWeekDisplay();
        });

        updateWeekDisplay(); // Initial call
    </script>

    <!-- Vendor JS -->
    <script src="../../assets/js/vendor.min.js"></script>
    <!-- Plugins JS -->
    <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../../assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

    <!-- Dashboard Init JS -->
    <script src="../../assets/js/pages/dashboard-1.init.js"></script>

    <!-- App JS -->
    <script src="../../assets/js/app.min.js"></script>
</body>
</html>

