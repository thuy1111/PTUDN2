<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý thông tin nhân viên</title>
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
            background-color: #333; /* Màu nền mới cho header */
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
            margin-right: 8px; /* Giảm khoảng cách bên phải của icon */
        }

        .user-info span {
            font-size: 20px;
        }

        /* Container and Sidebar styling */
        .container {
            display: flex;
            height: calc(100% - 60px); /* Giảm chiều cao container để phù hợp với header */
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
            padding-left: 0; /* Bỏ padding mặc định */
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Thêm hiệu ứng đổ bóng */
        }

        .sidebar ul li a:hover {
            background-color: #e3f2fd; /* Hiệu ứng hover */
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        /* Main Content Styling */
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f9f9f9; /* Thêm màu nền cho nội dung chính */
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .content h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #0056b3; /* Thêm đường viền dưới tiêu đề */
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

        /* Form styling */
        .form-section {
            margin-top: 30px; /* Khoảng cách giữa bảng lịch và phần form */
            padding: 20px;
            background-color: #f9f9f9; /* Màu nền cho phần form */
            border-radius: 8px; /* Bo góc cho phần form */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus {
            border-color: #0056b3; /* Màu viền khi focus */
            outline: none; /* Bỏ viền mặc định */
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
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Thêm hiệu ứng đổ bóng */
        }

        .buttons .register {
            background-color: #0056b3; /* Màu xanh */
        }

        .buttons .register:hover {
            background-color: #004494; /* Màu xanh tối hơn khi hover */
        }

        .buttons .cancel {
            background-color: #dc3545; /* Màu đỏ */
        }

        .buttons .cancel:hover {
            background-color: #c82333; /* Màu đỏ tối hơn khi hover */
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
            <span>QLNS</span>
            
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>NAVIGATION</h2>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
                <li><a href="#"><i class="fas fa-user"></i>Quản lý thông tin nhân viên</a></li>
                <li><a href="#"><i class="fas fa-hospital"></i>Quản lý khoa</a></li>
                <li><a href="#"><i class="fas fa-clinic-medical"></i>Quản lý phòng khám</a></li>
                <li><a href="#"><i class="fas fa-shield-alt"></i>Quản lý bảo hiểm</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="content">
            <div class="form-section">
                    <h1>THÊM THÔNG TIN NHÂN VIÊN</h1>
                    <div class="form-group">
                        <label for="hoten">Họ và tên:</label>
                        <input type="text" id="hoten" name="hoten" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="namsinh">Năm sinh:</label>
                        <input type="text" id="namsinh" name="namsinh" placeholder="Nhập năm sinh">
                    </div>
                    <div class="form-group">
                        <label for="gioitinh">Giới tính:</label>
                        <input type="text" id="gioitinh" name="gioitinh" placeholder="Nhập giới tính">
                    </div>
                    <div class="form-group">
                        <label for="diachi">Địa chỉ:</label>
                        <input type="text" id="diachi" name="diachi" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="form-group">
                        <label for="sodienthoai">Số điện thoại:</label>
                        <input type="text" id="sodienthoai" name="sodienthoai" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="chucvu">Chức vụ:</label>
                        <input type="text" id="chucvu" name="chucvu" placeholder="Nhập chức vụ">
                    </div>
                    <div class="form-group">
                        <label for="bophan">Bộ phận:</label>
                        <input type="text" id="bophan" name="bophan" placeholder="Nhập bộ phận">
                    </div>
                    <div class="form-group">
                        <label for="thoigian">Thời gian làm việc:</label>
                        <input type="text" id="thoigian" name="thoigian" placeholder="Nhập thời gian làm việc">
                    </div>
                    <div class="form-group">
                        <label for="ngayvaolam">Ngày vào làm:</label>
                        <input type="text" id="ngayvaolam" name="ngayvaolam" placeholder="Nhập ngày vào làm">
                    </div>

                    <div class="form-group">
                        <label for="trangthai">Trạng thái:</label>
                        <input type="text" id="trangthai" name="trangthai" placeholder="Nhập trạng thái">
                    </div>
                    <div class="buttons">
                        <button type="button" class="register">THÊM NHÂN VIÊN</button>
                        <button type="button" class="cancel">HỦY</button>
                    </div>
                </div>         
            </div>
        </div>
    </div>
</body>
</html>
