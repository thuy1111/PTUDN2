<?php
    //Quản lý sản phẩm
    include_once("connect.php");
    class mKhoa
	{
		public function layDSKhoa()
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT * from khoa";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
	}
?>