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
        
        public function mInsertCustomer($name, $birth, $sex, $address, $phone, $userName, $pass, $maBH, $maHD) {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "INSERT INTO benhnhan (hoTen, ngaySinh, gioiTinh, diaChi, soDienThoai, tenDangNhap, matkhau, maBaoHiem, maHoaDon) VALUES ('$name', '$birth', '$sex', '$address', '$phone', '$userName', '$pass', $maBH, $maHD)";
            
                return $conn->query($sql);
            } return 0;
        }
    }
?>