<?php
// Gọi Controller
include_once("../../controller/cPhieuKham.php");

// Khởi tạo Controller
$controller = new cPhieuKhamBenh();

// Lấy mã phiếu khám từ URL
$maPhieuKhamBenh = isset($_GET['id']) ? $_GET['id'] : null;

// Lấy chi tiết phiếu khám từ Controller
$chiTietPKB = $controller->hienThiChiTietPKB($maPhieuKhamBenh);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Phiếu Khám</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center text-primary mb-4">Chi Tiết Phiếu Khám</h2>

    <?php if ($chiTietPKB) { ?>
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Thông Tin Phiếu Khám Bệnh</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Mã Phiếu Khám</th>
                        <td><?php echo $chiTietPKB['maPhieuKhamBenh']; ?></td>
                    </tr>
                    <tr>
                        <th>Mã Phòng Khám</th>
                        <td><?php echo $chiTietPKB['maPhongKham']; ?></td>
                    </tr>
                    <tr>
                        <th>Ngày Khám</th>
                        <td><?php echo $chiTietPKB['ngayKham']; ?></td>
                    </tr>
                    <tr>
                        <th>Lý Do Khám</th>
                        <td><?php echo $chiTietPKB['lyDoKham']; ?></td>
                    </tr>
                    <tr>
                        <th>Tiền Sử</th>
                        <td><?php echo $chiTietPKB['tienSu']; ?></td>
                    </tr>
                    <tr>
                        <th>Bệnh Sử</th>
                        <td><?php echo $chiTietPKB['benhSu']; ?></td>
                    </tr>
                    <tr>
                        <th>Chẩn Đoán</th>
                        <td><?php echo $chiTietPKB['chanDoan']; ?></td>
                    </tr>
                    <tr>
                        <th>Kết Luận</th>
                        <td><?php echo $chiTietPKB['ketLuan']; ?></td>
                    </tr>
                    <tr>
                        <th>Triệu Chứng</th>
                        <td><?php echo $chiTietPKB['trieuChung']; ?></td>
                    </tr>
                    <tr>
                        <th>Nhịp Tim (Mạch)</th>
                        <td><?php echo $chiTietPKB['mach']; ?> lần/phút</td>
                    </tr>
                    <tr>
                        <th>Huyết Áp</th>
                        <td><?php echo $chiTietPKB['huyetAp']; ?> mmHg</td>
                    </tr>
                    <tr>
                        <th>Nhiệt Độ</th>
                        <td><?php echo $chiTietPKB['nhietDo']; ?> °C</td>
                    </tr>
                    <tr>
                        <th>Chiều Cao</th>
                        <td><?php echo $chiTietPKB['chieuCao']; ?> cm</td>
                    </tr>
                    <tr>
                        <th>Cân Nặng</th>
                        <td><?php echo $chiTietPKB['canNang']; ?> kg</td>
                    </tr>
                    <tr>
                        <th>Mã Đơn Thuốc</th>
                        <td><?php echo $chiTietPKB['maDonThuoc']; ?></td>
                    </tr>
                    <tr>
                        <th>Bệnh Nhân</th>
                        <td><?php echo $chiTietPKB['tenBenhNhan']; ?></td>
                    </tr>
                    <tr>
                        <th>Nhân Viên</th>
                        <td><?php echo $chiTietPKB['tenNhanVien']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-danger text-center">
            Không tìm thấy thông tin phiếu khám bệnh.
        </div>
    <?php } ?>

    <div class="text-center mt-4">
        <a href="xemphieukham.php" class="btn btn-secondary">Quay lại danh sách</a>
    </div>
</div>
</body>
</html>
