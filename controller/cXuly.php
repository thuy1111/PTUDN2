<?php
    include_once("../../model/mXuly.php");
    class cXuly{
        public function getAllDonThuoc(){
            $p = new mXuly();
            $tbl = $p->selectAllDonThuoc();
			if(mysqli_num_rows($tbl)){
				return $tbl;
			}else{
				return false;
			}
        }
        public function select01DT($maDonThuoc){
            $p = new clsketnoi();
            $con = $p->moKetNoi();
            $truyvan="Select * from `donthuoc` where maDonThuoc=$maDoThuoc";
            $tbl= mysqli_query($con,$truyvan);
            $p -> dongKetNoi($con);
            return $tbl;
}
        public function updateDonThuoc($maDonThuoc,$tinhTrang){
            $p = new clsketnoi();
            $truyvan = "update `donthuoc` set  maDonThuoc = $maDonThuoc, tinhTrang='$tinhTrang', 
            where maDonThuoc = $maDonThuoc";
            $con = $p -> moKetNoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> dongKetNoi($con);
            return $kq;
            }
}
?> 