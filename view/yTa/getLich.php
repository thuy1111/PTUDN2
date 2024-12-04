<?php
include_once("../../controller/cLichLamViecYTa.php");

$startDate = $_GET['start'] ?? date('Y-m-d', strtotime('monday this week'));
$endDate = $_GET['end'] ?? date('Y-m-d', strtotime('sunday this week'));

$controller = new cLichLamViec();
$dsLichLamViec = $controller->hienThiDSLichLamViec($startDate, $endDate);

$daysOfWeek = ["Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "CN"];
$shifts = ["Ca 1", "Ca 2", "Ca 3"];

$html = '';
foreach ($shifts as $shift) {
    $html .= '<tr>';
    foreach ($daysOfWeek as $index => $day) {
        $html .= '<td>';
        $currentDate = date('Y-m-d', strtotime($startDate . ' +' . $index . ' days'));
        $found = false;
        foreach ($dsLichLamViec as $lich) {
            if ($lich['caLamViec'] === $shift && $lich['ngayLamViec'] === $currentDate) {
                $html .= "<button class='btn btn-primary shift-button' data-shift-id='{$lich['maLichLamViec']}' data-employee-name='{$lich['hoTen']}'>{$shift}</button>";
                $found = true;
                break;
            }
        }
        if (!$found) {
            $html .= "<button class='btn btn-secondary' aria-label='Không có ca'></button>";
        }
        $html .= '</td>';
    }
    $html .= '</tr>';
}

echo $html;
?>

