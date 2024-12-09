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
        public function addnhanvien($hoTen,$ngaySinh,$gioiTinh,$tenDangNhap,$matKhau,$soDienThoai,$email,$diachi,$maChucVu,$maKhoa)
        {
            $p = new   mNhanVien();
           
			$tbl = $p->themnhanvien($hoTen,$ngaySinh,$gioiTinh,$tenDangNhap,$matKhau,$soDienThoai,$email,$diachi,$maChucVu,$maKhoa);
			
				
				return $tbl;
				
			
        }
        public function updatettnv($maNhanVien,$hoTen,$ngaySinh,$soDienThoai,$email,$diachi,$trangthai,$maChucVu,$maKhoa)
        {
            $p = new   mNhanVien();
           
			$tbl = $p->capnhatthongtinnv($maNhanVien,$hoTen,$ngaySinh,$soDienThoai,$email,$diachi,$trangthai,$maChucVu,$maKhoa);
			
				
				return $tbl;
				
			
        }

    }
    ?>