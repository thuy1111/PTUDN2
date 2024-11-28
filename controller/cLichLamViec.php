<?php
include_once("../../model/mLichLamViec.php");

class LichLamViecController {
    private $lichLamViec;

    public function __construct() {
        $this->lichLamViec = new LichLamViec();
    }

    public function registerShift($data) {
        $this->lichLamViec->ngayLamViec = $data['ngayLamViec'];
        $this->lichLamViec->caLamViec = $data['caLamViec'];
        $this->lichLamViec->maNhanVien = $data['maNhanVien'];

        if($this->lichLamViec->create()) {
            return "Đăng ký ca làm việc thành công.";
        } else {
            return "Không thể đăng ký ca làm việc.";
        }
    }

    public function getWeeklySchedule($maNhanVien, $startDate, $endDate) {
        $result = $this->lichLamViec->read($maNhanVien, $startDate, $endDate);
        $schedules = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($schedules, $row);
        }
        return $schedules;
    }
}

