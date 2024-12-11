<?php
	include_once("../../model/mKhoa.php");
	class cKhoa
	{
		public function layDSKhoa()
		{
			$p = new mKhoa();
			$tbl = $p->layDSKhoa();
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
<<<<<<< HEAD

		public function layDSBSTheoKhoa($maKhoa){
			$p = new mKhoa();
			$dsBS = $p->layDSBSTheoKhoa($maKhoa);
			if ($dsBS) {
				return $dsBS;
			} else {
				return false;
			}
		}
	}
?>
=======
		public function xemthongtinkhoa($maKhoa){
            $p = new   mKhoa();
           
			$tbl = $p->xem1Khoa($maKhoa);
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
		public function timkiemkhoa($timkiem){
            $p = new   mKhoa();
           
			$tbl = $p->searchKhoa($timkiem);
			
				if ($tbl->num_rows > 0) {
					return $tbl;
				} else {
					return false; // Không có dữ liệu trong bảng
				}
			
        }
        public function addKhoa($tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai)
        {
            $p = new   mKhoa();
           
			$tbl = $p->themKhoa($tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai);
			
				
				return $tbl;
				
			
        }
        public function updatettkhoa($maKhoa,$tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai)
        {
            $p = new   mKhoa();
           
			$tbl = $p->capnhatthongtinkhoa($maKhoa,$tenKhoa,$truongKhoa,$soDienThoai,$email,$trangthai);
			
				
				return $tbl;
				
			
        }
		

    }
    ?>
>>>>>>> 4f13eeee26d9246074c8bae8ea3e6b62b5ad6b7a
