<?php
    include_once("../../model/mPhongKham.php");
    class cPhongKham{
        public function laydanhsachphongkham(){
            $p = new mPhongKham();
           
			$tbl = $p->xemdanhsachphongkham();
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