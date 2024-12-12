<?php
// Đảm bảo chỉ nạp lớp một lần
include_once("../../model/mCTDT.php");

class controlCTDT {
    // Lấy tất cả chi tiết đơn thuốc
    public function getAllCTDT() {
        $p = new modelCTDT();
        $tbl = $p->selectAllCTDT();

        if ($tbl && mysqli_num_rows($tbl) > 0) {
            return $tbl;
        } else {
            return false;
        }
    }

    // Lấy một chi tiết đơn thuốc
    public function get01CTDT($madt) {
        $p = new modelCTDT();
        $tbl = $p->select01CTDT($madt); // Gọi đúng phương thức từ modelCTDT

        if ($tbl && mysqli_num_rows($tbl) > 0) {
            return $tbl;
        } else {
            return false;
        }
    }

    // Cập nhật chi tiết đơn thuốc
    public function updateCTDT($maChiTietDT, $tinhTrang) {
        $p = new modelCTDT();
        $result = $p->capnhatCTDT($maChiTietDT, $tinhTrang);
        return $result ? true : false;
    }
    
}
?>
