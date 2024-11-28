<!DOCTYPE html>
<html lang="vi">
<?php
 error_reporting(1);
 session_start();
 ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ | Bác sĩ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for shift registration page */
        .shift-time {
            font-size: 0.8em;
            color: #6c757d;
        }

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
    </style>
</head>
<body>
    <div class="header">
        <div>
            <img src="../../assets/images/logo/hospital.png" alt="Logo">
        </div>
        <div class="user-info">
            <i class="fas fa-user-circle user-icon"></i>
            <span>BÁC SĨ -  <?php
            echo end(explode(" ", $_SESSION["user"][1]));
            ?></span>
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
        </div>
        <!-- End Left Sidebar -->

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
        </div>
        <!-- End Main Content -->
    </div>

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

</html>