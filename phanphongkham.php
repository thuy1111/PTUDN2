<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital_db";

$conn = new mysqli($servername, $username, $password, $database, 3305);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý phân phòng
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maPhongKham = $_POST['maPhongKham'];

    // Cập nhật trạng thái phòng
    $sql_update = "UPDATE phongkham SET tinhTrangHoatDong = 'Đang hoạt động' WHERE maPhongKham = ?";
    $stmt = $conn->prepare($sql_update);
    $stmt->bind_param("s", $maPhongKham);

    if ($stmt->execute()) {
        $success_message = "Phân phòng thành công!";
    } else {
        $error_message = "Lỗi: " . $conn->error;
    }
}

// Lấy danh sách phòng trống
$sql = "SELECT * FROM phongkham WHERE tinhTrangHoatDong = 'Đang hoạt động'";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Phân Phòng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .message {
            text-align: center;
            margin: 20px;
            font-size: 18px;
            color: green;
        }

        .error {
            text-align: center;
            margin: 20px;
            font-size: 18px;
            color: red;
        }

        form {
            text-align: center;
            margin: 20px;
        }

        select {
            padding: 8px;
            font-size: 16px;
        }

        button {
            padding: 8px 16px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Danh Sách Phòng Trống</h1>

    <?php
    if (isset($success_message)) {
        echo "<div class='message'>$success_message</div>";
    }
    if (isset($error_message)) {
        echo "<div class='error'>$error_message</div>";
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Phòng</th>
                <th>Tên Phòng</th>
                <th>Chức năng</th>
                <th>Tình trạng hoạt động</th>
                <th>Mã khoa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $stt = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $stt++ . "</td>";
                    echo "<td>" . $row['maPhongKham'] . "</td>";
                    echo "<td>" . $row['tenPhongKham'] . "</td>";
                    echo "<td>" . $row['chucNang'] . "</td>";
                    echo "<td>" . $row['tinhTrangHoatDong'] . "</td>";
                    echo "<td>" . $row['maKhoa'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Không có phòng trống</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <form method="POST">
        <label for="maPhongKham">Chọn phòng để phân:</label>
        <select name="maPhongKham" id="maPhongKham" required>
            <option value="">-- Chọn Phòng --</option>
            <?php
            // Lấy lại danh sách phòng trống để hiển thị trong dropdown
            $result->data_seek(0); // Reset pointer của kết quả truy vấn
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['maPhongKham'] . "'>" . $row['tenPhongKham'] . " (" . $row['maPhongKham'] . ")</option>";
            }
            ?>
        </select>
        <button type="submit">Phân Phòng</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>