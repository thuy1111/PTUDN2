<?php
    include_once("connect.php");
    class mCustomer {
        public function mGetAllCustomer() {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "SELECT * FROM benhnhan";
            
                return $conn->query($sql);
            } return 0;
        }
        
        public function mGetCustomerByEmail($email) {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "SELECT hoTen FROM benhNhan WHERE email = '$email'";
            
                return $conn->query($sql);
            } return 0;
        }
        
        public function mSaveRecoveryCode($email, $recoveryCode) {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "UPDATE benhNhan SET recovery_code = '$recoveryCode' WHERE email = '$email'";
            
                return $conn->query($sql);
            } return 0;
        }
        
        public function mVerifyRecoveryCode($code) {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "SELECT maBenhNhan FROM benhNhan WHERE recovery_code = '$code'";
            
                return $conn->query($sql);
            } return false;
        }
        
        public function mUpdatePassword($code, $newPassword) {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "UPDATE benhNhan SET matKhau = '$newPassword', recovery_code = '', code_expiry = '' WHERE recovery_code = '$code'";
            
                return $conn->query($sql);
            } return 0;
        }
        
        public function mInsertCustomer($name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD) {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "INSERT INTO benhnhan (hoTen, ngaySinh, gioiTinh, diaChi, soDienThoai, email, tenDangNhap, matKhau, maBaoHiem, maHoaDon) VALUES ('$name', '$birth', '$sex', '$address', '$phone', '$email', '$userName', '$pass', $maBH, $maHD)";
            
                return $conn->query($sql);
            } return 0;
        }
    }
?>