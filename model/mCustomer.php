<?php
    include_once("connect.php");

    class mCustomer {
        public function mGetAllCustomer() {
            $db = new clsKetNoi();
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "SELECT * FROM benhnhan";
                return $conn->query($sql);
            }
            return false;
        }
        
        // Get customer by email
        public function mGetCustomerByEmail($email) {
            $db = new clsKetNoi();
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "SELECT hoTen FROM benhNhan WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                return $stmt->get_result();
            }
            return false;
        }

        // Save recovery code for password reset
        public function mSaveRecoveryCode($email, $recoveryCode) {
            $db = new clsKetNoi();
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "UPDATE benhNhan SET recovery_code = ? WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $recoveryCode, $email);
                return $stmt->execute();
            }
            return false;
        }
        
        // Verify the recovery code
        public function mVerifyRecoveryCode($code) {
            $db = new clsKetNoi();
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "SELECT maBenhNhan FROM benhNhan WHERE recovery_code = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $code);
                $stmt->execute();
                return $stmt->get_result();
            }
            return false;
        }
        
        // Update password using recovery code
        public function mUpdatePassword($code, $newPassword) {
            $db = new clsKetNoi();
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "UPDATE benhNhan SET matKhau = ?, recovery_code = '', code_expiry = '' WHERE recovery_code = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $newPassword, $code);
                return $stmt->execute();
            }
            return false;
        }

        // Insert new customer
        public function mInsertCustomer($name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD) {
            $db = new clsKetNoi();
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "INSERT INTO benhnhan (hoTen, ngaySinh, gioiTinh, diaChi, soDienThoai, email, tenDangNhap, matKhau, maBaoHiem, maHoaDon) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssssii", $name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD);
                return $stmt->execute();
            }
            return false;
        }

        // Get customer info by session
        public function mGetCustomerBySession() {
            session_start();
            if (isset($_SESSION['maBenhNhan'])) {
                $maBenhNhan = $_SESSION['maBenhNhan'];
                $db = new clsKetNoi();
                $conn = $db->moketnoi();

                if ($conn != NULL) {
                    $sql = "SELECT * FROM benhnhan WHERE maBenhNhan = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $maBenhNhan);
                    $stmt->execute();
                    return $stmt->get_result();
                }
            }
            return false;
        }
    }
?>
