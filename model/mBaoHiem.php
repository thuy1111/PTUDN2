<?php
include_once("connect.php");

class modelBaoHiem {
    public function selectAllBaoHiem() {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        $truyvan = "SELECT *,k.tenLoai from baohiem p join loaibaohiem k on p.maLoai= k.maLoai";
        $ketqua = mysqli_query($con, $truyvan);
        $p->dongKetNoi($con);
        return $ketqua;
    }

    public function selectBaoHiemById($maBaoHiem) {
        $p = new clsketnoi();
        $con = $p->moKetNoi(); 
        $truyvan = "SELECT * FROM baohiem WHERE maBaoHiem = ?";
        $stmt = mysqli_prepare($con, $truyvan);
        mysqli_stmt_bind_param($stmt, "i", $maBaoHiem); 
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $p->dongKetNoi($con);
        return $result;
    }
    
        public function thembaohiem($tenBaoHiem,$maLoai,$quyenLoi,$soTheBaoHiem,$ngayBatDau,$ngayHetHan,$noiDangKyKham,$trangthai)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "INSERT INTO `baohiem` (`maBaoHiem`, `tenBaoHiem`, `maLoai`, `quyenLoi`, `soTheBaoHiem`, `ngayBatDau`, `ngayHetHan`, `noiDangKyKham`, `trangthai`) 
                VALUES (NULL, '$tenBaoHiem', '$maLoai', '$quyenLoi', '$soTheBaoHiem',  '$ngayBatDau', '$ngayHetHan', '$noiDangKyKham', '$trangthai');";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
        public function capnhatthongtinbh($maBaoHiem,$tenBaoHiem,$maLoai,$quyenLoi,$soTheBaoHiem,$ngayBatDau,$ngayHetHan,$noiDangKyKham,$trangthai)
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
            if ($conn) {
				$str = "UPDATE `baohiem` SET `tenBaoHiem` = '$tenBaoHiem', `maLoai` = '$maLoai', `quyenLoi` = '$quyenLoi', `soTheBaoHiem` = '$soTheBaoHiem',`ngayBatDau`='$ngayBatDau', `maChucVu` = $maChucVu, `maKhoa` = $maKhoa WHERE `nhanvien`.`maNhanVien` = $maNhanVien;";
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

