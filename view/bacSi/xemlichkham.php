<<<<<<< HEAD
<title>Lịch Khám</title>
<style>
    /* Schedule Table styling */
    .schedule-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 16px;
    }

    .schedule-table th,
    .schedule-table td {
        padding: 15px;
        border: 1px solid #ddd;
        text-align: center;
        vertical-align: middle;
    }

    .schedule-table th {
        background-color: #e3f2fd;
        color: #333;
        font-weight: bold;
    }

    /* Schedule List styling */
    .schedule-list {
        text-align: left;
        font-size: 15px;
        margin-top: 5px;
        list-style-type: none;
        /* Bỏ dấu chấm ở đầu mỗi dòng */
    }

    .schedule-list li {
        margin-bottom: 5px;
        color: #555;
    }
</style>
<div class="content">
    <h1>LỊCH KHÁM</h1>
    <div class="table-section">
        <table class="schedule-table">
            <tr>
                <th>Thông tin</th>
                <th>Họ và tên</th>
                <th>Học hàm/học vị</th>
                <th>Giới tính</th>
                <th>Phòng khám</th>
                <th>Lịch khám</th>
            </tr>
            <tr>
                <td>
                    <img alt="Doctor's Image" height="100" src="https://storage.googleapis.com/a1aa/image/sac0fpB30OX3S6mxtOzqZhh4aaHHUVmG7ScPze5zVWLCs6qTA.jpg" width="100" />
                </td>
                <td>Bùi Đức Vinh</td>
                <td>PGS TS BS</td>
                <td>Nam</td>
                <td>Tai mũi họng (PK 27)</td>
                <td>
                    <strong>Thứ hai:</strong>
                    <ul class="schedule-list">
                        <li><strong>Ca 1</strong> </li>
                        <li><strong>Ca 2</strong> </li>
                        <li><strong>Ca 3</strong> </li>
                    </ul>
                    <strong>Thứ sáu:</strong>
                    <ul class="schedule-list">
                        <li><strong>Ca 1</strong> </li>
                        <li><strong>Ca 2</strong> </li>
                        <li><strong>Ca 3</strong> </li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</div>
</div>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../../assets/inc/head.php"); ?>
    
    <style>
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }
        .shift-notes {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .shift-notes span {
            margin: 0 10px;
        }
        .week-navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <!-- Topbar -->
        <?php include('../../assets/inc/nav.php'); ?>

        <!-- Left Sidebar -->
        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="javascript: void(0);"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                        <li><a href="dangkicalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichlamviec.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <h2 class="mb-4">XEM LỊCH KHÁM</h2>
                    
                    <!-- Week Navigation -->
                    <div class="week-navigation mb-4">
                        <button class="btn btn-outline-primary" id="prevWeekBtn">Tuần Trước</button>
                        <span id="weekDateRange" class="h5">Tuần từ: 01/12/2024 đến 07/12/2024</span>
                        <button class="btn btn-outline-primary" id="nextWeekBtn">Tuần Sau</button>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ngày khám</th>
                                            <th>Giờ khám</th>
                                            <th>Chuyên khoa khám</th>
                                            <th>Bảo hiểm y tế</th>
                                            <th>Vấn đề khám</th>
                                            <th>Giá dịch vụ khám</th>
                                            <th>Số lượng</th>
                                            <th>Mã bệnh nhân</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01/12/2024</td>
                                            <td>7:30 - 8:30</td>
                                            <td>Nội khoa</td>
                                            <td>Có</td>
                                            <td>Đau dạ dày</td>
                                            <td>200,000 VND</td>
                                            <td>1</td>
                                            <td>BN001</td>
                                        </tr>
                                        <tr>
                                            <td>01/12/2024</td>
                                            <td>8:30 - 9:30</td>
                                            <td>Nhi khoa</td>
                                            <td>Không</td>
                                            <td>Cảm cúm</td>
                                            <td>150,000 VND</td>
                                            <td>1</td>
                                            <td>BN002</td>
                                        </tr>
                                        <tr>
                                            <td>01/12/2024</td>
                                            <td>9:30 - 10:30</td>
                                            <td>Tiêu hóa</td>
                                            <td>Có</td>
                                            <td>Viêm họng</td>
                                            <td>250,000 VND</td>
                                            <td>1</td>
                                            <td>BN003</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary me-2" style="background-color: #6f42c1; border-color: #6f42c1;">
                                    XEM CHI TIẾT
                                </button>
                                <button type="button" class="btn btn-danger">
                                    HỦY
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../../assets/js/vendor.min.js"></script>
    <script src="../../assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="../../assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="../../assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="../../assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
    <script src="../../assets/js/pages/dashboard-1.init.js"></script>
    <script src="../../assets/js/app.min.js"></script>

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
</body>
</html>
>>>>>>> 4d1f846c6b2b132ee354b9563bd52e6b983c6cb1
