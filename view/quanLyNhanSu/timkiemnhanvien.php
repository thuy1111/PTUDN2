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
            border-radius: 8px;
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
                <h1>XEM THÔNG TIN NHÂN VIÊN</h1>
      <div class="search-bar">
     <input placeholder="Nhập tên hoặc mã nhân viên..." type="text"/>
     <button>
      <i class="fas fa-search">
      </i>
     </button>
    </div>
                <table class="schedule-table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>MÃ NV</th>
                            <th>HỌ TÊN</th>
                            <th>NĂM SINH</th>
                            <th>GIỚI TÍNH</th>
                            <th>ĐỊA CHỈ</th>
                            <th>EMAIL</th>
                            <th>SỐ ĐIỆN THOẠI</th>
                            <th>CHỨC VỤ</th>
                            <th>BỘ PHẬN</th>
                            <th>THỜI GIAN LÀM VIỆC</th>
                            <th>NGÀY VÀO LÀM</th>
                            <th>TRẠNG THÁI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>NV001</td>
                            <td>Trần Thị Hoa</td>
                            <td>1990</td>
                            <td>Nữ</td>
                            <td>456 Đường DEF, TP.HCM</td>
                            <td>hoa.tran@example.com</td>
                            <td>0987654321</td>
                            <td>Y tá</td>
                            <td>Khám</td>
                            <td>08:00 - 16:00</td>
                            <td>15/05/2015</td>
                            <td>Đang làm việc</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>NV002</td>
                            <td>Bùi Đức Vinh</td>
                            <td>1988</td>
                            <td>Nam</td>
                            <td>789 Đường GHI, TP.HCM</td>
                            <td>vinh.bui@example.com</td>
                            <td>0912345678</td>
                            <td>Bác Sĩ</td>
                            <td>Ngoại</td>
                            <td>08:00 - 16:00</td>
                            <td>10/10/2012</td>
                            <td>Đang làm việc</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>NV003</td>
                            <td>Nguyễn Văn Toàn</td>
                            <td>1985</td>
                            <td>Nam</td>
                            <td>123 Đường ABC, TP.HCM</td>
                            <td>toan.nguyen@example.com</td>
                            <td>0912345678</td>
                            <td>Bác Sĩ</td>
                            <td>Ngoại</td>
                            <td>08:00 - 16:00</td>
                            <td>01/01/2010</td>
                            <td>Đang làm việc</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>NV004</td>
                            <td>Nguyễn Thị Lan</td>
                            <td>1995</td>
                            <td>Nữ</td>
                            <td>321 Đường JKL, TP.HCM</td>
                            <td>lan.nguyen@example.com</td>
                            <td>0976543210</td>
                            <td>Y tá</td>
                            <td>Khám</td>
                            <td>08:00 - 16:00</td>
                            <td>20/06/2018</td>
                            <td>Đang làm việc</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>NV005</td>
                            <td>Nguyễn Văn An</td>
                            <td>1980</td>
                            <td>Nam</td>
                            <td>101 Đường MNO, TP.HCM</td>
                            <td>an.nguyen@example.com</td>
                            <td>0901234567</td>
                            <td>Điều dưỡng</td>
                            <td>Khám</td>
                            <td>08:00 - 16:00</td>
                            <td>05/04/2019</td>
                            <td>Đang làm việc</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>NV006</td>
                            <td>Đỗ Thị Mai</td>
                            <td>1992</td>
                            <td>Nữ</td>
                            <td>202 Đường PQR, TP.HCM</td>
                            <td>mai.do@example.com</td>
                            <td>0987654322</td>
                            <td>Bác Sĩ</td>
                            <td>Nội</td>
                            <td>08:00 - 16:00</td>
                            <td>12/09/2016</td>
                            <td>Đang làm việc</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>NV007</td>
                            <td>Trần Văn Bình</td>
                            <td>1987</td>
                            <td>Nam</td>
                            <td>303 Đường STU, TP.HCM</td>
                            <td>binh.tran@example.com</td>
                            <td>0911111111</td>
                            <td>Bác Sĩ</td>
                            <td>Phẫu thuật</td>
                            <td>08:00 - 16:00</td>
                            <td>15/11/2013</td>
                            <td>Đang làm việc</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
