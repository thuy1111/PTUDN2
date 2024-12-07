<?php

    include_once("connect.php");
    class mBenhNhan{
        public function layThongTinLichKham($maBenhNhan, $maLichKham){
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT * FROM lichkham lk JOIN benhnhan bn on lk.maBenhNhan = bn.maBenhNhan
						WHERE maBenhNhan = '$maBenhNhan' AND maLichKham = '$maLichKham'";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }

        public function themThongTinVaoHoaDon($maBenhNhan, $maLichKham){
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "INSERT INTO hoadon (ngayKham, tongTienKham)
                        SELECT l.ngayKham, l.tienKham
                        FROM lichkham l
                        JOIN benhnhan b ON b.maBenhNhan = l.maBenhNhan
                        WHERE b.maBenhNhan = $maBenhNhan AND l.maLichKham = $maLichKham";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
    }
?>