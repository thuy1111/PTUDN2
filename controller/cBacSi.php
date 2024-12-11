<?php
    include_once("../../model/mBacSi.php");
    class cBacSi{
        public function DKCa($manv, $date, $ca) {
            $p = new mBacsi();
            
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

    // Lấy danh sách lịch làm việc của bác sĩ
    public function layDSLichLamViecBacSi($maNhanVien) {
        $model = new mBacSi();
        $dsLichLamViec = $model->layDSLichLamViecBacSi($maNhanVien);

        if ($dsLichLamViec) {
            return $dsLichLamViec;
        } else {
            return false;
        }
    }

    // Lấy danh sách lịch khám của bác sĩ
    public function layDSLichKhamBacSi($maNhanVien) {
        $model = new mBacSi();
        $dsLichKham = $model->layDSLichKhamBacSi($maNhanVien);

        if ($dsLichKham) {
            return $dsLichKham;
        } else {
            return false;
        }
    }
}
