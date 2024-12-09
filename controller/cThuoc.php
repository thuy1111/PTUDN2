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
	}
?>