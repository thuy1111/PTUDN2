<?php
    include_once("connect.php");
    class mNhanVien{
        public function xemdanhsachnhanvien()
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "Select *,tenKhoa,tenChucVu from nhanvien v join khoa k on v.maKhoa= k.maKhoa join chucvu c on c.maChucVu=v.maChucVu ";
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
				$str = "Select *,tenKhoa,tenChucVu from nhanvien v join khoa k on v.maKhoa= k.maKhoa join chucvu c on c.maChucVu=v.maChucVu where maNhanVien LIKE '%$timkiem%' or hoTen like '%$timkiem%'";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}

        }
    }

?>