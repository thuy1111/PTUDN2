<?php
    include_once("../../model/mCustomer.php");
    
    class cCustomer extends mCustomer {
        public function cGetAllCustomer () {
            if ($this->mGetAllCustomer() != 0)
                return $this->mGetAllCustomer();
            return 0;
        }
        
        public function cInsertCustomer ($name, $birth, $sex, $address, $phone, $userName, $pass, $maBH, $maHD) {
            return $this->mInsertCustomer($name, $birth, $sex, $address, $phone, $userName, $pass, $maBH, $maHD);
        }
    }
?>