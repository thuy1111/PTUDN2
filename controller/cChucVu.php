<?php
	include_once("../../model/mChucVu.php");
	class cChucVu
	{
		public function layDSChucVu()
		{
			$p = new mChucVu();
			$tbl = $p->layDSChucVu();
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