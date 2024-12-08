<?php
include_once("../../model/mYTa.php");

class cYTa
{
    public function DKCa($manv,$date,$ca){
        $p = new mBacsi();
        $tbl = $p->DKCa($manv,$date,$ca);
        if ($tbl) {
            if ($tbl->num_rows > 0) {
                return $tbl;
            } else {
                return -1; // Không có dữ liệu trong bảng
            }
        } else {
            return false;
        }
    }
    public function hienThiDSLichLamViec($startDate, $endDate)
    {
        $model = new mYTa();
        $dsLichLamViec = $model->layDSLichLamViec($startDate, $endDate);

        if ($dsLichLamViec) {
            return $dsLichLamViec;
        } else {
            return [];
        }
    }

    public function chiTietLichLamViec($maLichLamViec)
    {
        $model = new mYTa();
        $chiTiet = $model->layChiTietLichLamViec($maLichLamViec);

        return $chiTiet ? $chiTiet : null;
    }
}
?>

