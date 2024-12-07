<?php
include_once("../../model/mLichLamViecYTa.php");

class cLichLamViec
{
    public function hienThiDSLichLamViec($startDate, $endDate)
    {
        $model = new mLichLamViec();
        $dsLichLamViec = $model->layDSLichLamViec($startDate, $endDate);

        if ($dsLichLamViec) {
            return $dsLichLamViec;
        } else {
            return [];
        }
    }

    public function chiTietLichLamViec($maLichLamViec)
    {
        $model = new mLichLamViec();
        $chiTiet = $model->layChiTietLichLamViec($maLichLamViec);

        return $chiTiet ? $chiTiet : null;
    }
}
?>

