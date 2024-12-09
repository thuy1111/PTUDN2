<?php
include_once("../../model/mCTDT.php");
class controlCTDT{
    // Get all records of chitietdonthuoc
    public function getAllCTDT() {
        $p = new modelCTDT();
        $tbl = $p->selectAllCTDT();
        
        if ($tbl && mysqli_num_rows($tbl) > 0) {
            return $tbl;
        } else {
            return false;
        }
    }

    // Get a specific record by maChiTietDT
    public function get01CTDT($machitietdt) {
        $p = new modelCTDT();
        $tbl = $p->select01CTDT($machitietdt);
        
        if ($tbl && mysqli_num_rows($tbl) > 0) {
            return $tbl;
        } else {
            return false;
        }
    }

    // Update the tinhTrang for a specific record
    public function updateCTDT($machitietdt, $tinhTrang) {
        $p = new modelCTDT();
        $kq = $p->updateCTDT($machitietdt, $tinhTrang);
        
        if ($kq) {
            return true;
        } else {
            return false;
        }
    }

    // Insert a new record into chitietdonthuoc
    public function insertCTDT($maBenhNhan, $maBaoHiem, $maBacSi, $chuanDoan, $STT, $donVi, $donGia, $soLuong, $thanhTien, $maDonThuoc, $tinhTrang, $maThuoc) {
        $p = new modelCTDT();
        $kq = $p->insertCTDT($maBenhNhan, $maBaoHiem, $maBacSi, $chuanDoan, $STT, $donVi, $donGia, $soLuong, $thanhTien, $maDonThuoc, $tinhTrang, $maThuoc);
        
        if ($kq) {
            return true;
        } else {
            return false;
        }
    }

    // Delete a specific record by maChiTietDT
    public function deleteCTDT($machitietdt) {
        $p = new modelCTDT();
        $kq = $p->deleteCTDT($machitietdt);
        
        if ($kq) {
            return true;
        } else {
            return false;
        }
    }
}
?>
