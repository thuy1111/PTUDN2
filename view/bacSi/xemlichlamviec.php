<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("../../assets/inc/head.php"); ?>
    <title>Lịch Làm Việc - Quản Lý Ca</title>
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
        <?php include('../../assets/inc/nav.php'); ?>

        <div class="left-side-menu">
            <div class="slimscroll-menu">
                <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                        <li><a href="index.php"><i class="fe-airplay"></i><span>Dashboard</span></a></li>
                        <li><a href="xemphieukham.php"><i class="fas fa-user-tie"></i><span>Xem phiếu khám bệnh</span><span class="menu-arrow"></span></a></li>
                        <li><a href="xemlichkham.php"><i class="mdi mdi-hospital-building"></i><span>Xem lịch khám</span><span class="menu-arrow"></span></a></li>
                        <li><a href="dangkicalamviec.php"><i class="mdi mdi-hospital-building"></i><span>Đăng ký ca</span><span class="menu-arrow"></span></a></li>
                        <li><a href="javascript: void(0);"><i class="mdi mdi-hospital-building"></i><span>Xem lịch làm việc</span><span class="menu-arrow"></span></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <h2 class="mb-4">LỊCH LÀM VIỆC</h2>
                    
                    <div class="week-navigation">
                        <button class="btn btn-secondary" id="prevWeekBtn">Tuần Trước</button>
                        <span id="weekDateRange" class="h5">Tuần từ: 06/11/2024 đến 12/11/2024</span>
                        <button class="btn btn-secondary" id="nextWeekBtn">Tuần Sau</button>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered shift-table">
                                    <thead>
                                        <tr>
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
                                        <tr>
                                            <td><button class="btn btn-primary">Ca 1</button></td>
                                            <td><button class="btn btn-primary">Ca 1</button></td>
                                            <td><button class="btn btn-primary">Ca 1</button></td>
                                            <td><button class="btn btn-secondary" aria-label="Không có ca"></button></td>
                                            <td><button class="btn btn-primary">Ca 1</button></td>
                                            <td><button class="btn btn-primary">Ca 1</button></td>
                                            <td><button class="btn btn-primary">Ca 1</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-primary">Ca 2</button></td>
                                            <td><button class="btn btn-primary">Ca 2</button></td>
                                            <td><button class="btn btn-secondary" aria-label="Không có ca"></button></td>
                                            <td><button class="btn btn-primary">Ca 2</button></td>
                                            <td><button class="btn btn-primary">Ca 2</button></td>
                                            <td><button class="btn btn-primary">Ca 2</button></td>
                                            <td><button class="btn btn-secondary" aria-label="Không có ca"></button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-secondary" aria-label="Không có ca"></button></td>
                                            <td><button class="btn btn-primary">Ca 3</button></td>
                                            <td><button class="btn btn-primary">Ca 3</button></td>
                                            <td><button class="btn btn-primary">Ca 3</button></td>
                                            <td><button class="btn btn-secondary" aria-label="Không có ca"></button></td>
                                            <td><button class="btn btn-primary">Ca 3</button></td>
                                            <td><button class="btn btn-primary">Ca 3</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="shift-notes mt-3">
                                <span><strong>Ca 1:</strong> 7:30 - 11:30</span>
                                <span><strong>Ca 2:</strong> 13:00 - 16:30</span>
                                <span><strong>Ca 3:</strong> 17:00 - 19:00</span>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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