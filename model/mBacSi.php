<?php
include_once("connect.php");

class mBacsi{

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
                    WHERE llv.ngayLamViec BETWEEN ? AND ? AND llv.maNhanVien = ?";
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
                    WHERE llv.maLichLamViec = ? AND nv.maChucVu = 1 AND llv.maNhanVien = ?";
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

    public function layChiTietNhanVien($maNhanVien) {
		if (!$this->conn) {
			return false;
		}
			try {
			$str = "SELECT maNhanVien, hoTen, maChucVu 
					FROM nhanvien 
					WHERE maNhanVien = ?";
			$stmt = $this->conn->prepare($str);
			$stmt->bind_param("i", $maNhanVien);
			$stmt->execute();
			$result = $stmt->get_result();
	
			$chiTiet = $result->fetch_assoc();
	
			$stmt->close();
			return $chiTiet;
		} catch (Exception $e) {
			error_log("Error in layChiTietNhanVien: " . $e->getMessage());
			return false;
		}
	}
	

    

    public function DKCa($manv,$date,$ca){
        $p = new clsKetNoi();
			$conn = $p->moketnoi();
			$conn ->set_charset("utf8");
			if ($conn) {
				$str = "INSERT INTO `lichlamviec` (`maLichLamViec`, `ngayLamViec`, `caLamViec`, `maNhanVien`) VALUES (NULL, '$date', '$ca', '$manv')";
				$tbl = $conn->query($str);
				$p->dongketnoi($conn);
				return $tbl;
			} else {
				return false;
			}
    }

	public function layDSLichKham($maNhanVien)
    {
        if (!$this->conn) {
            return false;
        }

        try {
            $str = "SELECT * FROM lichkham WHERE maNhanVien = ?";
            $stmt = $this->conn->prepare($str);
            $stmt->bind_param("i", $maNhanVien);
            $stmt->execute();
            $result = $stmt->get_result();

            $lichKham = [];
            while ($row = $result->fetch_assoc()) {
                $lichKham[] = $row;
            }

            $stmt->close();
            return $lichKham;
        } catch (Exception $e) {
            error_log("Error in layDSLichKham: " . $e->getMessage());
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
	public function __destruct() {
        if ($this->conn) {
            $p = new clsKetNoi();
            $p->dongketnoi($this->conn);
        }
    }
} 