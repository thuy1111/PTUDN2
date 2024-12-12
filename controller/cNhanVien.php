<?php
    include_once("../../model/mNhanVien.php");
    class cNhanVien{
        public function laydanhsachnhanvien(){
            $p = new   mNhanVien();
			
			$tbl = $p->xemdanhsachnhanvien();
			if ($tbl) {
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return -1; // Không có dữ liệu trong bảng
				}
			} else {
				return false;
			}
        }
        public function xemthongtinnv($maNhanVien){
            $p = new   mNhanVien();
           
			$tbl = $p->xem1nhanvien($maNhanVien);
			if ($tbl) {
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return -1; // Không có dữ liệu trong bảng
				}
			} else {
				return false;
			}
        }
		public function timkiemnv($timkiem){
            $p = new   mNhanVien();
           
			$tbl = $p->searchNV($timkiem);
			
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return false; // Không có dữ liệu trong bảng
				}
			
        }
        public function addnhanvien($hoTen,$ngaySinh,$gioiTinh,$tenDangNhap,$matKhau,$soDienThoai,$email,$diachi,$maChucVu,$maKhoa,$trangthai)
        {
            $p = new   mNhanVien();
           
			$tbl = $p->themnhanvien($hoTen,$ngaySinh,$gioiTinh,$tenDangNhap,$matKhau,$soDienThoai,$email,$diachi,$maChucVu,$maKhoa,$trangthai);
			
				
				return $tbl;
        }
		public function nhanvienTonTai($hoTen) {
			// Sử dụng prepared statement để bảo vệ khỏi SQL injection
			$query = "SELECT * FROM nhanvien WHERE hoTen = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param("s", $hoTen);  // "s" là kiểu dữ liệu string
			$stmt->execute();
			$result = $stmt->get_result();
		
			// Trả về true nếu tìm thấy nhân viên, false nếu không có
			return $result->num_rows > 0;
		}
        public function updatettnv($maNhanVien,$hoTen,$ngaySinh,$soDienThoai,$email,$diachi,$trangthai,$maChucVu,$maKhoa)
        {
            $p = new   mNhanVien();
           
			$tbl = $p->capnhatthongtinnv($maNhanVien,$hoTen,$ngaySinh,$soDienThoai,$email,$diachi,$trangthai,$maChucVu,$maKhoa);
			
				
				return $tbl;
				
			
        }
		

    }
    ?>