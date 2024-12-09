<?php
include_once("../../model/mYTa.php");

class cYTa
{
    public function DKCa($manv, $date, $ca) {
        $model = new mYTa();
        $result = $model->DKCa($manv, $date, $ca);
        return $result;
    }

    public function hienThiDSLichLamViec($startDate, $endDate, $maNhanVien)
    {
        $model = new mYTa();
        $dsLichLamViec = $model->layDSLichLamViec($startDate, $endDate, $maNhanVien);

        if ($dsLichLamViec) {
            return $dsLichLamViec;
        } else {
            return [];
        }
    }

    public function chiTietLichLamViec($maLichLamViec, $maNhanVien)
    {
        $model = new mYTa();
        $chiTiet = $model->layChiTietLichLamViec($maLichLamViec, $maNhanVien);

        return $chiTiet ? $chiTiet : null;
    }
}
?>
