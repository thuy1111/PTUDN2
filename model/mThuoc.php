<?php
    //Quản lý sản phẩm
    include_once("connect.php");
    class mThuoc
	{
		public function layDSThuoc()
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT *,l.tenLoaiThuoc from thuoc t join loaithuoc l on l.maLoaiThuoc= t.maLoaiThuoc ORDER BY t.maThuoc ASC";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
		public function xem1thuoc($maThuoc)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "Select * from thuoc where maThuoc ='$maThuoc'";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}

        }
		public function themthuoc($tenThuoc,$soLuong,$donViCungCap,$donGia,$donViTinh,$cachDung,$trangThai,$maLoaiThuoc)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "INSERT INTO `thuoc` (`maThuoc`,`tenThuoc`, `soLuong`, `donViCungCap`, `donGia`, `donViTinh`, `cachDung`, `trangThai`,`maLoaiThuoc`) 
                VALUES (NULL, '$tenThuoc', '$soLuong', '$donViCungCap', '$donGia', '$donViTinh', '$cachDung', '$trangThai', '$maLoaiThuoc');";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function capnhatthongtinthuoc($maThuoc,$tenThuoc,$soLuong,$donViCungCap,$donGia,$donViTinh,$cachDung,$trangThai,$maLoaiThuoc)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "UPDATE `thuoc` SET `tenThuoc` = '$tenThuoc', `soLuong` = '$soLuong', `donViCungCap` = '$donViCungCap', `donGia` = '$donGia',`donViTinh`='$donViTinh', `cachDung` = $cachDung,`maLoaiThuoc` = $maLoaiThuoc, `trangThai` = $trangThai WHERE `thuoc`.`maThuoc` = $maThuoc;";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
		public function searchthuoc($timkiem)
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn->set_charset("utf8");
		
			if ($conn) {
				// Default query if no search term is provided
				if (empty($timkiem)) {
					$str = "SELECT *, l.tenLoaiThuoc 
							FROM thuoc t 
							JOIN loaithuoc l 
							ON l.maLoaiThuoc = t.maLoaiThuoc";
				} else {
					// Escaping the input to prevent SQL Injection
					$timkiem = mysqli_real_escape_string($conn, $timkiem);
		
					// Build the search query to check multiple fields
					$str = "SELECT *, l.tenLoaiThuoc 
							FROM thuoc t 
							JOIN loaithuoc l 
							ON l.maLoaiThuoc = t.maLoaiThuoc
							WHERE t.tenThuoc LIKE '%$timkiem%'
							OR l.tenLoaiThuoc LIKE '%$timkiem%'
							OR t.cachDung LIKE '%$timkiem%'";
				}
		
				// Execute the query
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
		
	}
?>