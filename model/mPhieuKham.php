<?php

include_once("connect.php");

class mPhieuKhamBenh
{

    public function layDSPKB($keyword = "", $maBenhNhan = "", $maNhanVien = "")
    {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        $conn->set_charset("utf8");
        if ($conn) {
            $str = "SELECT pkb.*, bn.hoTen as tenBenhNhan, nv.hoTen as tenNhanVien 
                    FROM phieukhambenh pkb
                    JOIN benhnhan bn ON pkb.maBenhNhan = bn.maBenhNhan
                    JOIN nhanvien nv ON pkb.maNhanVien = nv.maNhanVien
                    WHERE 1=1";
            $params = array();
            $types = "";

            if ($keyword != "") {
                $str .= " AND (pkb.maPhieuKhamBenh LIKE ? OR bn.hoTen LIKE ? OR nv.hoTen LIKE ? OR pkb.ngayKham LIKE ?)";
                $search = "%$keyword%";
                $params = array_merge($params, array($search, $search, $search, $search));
                $types .= "ssss";
            }

            if ($maBenhNhan != "") {
                $str .= " AND pkb.maBenhNhan = ?";
                $params[] = $maBenhNhan;
                $types .= "s";
            }

            if ($maNhanVien != "") {
                $str .= " AND pkb.maNhanVien = ?";
                $params[] = $maNhanVien;
                $types .= "s";  
            }

            $stmt = $conn->prepare($str);
            if (!empty($params)) {
                $stmt->bind_param($types, ...$params);
            }
            $stmt->execute();
            $result = $stmt->get_result();

            $p->dongketnoi($conn);
            return $result;
        } else {
            return false;
        }
    }


    public function layChiTietPKB($maPhieuKhamBenh)
    {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        if ($conn) {
            $conn->set_charset("utf8");
            $str = "SELECT pkb.*, bn.hoTen as tenBenhNhan, nv.hoTen as tenNhanVien
                    FROM phieukhambenh pkb
                    JOIN benhnhan bn ON pkb.maBenhNhan = bn.maBenhNhan
                    JOIN nhanvien nv ON pkb.maNhanVien = nv.maNhanVien
                    WHERE pkb.maPhieuKhamBenh = ?";
            $stmt = $conn->prepare($str);
            $stmt->bind_param("s", $maPhieuKhamBenh);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $p->dongketnoi($conn);
            return $data;
        } else {
            return false;
        }
    }
}
?>