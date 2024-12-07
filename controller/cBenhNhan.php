<?php
    include_once("model/mBenhNhan.php");
    class cBenhNhan{
        public function layThongTinLichKham($maBenhNhan, $maLichKham){
            $p = new mBenhNhan();
			$tbl = $p->layThongTinLichKham($maBenhNhan, $maLichKham);
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

        public function themThongTinVaoHoaDon($maBenhNhan, $maLichKham){
            $p = new mBenhNhan();
			$tbl = $p->themThongTinVaoHoaDon($maBenhNhan, $maLichKham);
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
    }
?>