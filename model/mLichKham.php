<?php

include_once("connect.php");

class mLichKham
{
    
    public function layDSLichKham()
    {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        $conn->set_charset("utf8");

        if ($conn) {
            $str = "SELECT * FROM lichkham";
            $tbl = $conn->query($str);
            $p->dongketnoi($conn);
            return $tbl;
        } else {
            return false;
        }
    }

    
    public function layChiTietLichKham($maLichKham)
    {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        $conn->set_charset("utf8");

        if ($conn && $maLichKham) {
            
            $str = "SELECT * FROM lichkham WHERE maLichKham = ?";
            $stmt = $conn->prepare($str);
            $stmt->bind_param("i", $maLichKham);  
            $stmt->execute();
            $result = $stmt->get_result();

            
            if ($result->num_rows > 0) {
                $chiTiet = $result->fetch_assoc();
                $stmt->close();
                $p->dongketnoi($conn);
                return $chiTiet;
            } else {
                $stmt->close();
                $p->dongketnoi($conn);
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
