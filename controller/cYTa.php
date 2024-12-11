<?php
include_once("../../model/mYTa.php");

class cYTa
{
    public function DKCa($manv, $date, $ca) {
        $p = new mYTa();
        
        $existingShift = $p->kiemTraCaLam($manv, $date, $ca);
        if ($existingShift) {
            return [
                'status' => false,
                'message' => 'Ca làm việc này đã được đăng ký trước đó.'
            ];
        }
        
        return $p->DKCa($manv, $date, $ca);
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
