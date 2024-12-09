<?php
    //Quản lý sản phẩm
    include_once("connect.php");
    class mBaoHiem
	{
		public function layDSBaoHiem()
		{
			$p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT *,k.tenLoai from baohiem p join loaibaohiem k on p.maLoai= k.maLoai";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
		}
	}
?>