<?php
    //Quản lý sản phẩm
    include_once("connect.php");
    class mLoaiThuoc
	{
		public function layDSLoaiThuoc()
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT * from loaithuoc ";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
		
		
	}
?>