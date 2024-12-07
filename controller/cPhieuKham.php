<?php
// Controller Quản lý Phiếu Khám Bệnh
include_once("../../model/mPhieuKham.php");

class cPhieuKhamBenh
{
    private $model;

    public function __construct()
    {
        $this->model = new mPhieuKhamBenh();
    }

    // Lấy danh sách phiếu khám bệnh (có tìm kiếm)
    public function hienThiDanhSachPKB($keyword = "", $maBenhNhan = "")
    {
        // Kiểm tra và truyền đúng tham số vào model
        $keyword = trim($keyword);
        $maBenhNhan = trim($maBenhNhan);
        return $this->model->layDSPKB($keyword, $maBenhNhan);
    }

    // Lấy chi tiết phiếu khám bệnh theo mã phiếu
    public function hienThiChiTietPKB($maPhieuKhamBenh)
    {
        return $this->model->layChiTietPKB($maPhieuKhamBenh);
    }
}
?>