<?php
    include_once("connect.php");
    class mPhongKham{
        public function xemdanhsachphongkham()
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT *,k.tenKhoa from phongkham p join khoa k on p.maKhoa= k.maKhoa ORDER BY p.maPhongKham ASC ";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
	
	public function themphongkham($tenPhongKham,$maKhoa,$chucNang,$trangthai)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "INSERT INTO `phongkham` (`maPhongKham`, `tenPhongKham`, `maKhoa`, `chucNang`, `tinhTrangHoatDong`) 
                VALUES (NULL, '$tenPhongKham', '$maKhoa', '$chucNang', '$trangthai');";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function capnhatthongtinphongkham($maPhongKham, $tenPhongKham,$maKhoa,$chucNang,$trangthai)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "UPDATE `phongkham` SET `tenPhongKham` = '$tenPhongKham', `maKhoa` = '$maKhoa', `chucNang` = '$chucNang',`tinhTrangHoatDong`='$trangthai' WHERE `phongkham`.`maPhongKham` = $maPhongKham;";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function xem1phongkham($maPhongKham)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "Select * from phongkham where maPhongKham ='$maPhongKham'";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}

        }
		public function searchpk($timkiem)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				// Kiểm tra nếu $timkiem là chuỗi rỗng
				if (empty($timkiem)) {
					$str = "SELECT *,k.tenKhoa from phongkham p join khoa k on p.maKhoa= k.maKhoa ";
				} else {
					// Kiểm tra nếu timkiem là một số
					if (is_numeric($timkiem)) {
						$str = "SELECT *,k.tenKhoa from phongkham p join khoa k on p.maKhoa= k.maKhoa 
								WHERE maPhongKham = $timkiem";
					} else {
						// Nếu không phải số, thì tìm theo tên phòng khám
						$str = "SELECT *,k.tenKhoa from phongkham p join khoa k on p.maKhoa= k.maKhoa 
								WHERE tenPhongKham LIKE '%$timkiem%'";
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