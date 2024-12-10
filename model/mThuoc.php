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
		public function searchthuoc($timkiem)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				// Kiểm tra nếu $timkiem là chuỗi rỗng
				if (empty($timkiem)) {
					$str = "SELECT *,l.tenLoaiThuoc from thuoc t join loaithuoc l on l.maLoaiThuoc= t.maLoaiThuoc";
				} else {
					// Kiểm tra nếu timkiem là một số
					if (is_numeric($timkiem)) {
						$str = "SELECT *,l.tenLoaiThuoc from thuoc t join loaithuoc l on l.maLoaiThuoc= t.maLoaiThuoc
								WHERE maThuoc = $timkiem";
					} else {
						// Nếu không phải số, thì tìm theo tên nhân viên
						$str = "SELECT *,l.tenLoaiThuoc from thuoc t join loaithuoc l on l.maLoaiThuoc= t.maLoaiThuoc
								WHERE tenThuoc LIKE '%$timkiem%'";
					}}
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}

        }
	}
?>