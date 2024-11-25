<?php
    include_once("../../model/mCustomer.php");
    
    class cCustomer extends mCustomer {
        public function cGetAllCustomer () {
            if ($this->mGetAllCustomer() != 0)
                return $this->mGetAllCustomer();
            return 0;
        }
        
        public function cGetCustomerByEmail($email) {
            if ($this->mGetCustomerByEmail($email != 0))
                return $this->mGetCustomerByEmail($email);
            return 0;
        }
        
        public function cSaveRecoveryCode($email, $recoveryCode) {
            return $this->mSaveRecoveryCode($email, $recoveryCode);
        }
        
        public function cVerifyRecoveryCode($code) {
            if ($this->mVerifyRecoveryCode($code)) {
                return $this->mVerifyRecoveryCode($code);
            } return false;
        }
        
        public function cUpdatePassword($code, $newPassword) {
            return $this->mUpdatePassword($code, $newPassword);
        }
        
        public function cInsertCustomer ($name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD) {
            return $this->mInsertCustomer($name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD);
        }
    }
?>