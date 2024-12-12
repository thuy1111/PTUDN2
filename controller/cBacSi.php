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
    public function layLichLamViecTheoBS($bacSi) {
        $p = new mBacSi();
        $tbl = $p->layLichLamViecTheoBS($bacSi);

        if ($tbl) {
            return $tbl;
        } else {
            return false;
        }
    }

    public function layCaLamViecTheoNgay($bacSi, $ngayKham) {
        $p = new mBacSi();
        $tbl = $p->layCaLamViecTheoNgay($bacSi, $ngayKham);

        if ($tbl) {
            return $tbl;
        } else {
            return false;
        }
    }



}
