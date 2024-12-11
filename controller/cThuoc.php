<?php
	include_once("../../model/mThuoc.php");
	class cThuoc
	{
		public function layDSThuoc()
		{
			$p = new mThuoc();
			$tbl = $p->layDSThuoc();
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
		public function xemthongtinthuoc($maThuoc){
            $p = new   mThuoc();
           
			$tbl = $p->xem1thuoc($maThuoc);
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
		public function timkiemthuoc($timkiem){
            $p = new   mThuoc();
           
			$tbl = $p->searchthuoc($timkiem);
			
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return false; // Không có dữ liệu trong bảng
				}
			
        }
        public function addthuoc($tenThuoc,$soLuong,$donViCungCap,$donGia,$donViTinh,$cachDung,$trangThai,$maLoaiThuoc)
        {
            $p = new   mThuoc();
           
			$tbl = $p->themthuoc($tenThuoc,$soLuong,$donViCungCap,$donGia,$donViTinh,$cachDung,$trangThai,$maLoaiThuoc);
			
				
				return $tbl;
				
			
        }
        public function updatettthuoc($maThuoc,$tenThuoc,$soLuong,$donViCungCap,$donGia,$donViTinh,$cachDung,$trangThai,$maLoaiThuoc)
        {
            $p = new   mThuoc();
           
			$tbl = $p->capnhatthongtinnv($maThuoc,$tenThuoc,$soLuong,$donViCungCap,$donGia,$donViTinh,$cachDung,$trangThai,$maLoaiThuoc);
			
				
				return $tbl;
				
			
        }
	}
?>