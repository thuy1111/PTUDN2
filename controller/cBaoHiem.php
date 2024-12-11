<?php


include_once("../../model/mBaoHiem.php");

class controlBaoHiem {
	
    public function getAllBaoHiem() {
        $p = new modelBaoHiem();
        $tbl = $p->selectAllBaoHiem();
        if (mysqli_num_rows($tbl)) {
            return $tbl;
        } else {
            return false; 
        }
    }
    public function getBaoHiemById($maBaoHiem) {
        $p = new modelBaoHiem();
        $tbl = $p->selectBaoHiemById($maBaoHiem);
        if (mysqli_num_rows($tbl)) {
            return $tbl; 
        } else {
            return false; 
        }
    }
}
?>

