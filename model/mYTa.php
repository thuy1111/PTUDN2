<?php
include_once("connect.php");

class mYTa {
    private $conn;

    public function __construct() {
        $p = new clsKetNoi();
        $this->conn = $p->moketnoi();
        if ($this->conn) {
            $this->conn->set_charset("utf8");
        }
    }

    public function layDSLichLamViec($start, $end, $maNhanVien)
    {
        if (!$this->conn) {
            return false;
        }

        try {
            $str = "SELECT llv.*, nv.hoTen FROM lichlamviec llv 
                    INNER JOIN nhanvien nv ON llv.maNhanVien = nv.maNhanVien 
                    WHERE llv.ngayLamViec BETWEEN ? AND ? AND nv.maChucVu = 2 AND llv.maNhanVien = ?";
            $stmt = $this->conn->prepare($str);
            $stmt->bind_param("ssi", $start, $end, $maNhanVien);  
            $stmt->execute();
            $result = $stmt->get_result();

            $lichLamViec = [];
            while ($row = $result->fetch_assoc()) {
                $lichLamViec[] = $row;
            }

            $stmt->close();
            return $lichLamViec;
        } catch (Exception $e) {
            error_log("Error in layDSLichLamViec: " . $e->getMessage());
            return false;
        }
    }

    public function layChiTietLichLamViec($maLichLamViec, $maNhanVien)
    {
        if (!$this->conn) {
            return false;
        }

        try {
            $str = "SELECT llv.*, nv.hoTen, nv.maChucVu 
                    FROM lichlamviec llv
                    INNER JOIN nhanvien nv ON llv.maNhanVien = nv.maNhanVien
                    WHERE llv.maLichLamViec = ? AND nv.maChucVu = 2 AND llv.maNhanVien = ?";
            $stmt = $this->conn->prepare($str);
            $stmt->bind_param("ii", $maLichLamViec, $maNhanVien);
            $stmt->execute();
            $result = $stmt->get_result();

            $chiTiet = $result->fetch_assoc();

            $stmt->close();
            return $chiTiet;
        } catch (Exception $e) {
            error_log("Error in layChiTietLichLamViec: " . $e->getMessage());
            return false;
        }
    }

    public function __destruct() {
        if ($this->conn) {
            $p = new clsKetNoi();
            $p->dongketnoi($this->conn);
        }
    }

    public function DKCa($manv, $date, $ca) {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        $conn->set_charset("utf8");
        if ($conn) {
            $str = "INSERT INTO `lichlamviec` (`maLichLamViec`, `ngayLamViec`, `caLamViec`, `maNhanVien`) VALUES (NULL, ?, ?, ?)";
            $stmt = $conn->prepare($str);
            $stmt->bind_param("ssi", $date, $ca, $manv);
            $result = $stmt->execute();
            $stmt->close();
            $p->dongketnoi($conn);
            return $result;
        } else {
            return false;
        }
    }
}
?>

