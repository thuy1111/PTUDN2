
<?php
// Xử lý khi người dùng gửi form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = $_POST['hoTen'];
    $gioiTinh = $_POST['gioiTinh'];
    $diaChi = $_POST['diaChi'];
    $soDienThoai = $_POST['soDienThoai'];
    $tenKhoa = $_POST['tenKhoa'];
    $ngayKham = $_POST['ngayKham'];
    $gioKham = $_POST['gioKham'];

    // Kết nối cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'hospital_db');
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Chèn dữ liệu vào bảng
    $sql = "INSERT INTO lichkham (ngayKham, gioKham)
            VALUES ('$ngayKham', '$gioKham')";
    $sql = "INSERT INTO benhnhan (hoTen, gioiTinh, diaChi, soDienThoai)
            VALUES ('$hoTen', '$gioiTinh', '$diaChi', '$soDienThoai')";
    $sql = "INSERT INTO khoa (tenKhoa)
            VALUES ('$tenKhoa')";

    if ($conn->query($sql) === TRUE) {
        $message = "Đăng ký thành công!";
    } else {
        $message = "Lỗi: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký khám bệnh</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif ;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .logo-container {
    position: absolute;
    top: 10px; /* Căn chỉnh từ trên xuống */
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0 20px; /* Thêm khoảng cách hai bên */
    z-index: 1; /* Đảm bảo logo nổi lên trên */
}

.logo-left, .logo-right {
    height: 50px; /* Kích thước logo */
    width: auto; /* Tự động căn chỉnh chiều rộng */
}
.container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%; /* Chiếm toàn bộ chiều ngang màn hình */
    height: 100%; /* Chiếm toàn bộ chiều cao màn hình */
    box-sizing: border-box; /* Tính cả padding và border vào kích thước */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 2rem; /* Tăng kích thước tiêu đề */
}

form {
    width: 100%;
    max-width: 600px; /* Giới hạn chiều ngang form */
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input, form select, form button {
    width: 100%; /* Chiếm 100% chiều rộng của container */
    padding: 10px; /* Tăng kích thước ô nhập */
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem; /* Tăng kích thước chữ */
}

form button {
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 1.2rem; /* Tăng kích thước nút */
    font-weight: bold;
}

form button:hover {
    background-color: #218838;
}
        .message {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="logo-container">
        <img src="logo-left.png" alt="" class="logo-left">
        <img src="patient.png" alt="" class="logo-right">
    </div>
    <div class="container">
        <h2>ĐĂNG KÝ LỊCH KHÁM BỆNH</h2>
        <?php if (isset($message)) { echo "<div class='message'>$message</div>"; } ?>
        <form method="POST" action="">
            <label for="hoTen">Họ và tên:</label>
            <input type="text" id="hoTen" name="hoTen" required>

            <label for="gioiTinh">Giới Tính:</label>
            <input type="text" id="gioiTinh" name="gioiTinh" required>

            <label for="diaChi">Địa chỉ:</label>
            <input type="text" id="diaChi" name="diaChi" required>

            <label for="soDienThoai">Số Điện Thoại:</label>
            <input type="number" id="soDienThoai" name="soDienThoai" required>

            <label for="tenKhoa">Chuyên khoa:</label>
            <select id="tenKhoa" name="tenKhoa" required>
                <option value="Xét nghiệm">Xét nghiệm</option>
                <option value="Khám bệnh">Khám bệnh</option>
                <option value="Dược">Dược</option>
                <option value="Chuẩn đoán hình ảnh">Chuẩn đoán hình ảnh</option>
                <option value="Nội soi">Nội soi</option>
            </select>

            <label for="ngayKham">Chọn ngày khám:</label>
            <input type="date" id="ngayKham" name="ngayKham" required>

            <label for="gioKham">Giờ khám:</label>
            <select id="gioKham" name="gioKham" required>
                <option value="08:00">08:00</option>
                <option value="10:00">10:00</option>
                <option value="14:00">14:00</option>
            </select>

            <button type="submit">Đăng ký</button>
        </form>
    </div>
</body>
</html>
