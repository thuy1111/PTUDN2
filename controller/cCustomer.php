<?php
    include_once("../../model/mCustomer.php");

    class cCustomer extends mCustomer {
        // Get all customers
        public function cGetAllCustomer() {
            $result = $this->mGetAllCustomer();
            if ($result) {
                return $result;
            }
            return false; // Returning false if no results found or query failed
        }

        // Get customer by email
        public function cGetCustomerByEmail($email) {
            $result = $this->mGetCustomerByEmail($email);
            if ($result && $result->num_rows > 0) {
                return $result;
            }
            return false; // Return false if no customer found or query failed
        }

        // Save recovery code for the customer
        public function cSaveRecoveryCode($email, $recoveryCode) {
            return $this->mSaveRecoveryCode($email, $recoveryCode);
        }

        // Verify recovery code
        public function cVerifyRecoveryCode($code) {
            $result = $this->mVerifyRecoveryCode($code);
            if ($result && $result->num_rows > 0) {
                return $result; // Valid recovery code
            }
            return false; // Return false if code is invalid or not found
        }

        // Update password after recovery
        public function cUpdatePassword($code, $newPassword) {
            return $this->mUpdatePassword($code, $newPassword);
        }

        // Insert new customer
        public function cInsertCustomer($name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD) {
            return $this->mInsertCustomer($name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD);
        }
    }
?>
