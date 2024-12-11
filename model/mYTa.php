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

    public function DKCa($manv, $date, $ca){
        if (!$this->conn) {
            return false;
        }
    
        try {
            
            $checkStr = "SELECT COUNT(*) as count FROM `lichlamviec` WHERE `ngayLamViec` = ? AND `caLamViec` = ?";
            $checkStmt = $this->conn->prepare($checkStr);
            $checkStmt->bind_param("ss", $date, $ca);
            $checkStmt->execute();
            $result = $checkStmt->get_result();
            $count = $result->fetch_assoc()['count'];
            $checkStmt->close();
    
            
            if ($count >= 5) {
                return [
                    'status' => false,
                    'message' => 'Đã đạt giới hạn đăng ký cho ca làm việc này.'
                ];
            }
    
            
            $str = "INSERT INTO `lichlamviec` (`ngayLamViec`, `caLamViec`, `maNhanVien`) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($str);
            $stmt->bind_param("ssi", $date, $ca, $manv);
            $result = $stmt->execute();
            $stmt->close();
    
            if ($result) {
                return [
                    'status' => true,
                    'message' => 'Đăng ký ca làm việc thành công.'
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Đã xảy ra lỗi khi đăng ký ca làm việc.'
                ];
            }
        } catch (Exception $e) {
            error_log("Error in DKCa: " . $e->getMessage());
            return [
                'status' => false,
                'message' => 'Đã xảy ra lỗi khi đăng ký ca làm việc.'
            ];
        }
    }

    public function kiemTraCaLam($manv, $date, $ca) {
        if (!$this->conn) {
            return false;
        }
    
        try {
            $str = "SELECT * FROM lichlamviec WHERE maNhanVien = ? AND ngayLamViec = ? AND caLamViec = ?";
            $stmt = $this->conn->prepare($str);
            $stmt->bind_param("iss", $manv, $date, $ca);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();

            return $result->num_rows > 0;
        } catch (Exception $e) {
            error_log("Error in kiemTraCaLam: " . $e->getMessage());
            return false;
        }
    }
}
?>

