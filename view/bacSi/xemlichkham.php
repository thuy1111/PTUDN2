<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Khám</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        /* Reset default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
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
            background-color: #f9f9f9;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .content h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #0056b3;
            padding-bottom: 10px;
        }

        /* Schedule Table styling */
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
        }

        .schedule-table th, .schedule-table td {
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
            list-style-type: none; /* Bỏ dấu chấm ở đầu mỗi dòng */
        }

        .schedule-list li {
            margin-bottom: 5px;
            color: #555;
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
            <span>BÁC SĨ</span>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>NAVIGATION</h2>
            <ul>
                <li><a href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li><a href="xemphieukham.php"><i class="fas fa-user"></i>Xem phiếu khám bệnh</a></li>
                <li><a href="xemlichkham.php"><i class="fas fa-hospital"></i>Xem lịch khám</a></li>
                <li><a href="dangkicalamviec.php"><i class="fas fa-clinic-medical"></i>Đăng ký ca</a></li>
                <li><a href="xemlichlamviec.php"><i class="fas fa-shield-alt"></i>Xem lịch làm việc</a></li>
            </ul>
        </div>

        <div class="main-content">
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
    </div>
</body>
</html>
