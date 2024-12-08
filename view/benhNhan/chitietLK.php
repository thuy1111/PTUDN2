<?php
session_start();
// Gọi Controller
include_once("../../controller/cBenhNhan.php");

// Kiểm tra đăng nhập
if (!isset($_SESSION['customer'][0])) {
    echo "<script>alert('Vui lòng đăng nhập!'); window.location.href = '../dangNhap/';</script>";
    exit();
}

// Khởi tạo Controller
$controller = new cBenhNhan();

// Lấy mã bệnh nhân từ session và mã lịch khám từ URL
$maBenhNhan = $_SESSION['customer'][0];
$maLichKham = isset($_GET['id']) ? $_GET['id'] : null;

// Kiểm tra tham số
if (!$maLichKham) {
    echo "<script>alert('Không tìm thấy thông tin lịch khám!'); window.location.href = 'xemlichkham.php';</script>";
    exit();
}

// Lấy chi tiết lịch khám từ Controller
$chiTietLK = $controller->hienThiChiTietLKTheoBenhNhan($maLichKham, $maBenhNhan);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Lịch Khám</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Chi Tiết Lịch Khám</h2>

    <?php if ($chiTietLK) { ?>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Thông Tin Lịch Khám</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Mã Lịch Khám</th>
                        <td><?php echo htmlspecialchars($chiTietLK['maLichKham']); ?></td>
                    </tr>
                    <tr>
                        <th>Ngày Khám</th>
                        <td><?php echo htmlspecialchars($chiTietLK['ngayKham']); ?></td>
                    </tr>
                    <tr>
                        <th>Giờ Khám</th>
                        <td><?php echo htmlspecialchars($chiTietLK['gioKham']); ?></td>
                    </tr>
                    <tr>
                        <th>Vấn Đề Khám</th>
                        <td><?php echo htmlspecialchars($chiTietLK['vanDeKham']); ?></td>
                    </tr>
                    <tr>
                        <th>Giá Dịch Vụ</th>
                        <td><?php echo number_format($chiTietLK['giaDichVuKham'], 0, ',', '.'); ?> VND</td>
                    </tr>
                    <tr>
                        <th>Mã Nhân Viên</th>
                        <td><?php echo htmlspecialchars($chiTietLK['maNhanVien']); ?></td>
                    </tr>
                    <tr>
                        <th>Mã Bệnh Nhân</th>
                        <td><?php echo htmlspecialchars($chiTietLK['maBenhNhan']); ?></td>
                    </tr>
                    <tr>
                        <th>Mã Bảo Hiểm</th>
                        <td><?php echo htmlspecialchars($chiTietLK['maBaoHiem']); ?></td>
                    </tr>
                    <tr>
                        <th>Mã Khoa</th>
                        <td><?php echo htmlspecialchars($chiTietLK['maKhoa']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger text-center">
            Không tìm thấy thông tin lịch khám.
        </div>
    <?php } ?>

    <div class="text-center mt-4">
        <a href="xemlichkham.php" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
</div>
</body>
</html>
