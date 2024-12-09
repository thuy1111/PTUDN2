<?php
    //Quản lý sản phẩm
    include_once("connect.php");
    class mThuoc
	{
		public function layDSThuoc()
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT * from thuoc";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
	}
?>