<?php
    include_once("../../model/mPhongKham.php");
    class cPhongKham{
        public function laydanhsachphongkham(){
            $p = new mPhongKham();
           
			$tbl = $p->xemdanhsachphongkham();
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
		public function xemthongtinphongkham($maPhongKham){
            $p = new   mPhongKham();
           
			$tbl = $p->xem1phongkham($maPhongKham);
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
		public function timkiempk($timkiem){
            $p = new   mPhongKham();
           
			$tbl = $p->searchpk($timkiem);
			
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return false; // Không có dữ liệu trong bảng
				}
			
        }
        public function addphongkham($tenPhongKham,$maKhoa,$chucNang,$trangthai)
        {
            $p = new   mPhongKham();
           
			$tbl = $p->themphongkham($tenPhongKham,$maKhoa,$chucNang,$trangthai);
			
				
				return $tbl;
				
			
        }
        public function updatettpk($maPhongKham,$tenPhongKham,$maKhoa,$chucNang,$trangthai)
        {
            $p = new   mPhongKham();
           
			$tbl = $p->capnhatthongtinphongkham($maPhongKham,$tenPhongKham,$maKhoa,$chucNang,$trangthai);
			
				
				return $tbl;
				
			
        }
		
    }
    ?>