<?php
// Kết nối cơ sở dữ liệu
$host = 'localhost:8081';
$username = 'root';
$password = '';
$dbname = 'hospital_db';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ form
$hoTen = $_POST['hoTen'];
$soDienThoai = $_POST['soDienThoai'];
$maPhong = $_POST['phong'];

// Lấy số thứ tự tiếp theo cho phòng khám
$query = "SELECT MAX(ticket_number) AS max_ticket FROM tickets WHERE maPhong = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $maPhong);
$stmt->execute();
$stmt->bind_result($max_ticket);
$stmt->fetch();

// Nếu chưa có ticket nào, bắt đầu từ 1
$new_ticket_number = ($max_ticket) ? $max_ticket + 1 : 1;

// Thêm thông tin bệnh nhân vào bảng patients
$query = "INSERT INTO benhnhan (hoTen, soDienThoai, maPhong, ticket_number) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssii", $name, $phone, $maPhong, $new_ticket_number);
$stmt->execute();

// Thêm số thứ tự vào bảng tickets
$query = "INSERT INTO tickets (maPhong, ticket_number) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $maPhong, $new_ticket_number);
$stmt->execute();

echo "Chúc mừng! Bạn đã đăng ký thành công. Số thứ tự của bạn là: " . $new_ticket_number;

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phòng Khám Xét Nghiệm</title>
</head>
<body>
    <h2>Đăng Ký Bệnh Nhân</h2>
    <form action="process.php" method="POST">
        <label for="name">Họ Tên:</label>
        <input type="text" id="hoTen" name="hoTen" required><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="soDienThoai" name="soDienThoai" required><br>

        <label for="room">Chọn phòng khám:</label>
        <select name="phong" id="maPhong">
            <!-- Các phòng khám sẽ được liệt kê từ cơ sở dữ liệu -->
            <option value="1">Phòng Xét Nghiệm 1</option>
            <option value="2">Phòng Xét Nghiệm 2</option>
        </select><br>

        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>
