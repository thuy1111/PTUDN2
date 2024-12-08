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

		public function layDSLichKhamTheoBenhNhan($maBenhNhan) 
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn->set_charset("utf8");

			if ($conn && $maBenhNhan) {
				$str = "SELECT * FROM lichkham WHERE maBenhNhan = ?";
				$stmt = $conn->prepare($str);
				$stmt->bind_param("i", $maBenhNhan);
				$stmt->execute();
				$result = $stmt->get_result();

				$dsLichKham = [];
				while ($row = $result->fetch_assoc()) {
					$dsLichKham[] = $row;
				}

				$stmt->close();
				$p->dongketnoi($conn);

				return $dsLichKham;
			} else {
				return false;
			}
		}

		public function layChiTietLichKhamTheoBenhNhan($maLichKham, $maBenhNhan) 
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn->set_charset("utf8");

			if ($conn && $maLichKham && $maBenhNhan) {
				$str = "SELECT * FROM lichkham WHERE maLichKham = ? AND maBenhNhan = ?";
				$stmt = $conn->prepare($str);
				$stmt->bind_param("ii", $maLichKham, $maBenhNhan);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {
					$chiTiet = $result->fetch_assoc();
					$stmt->close();
					$p->dongketnoi($conn);
					return $chiTiet;
				} else {
					$stmt->close();
					$p->dongketnoi($conn);
					return false;
				}
			} else {
				return false;
			}
		}
    }
?>