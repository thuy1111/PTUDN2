<?php
session_start();
include_once("../../controller/cYTa.php");

// Check if user is logged in and is a nurse
if (!isset($_SESSION['user']) || !isset($_SESSION['user'][2]) || $_SESSION['user'][2] != 2) {
    echo "Vui lòng đăng nhập với tài khoản y tá!";
    exit;
}

$maNhanVien = $_SESSION['user'][0]; // Assuming maNhanVien is stored at index 0

$startDate = $_GET['start'] ?? date('Y-m-d', strtotime('monday this week'));
$endDate = $_GET['end'] ?? date('Y-m-d', strtotime('sunday this week'));

$controller = new cYTa();
$dsLichLamViec = $controller->hienThiDSLichLamViec($startDate, $endDate, $maNhanVien);

$daysOfWeek = ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "CN"];
$shifts = ["Ca 1", "Ca 2", "Ca 3"];

$html = '';

foreach ($shifts as $shift) {
    $html .= '<tr>';
    
    foreach ($daysOfWeek as $index => $day) {
        $currentDate = date('Y-m-d', strtotime($startDate . ' +' . $index . ' days'));

        // Lọc lịch làm việc theo ca và ngày hiện tại
        $lichTrongNgay = array_filter($dsLichLamViec, function ($lich) use ($shift, $currentDate) {
            return $lich['caLamViec'] === $shift && $lich['ngayLamViec'] === $currentDate;
        });

        $html .= '<td>';
        if (!empty($lichTrongNgay)) {
            foreach ($lichTrongNgay as $lich) {
                $html .= "<button class='btn btn-primary shift-button' 
                              data-shift-id='{$lich['maLichLamViec']}' 
                              data-employee-name='{$lich['hoTen']}'>
                              {$lich['hoTen']} - {$shift}
                          </button><br>";
            }
        } else {
            $html .= "<button class='btn btn-secondary' aria-label='Không có ca'>Không có ca</button>";
        }
        $html .= '</td>';
    }
    
    $html .= '</tr>';
}

// Xuất HTML ra trình duyệt
echo $html;
?>

