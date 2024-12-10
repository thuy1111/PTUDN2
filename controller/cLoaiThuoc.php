<?php
	include_once("../../model/mLoaiThuoc.php");
	class cLoaiThuoc
	{
		public function layDSLoaiThuoc()
		{
			$p = new mLoaiThuoc();
			$tbl = $p->layDSLoaiThuoc();
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
	
       
	}
?>