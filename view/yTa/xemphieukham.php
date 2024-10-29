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
            background-color: #4a90e2;
        }

        .buttons .register:hover {
            background-color: #357ABD;
        }

        .buttons .cancel {
            background-color: #dc3545;
        }

        .buttons .cancel:hover {
            background-color: #c82333;
        }

    </style>
</head>
<body>
    <div class="header">
        <div>
            <img src="../../assets/img/logo.png"  alt="Logo">
        </div>
        <div>
            <span>Y TÁ</span>
            <i class="fas fa-user-circle user-icon"></i>
        </div>
    </div>

    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="xemphieukham.php"><i class="fas fa-user"></i><b>Xem phiếu khám bệnh</b></a></li>
                <li><a href="dangkylich.php"><i class="fas fa-clinic-medical"></i>Đăng ký ca</a></li>
                <li><a href="xemlichlam.php"><i class="fas fa-shield-alt"></i>Xem lịch làm việc</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="content">
                <h1>PHIẾU KHÁM BỆNH</h1>
                <div class="search">
                    <input placeholder="Tìm kiếm" type="text" />
                    <select>
                        <option>3231424 TRẦN ĐỨC TUẤN</option>
                        <option>3131423 NGUYỄN TRỌNG CẨN</option>
                        <option>3131443 LÊ VĂN LƯƠNG</option>
                        <option>3233442 NGUYỄN NHẬT HIẾU</option>
                        <option>3233132 NGUYỄN THỊ MAI</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>I. Hành chính</label>
                    
                    <label for="ma-bn">Mã bệnh nhân:</label>
                    <input id="ma-bn" type="text"  />
                    
                    <label for="ho-ten">Họ tên:</label>
                    <input id="ho-ten" type="text"  />
                    
                    <label for="ngay-sinh">Ngày sinh:</label>
                    <input id="ngay-sinh" type="text"  />
                    
                    <label for="gioi-tinh">Giới tính:</label>
                    <input id="gioi-tinh" type="text"  />
                    
                    <label for="dia-chi">Địa chỉ:</label>
                    <input id="dia-chi" type="text"  />
                    
                    <label for="ngay-vao-vien">Ngày vào viện:</label>
                    <input id="ngay-vao-vien" type="text" />
                    
                    <label for="so-the">Số thẻ:</label>
                    <input id="so-the" type="text"  />
                    
                    <label for="phong">Phòng:</label>
                    <input id="phong" type="text"  />
                    
                    <label for="giuong">Giường:</label>
                    <input id="giuong" type="text"  />
                    
                    <label for="chan-doan">Chẩn đoán:</label>
                    <input id="chan-doan" type="text"  />
                </div>

                <div class="form-group">
                    <label>II. Lý do vào viện:</label>
                    <textarea ></textarea>
                </div>
                <div class="form-group">
                    <label>III. Hỏi bệnh</label>
                    <textarea ></textarea>
                </div>
                <div class="form-group">
                    <label>1. Quá trình bệnh lý</label>
                    <textarea></textarea>
                </div>
                <div class="form-group">
                    <label>2. Tiền sử bệnh</label>
                    <textarea ></textarea>
                </div>
                <div class="form-group">
                    <label>IV. Khám bệnh</label>
                    <textarea ></textarea>
                </div>
                <div class="form-group">
                    <label>V. Kết quả chẩn đoán</label>
                    <textarea ></textarea>
                </div>
                <div class="form-group">
                    <label>VI. Đơn thuốc</label>
                    <textarea ></textarea>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
