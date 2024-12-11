<?php
    include_once("connect.php");
    class mNhanVien{
        public function xemdanhsachnhanvien()
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "Select 
                        v.maNhanVien, v.hoTen, v.ngaySinh, v.gioiTinh, v.soDienThoai,v.email, v.diaChi, v.tinhTrangNhanVien, k.tenKhoa, c.tenChucVu, k.trangThaiKhoa
                        from nhanvien v join khoa k on v.maKhoa= k.maKhoa join chucvu c on c.maChucVu=v.maChucVu  ORDER BY v.maNhanVien ASC";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function themnhanvien($hoTen,$ngaySinh,$gioiTinh,$tenDangNhap,$matKhau,$soDienThoai,$email,$diachi,$maChucVu,$maKhoa)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "INSERT INTO `nhanvien` (`maNhanVien`, `hoTen`, `ngaySinh`, `gioiTinh`, `tenDangNhap`, `matKhau`, `soDienThoai`, `email`, `diaChi`,  `maChucVu`, `maKhoa`) 
                VALUES (NULL, '$hoTen', '$ngaySinh', '$gioiTinh', '$tenDangNhap', MD5('$matKhau'), '$soDienThoai', '$email', '$diachi', '$maChucVu', '$maKhoa');";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function capnhatthongtinnv($maNhanVien,$hoTen,$ngaySinh,$soDienThoai,$email,$diachi,$trangthai,$maChucVu,$maKhoa)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "UPDATE `nhanvien` SET `hoTen` = '$hoTen', `ngaySinh` = '$ngaySinh', `email` = '$email', `diaChi` = '$diachi',`tinhTrangNhanVien`='$trangthai', `maChucVu` = $maChucVu, `maKhoa` = $maKhoa WHERE `nhanvien`.`maNhanVien` = $maNhanVien;";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function xem1nhanvien($maNhanVien)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "Select * from nhanvien where maNhanVien ='$maNhanVien'";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}

        }
		public function searchNV($timkiem)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				// Kiểm tra nếu $timkiem là chuỗi rỗng
				if (empty($timkiem)) {
					$str = "SELECT * FROM nhanvien v 
							JOIN khoa k ON v.maKhoa = k.maKhoa 
							JOIN chucvu c ON c.maChucVu = v.maChucVu";
				} else {
					// Kiểm tra nếu timkiem là một số
					if (is_numeric($timkiem)) {
						$str = "SELECT * FROM nhanvien v 
								JOIN khoa k ON v.maKhoa = k.maKhoa 
								JOIN chucvu c ON c.maChucVu = v.maChucVu 
								WHERE maNhanVien = $timkiem";
					} else {
						// Nếu không phải số, thì tìm theo tên nhân viên
						$str = "SELECT * FROM nhanvien v 
								JOIN khoa k ON v.maKhoa = k.maKhoa 
								JOIN chucvu c ON c.maChucVu = v.maChucVu 
								WHERE hoTen LIKE '%$timkiem%'";
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