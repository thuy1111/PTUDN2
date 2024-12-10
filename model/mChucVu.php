<?php
    //Quản lý sản phẩm
    include_once("connect.php");
    class mChucVu
	{
		public function layDSChucVu()
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT * from chucvu ";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
		
		
	}
?>