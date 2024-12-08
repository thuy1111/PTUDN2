<?php
    include_once("../../model/mBacSi.php");
    class cBacSi{
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
        $model = new mBacsi();
        $dsLichLamViec = $model->layDSLichLamViec($startDate, $endDate);

        if ($dsLichLamViec) {
            return $dsLichLamViec;
        } else {
            return [];
        }
    }

    public function chiTietLichLamViec($maLichLamViec)
    {
        $model = new mBacsi();
        $chiTiet = $model->layChiTietLichLamViec($maLichLamViec);

        return $chiTiet ? $chiTiet : null;
    }
	public function hienThiLichKham()
    {
        $lichKhamModel = new mBacsi();
        $dsLichKham = $lichKhamModel->layDSLichKham();
        if ($dsLichKham) {
            return $dsLichKham;
        } else {
            return false;
        }
    }

    
    public function hienThiChiTietLK($maLichKham)
    {
        $lichKhamModel = new mBacsi();
        $chiTietLK = $lichKhamModel->layChiTietLichKham($maLichKham);
        if ($chiTietLK) {
            return $chiTietLK;
        } else {
            return false;
        }
    }
 }