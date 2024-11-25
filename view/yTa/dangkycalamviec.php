<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../../assets/inc/head.php"); ?>
    <!-- Add any page-specific styles here -->
    <style>
        /* Custom styles for shift registration page */
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
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
                        <span id="weekDateRange" class="h5">Tuần từ: 06/11/2024 đến 12/11/2024</span>
                        <button class="btn btn-outline-primary" id="nextWeekBtn">Tuần Sau</button>
                    </div>

                    <!-- Shift Table -->
                    <div class="card">
                        <div class="card-body">
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
                                        <!-- Shift rows -->
                                        <tr>
                                            <td>
                                                <div>CA 1</div>
                                                <div class="shift-time">7:30-11:30</div>
                                            </td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                            <td><input type="checkbox" class="form-check-input"></td>
                                        </tr>
                                        <tr>
                                    <td>
                                        <div>CA 2</div>
                                        <div class="shift-time">13:00-16:30</div>
                                    </td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>CA 3</div>
                                        <div class="shift-time">17:00-19:30</div>
                                    </td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                    <td><input type="checkbox" class="form-check-input"></td>
                                </tr>
                                        <!-- Repeat for CA 2 and CA 3 -->
                                    </tbody>
                                </table>
                            </div>

                            <!-- Action Buttons -->
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-primary me-2" style="background-color: #6f42c1; border-color: #6f42c1;">
                                    ĐĂNG KÝ
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