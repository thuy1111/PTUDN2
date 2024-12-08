<?php
session_start();
include_once("../../controller/cYTa.php");

// Check if user is logged in and is a nurse
if (!isset($_SESSION['user']) || !isset($_SESSION['user'][2]) || $_SESSION['user'][2] != 2) {
    echo "<div class='error'>Vui lòng đăng nhập với tài khoản y tá!</div>";
    exit;
}

$maNhanVien = $_SESSION['user'][0]; // Assuming maNhanVien is stored at index 0
$shiftId = $_GET['id'] ?? null;

if ($shiftId) {
    $controller = new cYTa();
    $shiftDetails = $controller->chiTietLichLamViec($shiftId, $maNhanVien);

    if ($shiftDetails) {
        echo "
        <!DOCTYPE html>
        <html lang='vi'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            
            <style>
                body {
                    font-family: 'Arial', sans-serif;
                    background-color: #f4f4f9;
                    margin: 0;
                    padding: 0;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .container {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    width: 100%;
                    max-width: 600px;
                }
                .container h1 {
                    font-size: 24px;
                    color: #333;
                    text-align: center;
                    margin-bottom: 20px;
                }
                .detail {
                    margin-bottom: 10px;
                }
                .detail strong {
                    color: #333;
                }
                .detail p {
                    font-size: 16px;
                    color: #555;
                    margin: 5px 0;
                }
                .error {
                    color: red;
                    font-size: 18px;
                    text-align: center;
                    margin-top: 20px;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Chi tiết ca làm việc</h1>";
                
        echo "
                <div class='detail'>
                    <strong>Ngày làm việc:</strong> {$shiftDetails['ngayLamViec']}
                </div>
                <div class='detail'>
                    <strong>Ca làm việc:</strong> {$shiftDetails['caLamViec']}
                </div>
                <div class='detail'>
                    <strong>Mã nhân viên:</strong> {$shiftDetails['maNhanVien']}
                </div>
                <div class='detail'>
                    <strong>Tên nhân viên:</strong> {$shiftDetails['hoTen']}
                </div>";
        
        echo "
            </div>
        </body>
        </html>";
    } else {
        echo "<div class='error'>Không tìm thấy thông tin ca làm việc hoặc bạn không có quyền xem thông tin này.</div>";
    }
} else {
    echo "<div class='error'>Không có thông tin ca làm việc được chọn.</div>";
}
?>

