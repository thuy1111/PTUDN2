<!DOCTYPE html>
<<<<<<< HEAD:view/bacSi/index.php
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | Bác sĩ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
=======
<html lang="en">
<head>
    <?php include("../../assets/inc/head.php"); ?>
    <!-- Add any page-specific styles here -->
>>>>>>> 4d1f846c6b2b132ee354b9563bd52e6b983c6cb1:view/bacSi/dangkicalamviec.php
    <style>
        /* Custom styles for shift registration page */
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }
<<<<<<< HEAD:view/bacSi/index.php

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* Header styling */
        .header {
            background-color: #333;
            color: #fff;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .header img {
            height: 40px;
            margin-right: 10px;
        }

        .user-info {
            display: flex;
            align-items: center;
            font-weight: bold;
        }

        .user-icon {
            font-size: 28px;
            margin-right: 8px;
        }

        .user-info span {
            font-size: 20px;
        }

        /* Container and Sidebar styling */
        .container {
            display: flex;
            height: calc(100% - 60px);
        }

        .sidebar {
            width: 250px;
            background-color: #fff;
            border-right: 1px solid #ddd;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar img {
            width: 50px;
            margin-bottom: 20px;
        }

        .sidebar h2 {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar ul li a:hover {
            background-color: #e3f2fd;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            width: calc(100%-250px) !important;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            width: 100% !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
        }

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
        }

        .schedule-table th {
            background-color: #e3f2fd;
            color: #333;
            font-weight: bold;
        }

        /* Buttons */
        .buttons {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            margin-left: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .buttons .register {
            background-color: #6c63ff;
        }

        .buttons .register:hover {
            background-color: #5a54e8;
        }

        .buttons .cancel {
            background-color: #dc3545;
        }

        .buttons .cancel:hover {
            background-color: #c82333;
        }

        .header .user-icon {
            font-size: 28px;
            margin-right: 8px;
            /* Giảm khoảng cách bên phải của icon */
            vertical-align: middle;
            /* Căn giữa icon với văn bản */
        }

        .header span {
            font-size: 20px;
            color: #fff;
            vertical-align: middle;
            /* Căn giữa văn bản với icon */
        }
=======
>>>>>>> 4d1f846c6b2b132ee354b9563bd52e6b983c6cb1:view/bacSi/dangkicalamviec.php
    </style>
</head>

<body>
<<<<<<< HEAD:view/bacSi/index.php
    <div class="header">
        <div>
            <img src="../../assets/images/logo/hospital.png" alt="Logo">
        </div>
        <div class="user-info">
            <i class="fas fa-user-circle user-icon"></i>
            <span>BÁC SĨ</span>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>NAVIGATION</h2>
            <ul class="navbar">
                <li><a href="index.php" id="trangchu"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li><a href="index.php?p=xemphieu" id="xemphieu"><i class="fas fa-user"></i>Xem phiếu khám bệnh</a></li>
                <li><a href="index.php?p=xemlichkham" id="xemlichkham"><i class="fas fa-hospital"></i>Xem lịch khám</a></li>
                <li><a href="index.php?p=dkca" id="dkca"><i class="fas fa-clinic-medical"></i>Đăng ký ca</a></li>
                <li><a href="index.php?p=xemlichlam" id="xemlichlam"><i class="fas fa-shield-alt"></i>Xem lịch làm việc</a></li>
                <li><a href="../../view/dangXuat/" class="bg-gray-300"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a></li>
            </ul>
=======
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
>>>>>>> 4d1f846c6b2b132ee354b9563bd52e6b983c6cb1:view/bacSi/dangkicalamviec.php
        </div>
        <!-- End Left Sidebar -->

<<<<<<< HEAD:view/bacSi/index.php
        <div class="main-content">
            <?php
            $p = "";

            if (isset($_GET["p"])) {
                $p = $_GET["p"];
            } else $p = "trangchu";

            if ($p != "trangchu") {
                include_once($p . ".php");
            } else {
                echo "<div class='px-6 py-4 rounded shadow-md w-full'>
                        <div class='text-xl font-bold mb-4 pb-3 border-b border-black'>TRANG CHỦ</div>
                    </div>";
                include_once("index.php");
            }
            ?>
=======
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
>>>>>>> 4d1f846c6b2b132ee354b9563bd52e6b983c6cb1:view/bacSi/dangkicalamviec.php
        </div>
        <!-- End Main Content -->
    </div>
<<<<<<< HEAD:view/bacSi/index.php

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const navlinks = document.querySelectorAll(".navbar a");
            let idActive = "trangchu";

            navlinks.forEach(function(item) {
                item.addEventListener("click", () => {
                    navlinks.forEach((i) => i.classList.remove("bg-sky-300"));
                });
            });

            if (window.location.search != "")
                idActive = window.location.search.slice(3);

            window.addEventListener("load", () => {
                navlinks.forEach(function(item) {
                    if (item.id == idActive) item.classList.add("bg-sky-300");
                    else item.classList.remove("bg-sky-300");
                });
            });

        });
    </script>
</body>

=======
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
>>>>>>> 4d1f846c6b2b132ee354b9563bd52e6b983c6cb1:view/bacSi/dangkicalamviec.php
</html>