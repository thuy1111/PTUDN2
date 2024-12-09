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

		public function hienThiDSLichLamViec($startDate, $endDate, $maNhanVien)
    {
        $model = new mBacsi();
        $dsLichLamViec = $model->layDSLichLamViec($startDate, $endDate, $maNhanVien);

        if ($dsLichLamViec) {
            return $dsLichLamViec;
        } else {
            return [];
        }
    }

    public function chiTietLichLamViec($maLichLamViec, $maNhanVien)
    {
        $model = new mBacSi();
        $chiTiet = $model->layChiTietLichLamViec($maLichLamViec, $maNhanVien);

        return $chiTiet ? $chiTiet : null;
    }
    
	public function hienThiLichKham($maNhanVien)
    {
        $lichKhamModel = new mBacsi();
        $dsLichKham = $lichKhamModel->layDSLichKham($maNhanVien);
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