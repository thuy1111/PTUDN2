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

		public function layChiTietLichKhamTheoBenhNhan($maLichKham, $maBenhNhan) {
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn->set_charset("utf8");
		
			if ($conn && $maLichKham && $maBenhNhan) {
				
				$str = "SELECT lk.*, bn.hoTen AS tenBenhNhan, nv.hoTen AS tenNhanVien, k.tenKhoa
						FROM lichkham lk
						JOIN benhnhan bn ON lk.maBenhNhan = bn.maBenhNhan
						JOIN nhanvien nv ON lk.maNhanVien = nv.maNhanVien
						JOIN khoa k ON lk.maKhoa = k.maKhoa
						WHERE lk.maLichKham = ? AND lk.maBenhNhan = ?";
		
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
		

		
		
public function layDSPKB($keyword = "", $maBenhNhan = "")
{
    
    $p = new clsKetNoi();
    $conn = $p->moketnoi();
    $conn->set_charset("utf8");
    
    if ($conn) {
        
        $str = "SELECT pkb.*, bn.hoTen as tenBenhNhan, nv.hoTen as tenNhanVien 
                FROM phieukhambenh pkb
                JOIN benhnhan bn ON pkb.maBenhNhan = bn.maBenhNhan
                JOIN nhanvien nv ON pkb.maNhanVien = nv.maNhanVien
                WHERE pkb.maBenhNhan = ?";
        
        $params = array($maBenhNhan); 
        $types = "s";  

       
        if ($keyword != "") {
            $str .= " AND (pkb.maPhieuKhamBenh LIKE ? OR bn.hoTen LIKE ? OR nv.hoTen LIKE ? OR pkb.ngayKham LIKE ?)";
            $search = "%$keyword%";
            $params = array_merge($params, array($search, $search, $search, $search));
            $types .= "ssss";
        }

        
        $stmt = $conn->prepare($str);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();

        
        $p->dongketnoi($conn);
        return $result;
    } else {
        return false;
    }
}

    }
?>