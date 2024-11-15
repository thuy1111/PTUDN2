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
	}
?>