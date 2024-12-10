<?php
    //Quản lý sản phẩm
    include_once("connect.php");
    class mKhoa
	{
		public function layDSKhoa()
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT * from khoa ORDER BY maKhoa ASC";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
		public function themKhoa($tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "INSERT INTO `khoa` (`maKhoa`,`tenKhoa`, `truongKhoa`, `soDienThoai`, `email`, `trangThaiKhoa`) 
                VALUES (NULL, '$tenKhoa', '$truongKhoa', '$soDienThoai', '$email', '$trangthai');";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function capnhatthongtinkhoa($maKhoa,$tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "UPDATE `khoa` SET `tenKhoa` = '$tenKhoa', `truongKhoa` = '$truongKhoa', `soDienThoai` = '$soDienThoai', `email` = '$email',`trangThaiKhoa`='$trangthai' WHERE `khoa`.`maKhoa` = $maKhoa;";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function xem1Khoa($maKhoa)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "Select * from khoa where maKhoa ='$maKhoa'";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}

        }
		public function searchKhoa($timkiem)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				// Kiểm tra nếu $timkiem là chuỗi rỗng
				if (empty($timkiem)) {
					$str = "SELECT * FROM khoa ";
				} else {
					// Kiểm tra nếu timkiem là một số
					if (is_numeric($timkiem)) {
						$str = "SELECT * FROM khoa 
								WHERE maKhoa = $timkiem";
					} else {
						// Nếu không phải số, thì tìm theo tên nhân viên
						$str = "SELECT * FROM khoa  
								WHERE tenKhoa LIKE '%$timkiem%'";
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