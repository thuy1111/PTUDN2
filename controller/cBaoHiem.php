<?php
	include_once("../../model/mBaoHiem.php");
	class cBaoHiem
	{
		public function layDSBaoHiem()
		{
			$p = new mBaoHiem();
			$tbl = $p->layDSBaoHiem();
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