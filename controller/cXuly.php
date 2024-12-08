<?php
    include_once("../../model/mXuly.php");
    class cXuly{
        public function getAllXuly(){
            $p = new mXuly();
            $tblDT = $p->SelectAllXuly();
            if(!$tblDT){
                return -1;
            }else{
                if($tblDT->num_rows > 0){
                    return $tblDT;
                }else{
                    return 0;
                }
            }
        }
        public function getAllXulyByName(){
            $p = new mXuly();
            $kq = $p->selectAllXulyByName();
            if(mysqli_num_rows($kq) > 0){
                return $kq;
            } else {
                return false;
            }
        }

}
?> 