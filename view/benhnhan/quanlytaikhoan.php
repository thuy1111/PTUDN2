<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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
            font-family: 'Times New Roman', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* Header styling */
        .header {
            background-color: #333;
            color: white;
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
            background-color: #e1f5fe;
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
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 10px;
        }

        /* Search and Form styling */
        .search {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .search input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
            flex: 1;
        }

        .search select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical; /* Cho phép điều chỉnh chiều cao cho textarea */
        }

    </style>
</head>
<body>
    <div class="header">
        <div>
            <img src="../../assets/img/logo.png"  alt="Logo">
        </div>
        <div>
            <span>BỆNH NHÂN</span>
            <i class="fas fa-user-circle user-icon"></i>
        </div>
    </div>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="xemphieukham.php"><i class="fas fa-user"></i><b>Quản lý tài khoản</b></a></li>
                <li><a href="dangkylich.php"><i class="fas fa-clinic-medical"></i>Xem lịch khám</a></li>
                <li><a href="xemlichlam.php"><i class="fas fa-shield-alt"></i>Xem bệnh án</a></li>
                <li><a href="xemlichlam.php"><i class="fas fa-shield-alt"></i>Đăng ký khám bệnh</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="content">
                <h1>THÔNG TIN CÁ NHÂN</h1>
                </div>
                <div class="form-group">
                    
                    <label for="ho-ten">Họ tên:</label>
                    <input id="ho-ten" type="text"  />
                    
                    <label for="ngay-sinh">Ngày sinh:</label>
                    <input id="ngay-sinh" type="text"  />
                    
                    <label for="gioi-tinh">Giới tính:</label>
                    <select id="gioi-tinh">
                    <option>Chọn giới tính</option></select>
                    
                    <label for="dia-chi">Địa chỉ:</label>
                    <input id="dia-chi" type="text"  />
                    
                    <label for="email">Email:</label>
                    <input id="email" type="text" />

                    <label for="sdt">Số điện thoại:</label>
                    <input id="sdt" type="text"  />
                    
                    <label for="bhyt">BHYT:</label>
                    <input id="bhyt" type="text"  />   
                </div>

                
        </div>
    </div>
</body>
</html>
