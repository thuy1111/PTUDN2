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
				$str = "SELECT *,k.tenPhongKham from khoa p join phongkham k on p.maKhoa= k.maKhoa";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
	}
?>