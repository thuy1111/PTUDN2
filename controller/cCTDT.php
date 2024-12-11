<?php
// Đảm bảo chỉ nạp lớp một lần
include_once("../../model/mCTDT.php");

class controlCTDT {
    public function getAllCTDT() {
        $p = new modelCTDT();
        $tbl = $p->selectAllCTDT();
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false;
        }
    }

    public function get01CTDT($mactdt) {
        $p = new modelCTDT();
        $tbl = $p->selectAllCTDT($mactdt);
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false;
        }
    }

    public function updateCTDT($maChiTietDT,$tinhTrang)
    {
        $p = new modelCTDT();
        $tbl = $p->capnhatCTDT($maChiTietDT,$tinhTrang);
            return $tbl;
            
        
    }
}
?>
