<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Làm việc</title>
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
            flex: 1;
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
            padding-left: 0;
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .buttons .register {
            background-color: #0056b3;
        }

        .buttons .register:hover {
            background-color: #004494;
        }

        .buttons .cancel {
            background-color: #dc3545;
        }

        .buttons .cancel:hover {
            background-color: #c82333;
        }

        /* Button active state */
        .active {
            background-color: #4CAF50; /* Green */
            color: white;
        }

        /* Shift notes styling */
        .shift-notes {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .shift-notes span {
            display: inline-block;
            margin-right: 15px;
        }

        .shift-notes strong {
            color: #333;
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
                <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li><a href="xemphieukham.php"><i class="fas fa-user"></i>Xem phiếu khám bệnh</a></li>
                <li><a href="xemlichkham.php"><i class="fas fa-hospital"></i>Xem lịch khám</a></li>
                <li><a href="dangkicalamviec.php"><i class="fas fa-clinic-medical"></i>Đăng ký ca</a></li>
                <li><a href="xemlichlamviec.php"><i class="fas fa-shield-alt"></i>Xem lịch làm việc</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="content">
                <h1>LỊCH LÀM VIỆC</h1>
                <div class="table-section">
                    <table class="schedule-table">
                        <tr>
                            <th>Thứ 2</th>
                            <th>Thứ 3</th>
                            <th>Thứ 4</th>
                            <th>Thứ 5</th>
                            <th>Thứ 6</th>
                            <th>Thứ 7</th>
                            <th>CN</th>
                        </tr>
                        <tr>
                            <td><button class="active">Ca 1</button></td>
                            <td><button class="active">Ca 1</button></td>
                            <td><button class="active">Ca 1</button></td>
                            <td><button class="active"></button></td>
                            <td><button class="active">Ca 1</button></td>
                            <td><button class="active">Ca 1</button></td>
                            <td><button class="active">Ca 1</button></td>
                        </tr>
                        <tr>
                            <td><button class="active">Ca 2</button></td>
                            <td><button class="active">Ca 2</button></td>
                            <td><button class="active"></button></td>
                            <td><button class="active">Ca 2</button></td>
                            <td><button class="active">Ca 2</button></td>
                            <td><button class="active">Ca 2</button></td>
                            <td><button class="active"></button></td>
                        </tr>
                        <tr>
                            <td><button class="active"></button></td>
                            <td><button class="active">Ca 3</button></td>
                            <td><button class="active">Ca 3</button></td>
                            <td><button class="active">Ca 3</button></td>
                            <td><button class="active"></button></td>
                            <td><button class="active">Ca 3</button></td>
                            <td><button class="active">Ca 3</button></td>
                        </tr>
                    </table>  
                </div>
                <div class="shift-notes">
                    <span><strong>Ca 1:</strong> 7:30 - 11:30</span>
                    <span><strong>Ca 2:</strong> 13:00 - 16:30</span>
                    <span><strong>Ca 3:</strong> 17:00 - 19:00</span>
                </div>
                <div class="buttons">
                    <button class="register">In lịch làm việc</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
