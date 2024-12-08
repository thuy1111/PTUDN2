<?php
// Gọi Controller
include_once("../../controller/cBacSi.php");

// Khởi tạo Controller
$controller = new cBacSi();

// Lấy mã lịch khám từ URL
$maLichKham = isset($_GET['id']) ? $_GET['id'] : null;

// Lấy chi tiết lịch khám từ Controller
$chiTietLK = $controller->hienThiChiTietLK($maLichKham);
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
                        <td><?php echo $chiTietLK['maLichKham']; ?></td>
                    </tr>
                    <tr>
                        <th>Ngày Khám</th>
                        <td><?php echo $chiTietLK['ngayKham']; ?></td>
                    </tr>
                    <tr>
                        <th>Giờ Khám</th>
                        <td><?php echo $chiTietLK['gioKham']; ?></td>
                    </tr>
                    <tr>
                        <th>Vấn Đề Khám</th>
                        <td><?php echo $chiTietLK['vanDeKham']; ?></td>
                    </tr>
                    <tr>
                        <th>Giá Dịch Vụ</th>
                        <td><?php echo number_format($chiTietLK['giaDichVuKham'], 0, ',', '.'); ?> VND</td>
                    </tr>
                    <tr>
                        <th>Mã Nhân Viên</th>
                        <td><?php echo $chiTietLK['maNhanVien']; ?></td>
                    </tr>
                    <tr>
                        <th>Mã Bệnh Nhân</th>
                        <td><?php echo $chiTietLK['maBenhNhan']; ?></td>
                    </tr>
                    <tr>
                        <th>Mã Bảo Hiểm</th>
                        <td><?php echo $chiTietLK['maBaoHiem']; ?></td>
                    </tr>
                    <tr>
                        <th>Mã Khoa</th>
                        <td><?php echo $chiTietLK['maKhoa']; ?></td>
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
