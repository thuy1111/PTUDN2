<?php
//xử lý đơn thuốc
    include_once("connect.php");
    class mXuly{
        public function SelectAllDonThuoc(){
            $p=new clsketnoi();
            $con=$p->moKetNoi();
            $truyvan="Select * from benhnhan b join donthuoc t on b.maBenhNhan=t.maBenhNhan";
            $tbl=mysqli_query($con,$truyvan);
            $p->dongKetNoi($con);
            return $tbl;  
        }
        public function get01DT($maDonThuoc){
            $p = new mXuLy();
            $kq = $p -> select01DT($maDonThuoc);
            if(mysqli_num_rows($kq)>0){
                return $kq;
            }else{
                return false;
            }
        }
        public function updateDonThuoc($maDonThuoc,$tinhTrang){
            $p = new mXuly();
            $kq = $p -> updateDonThuoc($maDonThuoc,$tinhTrang);
            if($kq){
                return $kq;
            }else{
                return false;
            }
        }
    }
