<?php
//xử lý đơn thuốc
    include_once("connect.php");
    class mXuly{
        public function SelectAllXuly(){
            $p = new clsKetNoi();
            $con = $p->moketnoi();
            $con -> set_charset('utf8');
            if ($con){
                $str = "select * from donthuoc";
                $tblDT = $con -> query($str);
                $p ->dongketnoi($con);
                return $tblDT;
            }else{
                return false;
            }
        }
        public function selectAllXulyByName(){
            $p = new clsketnoi();
            $truyvan = " SELECT bn.*, dt.*
                FROM benhnhan bn
                JOIN donthuoc dt ON dt.maBenhNhan = bn.maBenhNhan";
            $con = $p -> moketnoi();
            $kq = mysqli_query($con, $truyvan);
            $p -> dongketnoi($con);
            return $kq;
        }
        

}
?>
