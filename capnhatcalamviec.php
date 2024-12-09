<?php
// Kết nối cơ sở dữ liệu
$host = 'localhost';
$dbname = 'hospital_db';
$username = 'root'; // Thay bằng tài khoản MySQL của bạn
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối CSDL: " . $e->getMessage());
}

// Xử lý API
if (isset($_GET['api'])) {
    header('Content-Type: application/json');

    $method = $_SERVER['REQUEST_METHOD'];

    switch ($method) {
        case 'GET':
            // Lấy danh sách ca làm việc
            $stmt = $pdo->query("SELECT * FROM lichlamviec ORDER BY ngayLamViec, caLamViec");
            $lichLamViec = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($shifts);
            break;

        case 'POST':
            // Thêm ca làm việc mới
            $data = json_decode(file_get_contents('php://input'), true);
            $stmt = $pdo->prepare("INSERT INTO lichLamViec (ngayLamViec, caLamViec, employee_id) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$data['ngayLamViec'], $data['caLamViec'], $data['employee_id']]);
            echo json_encode(['message' => 'Ca làm việc được thêm thành công']);
            break;

        case 'PUT':
            // Cập nhật ca làm việc
            parse_str(file_get_contents('php://input'), $_PUT);
            $id = $_GET['id'];
            $stmt = $pdo->prepare("UPDATE lichLamViec SET ngayLamViec = ?, caLamViec = ?, employee_id = ? WHERE id = ?");
            $stmt->execute([$_PUT['ngayLamViec'], $_PUT['caLamViec'], $_PUT['employee_id'], $id]);
            echo json_encode(['message' => 'cập nhật ca làm việc thành công']);
            break;

        case 'DELETE':
            // Xóa ca làm việc
            $id = $_GET['id'];
            $stmt = $pdo->prepare("DELETE FROM lichLamViec WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['message' => 'xóa lịch làm việc thành công']);
            break;

        default:
            echo json_encode(['message' => 'yêu cầu không hợp lệ']);
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý ca làm việc</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
    <script>
        // Lấy danh sách ca làm việc
        async function fetchLichLamViec() {
            const response = await fetch('?api=true');
            const shifts = await response.json();
            const table = document.getElementById('lichLamViecTable');
            table.innerHTML = ''; // Xóa nội dung cũ

            lichLamViec.forEach(lichLamViec => {
                const row = table.insertRow();
                row.insertCell(0).textContent = lichLamViec.id;
                row.insertCell(1).textContent = lichLamViec.ngayLamViec;
                row.insertCell(2).textContent = lichLamViec.caLamViec;
                row.insertCell(3).textContent = lichLamViec.employee_id;
            });
        }

        // Thêm ca làm việc mới
        async function addLichLamViec() {
            const data = {
                shift_date: document.getElementById('ngayLamViec').value,
                start_time: document.getElementById('caLamViec').value,
                employee_name: document.getElementById('employee_id').value
            };

            await fetch('?api=true', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            });

            fetchlichLamViec();
        }

        document.addEventListener('DOMContentLoaded', fetchLichLamViec);
    </script>
</head>
<body>
    <h1>Quản lý ca làm việc</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ngày</th>
                <th>Ca làm việc</th>
                <th>Nhân viên</th>
            </tr>
        </thead>
        <tbody id="lichLamViecTable"></tbody>
    </table>

    <h2>Thêm ca làm việc</h2>
    <form onsubmit="addLichLamViec(); return false;">
        <label>Ngày: <input type="date" id="ngayLamViec"></label><br>
        <label>Ca làm việc: <input type="time" id="caLamViec"></label><br>
        <label>Nhân viên: <input type="text" id="employee_id"></label><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
