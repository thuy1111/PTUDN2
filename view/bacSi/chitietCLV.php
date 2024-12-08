<?php
include_once("../../controller/cBacSi.php");

$shiftId = $_GET['id'] ?? null;

if ($shiftId) {
    $controller = new cBacSi();
    $shiftDetails = $controller->chiTietLichLamViec($shiftId);

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
                <h1></h1>";
                
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
        
        // Add more details as needed
        echo "
            </div>
        </body>
        </html>";
    } else {
        echo "<div class='error'>Không tìm thấy thông tin ca làm việc.</div>";
    }
} else {
    echo "<div class='error'>Không có thông tin ca làm việc được chọn.</div>";
}
?>
