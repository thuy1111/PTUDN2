<?php
    include_once("connect.php");
    class mUser {
        public function mGetAllUser() {
            $db = new clsKetNoi;
            $conn = $db->moketnoi();
            
            if ($conn != NULL) {
                $sql = "SELECT * FROM nhanvien";
            
                return $conn->query($sql);
            } return 0;
        }
    }
?>