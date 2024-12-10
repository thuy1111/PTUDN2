<?php
include_once("../../model/mPhieuKham.php");

class cPhieuKhamBenh {
    private $model;

    public function __construct() {
        $this->model = new mPhieuKhamBenh();
    }

    public function hienThiChiTietPKB($maPhieuKhamBenh) {
        return $this->model->layChiTietPKB($maPhieuKhamBenh);
    }

    public function hienThiDanhSachPKB($keyword = "", $maBenhNhan = "", $maNhanVien = "")
{
    $keyword = trim($keyword);
    $maBenhNhan = trim($maBenhNhan);
    $maNhanVien = trim($maNhanVien); 
    return $this->model->layDSPKB($keyword, $maBenhNhan, $maNhanVien); 
}


    public function hienThiDanhSachPKBBS($maBenhNhan, $maNhanVien) {
        $p = new mPhieuKhamBenh();
        $dsPKB = $p->layDSPKB("", $maBenhNhan, $maNhanVien);
        return $dsPKB;
    }
}
?>