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
                return [];
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

    private $model;

    public function __construct() {
        $this->model = new mBacsi(); // Tạo một instance của mBacsi
    }

    /**
     * Lấy danh sách các bác sĩ
     * @return mixed Kết quả trả về từ mBacsi::layDSBacSi()
     */
    public function layDSBacSi() {
        return $this->model->layDSBacSi(); // Gọi phương thức từ model
    }
}
?>