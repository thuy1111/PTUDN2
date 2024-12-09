<?php
    include_once("connect.php");
    class mPhongKham{
        public function xemdanhsachphongkham()
        {
            $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "SELECT *,k.tenKhoa from phongkham p join khoa k on p.maKhoa= k.maKhoa ";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
        }
    }

?>