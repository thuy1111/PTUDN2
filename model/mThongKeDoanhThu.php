<?php
    include_once("connect.php");
    class mThongKeDoanhThu{
        // In mThongKe.php - tinhTongDoanhThu function
        public function thongKeTongDoanhThu($startDate, $endDate) {
            $p = new clsKetNoi();
            $pdo = $p->connect();
            
            if ($pdo) {
                // Query to get the total revenue between start and end dates
                $sql = "SELECT SUM(tongTienKham + tongTienThuoc + tongTienXetNghiem) AS tongDoanhThu 
                        FROM hoadon 
                        WHERE ngayKham BETWEEN :startDate AND :endDate";
                
                // Prepare the statement to prevent SQL injection
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':startDate', $startDate);
                $stmt->bindParam(':endDate', $endDate);
                $stmt->execute();
                
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result ? $result['tongDoanhThu'] : 0;
            } else {
                return false;
            }
        }

        public function thongKeDoanhThuTheoLoaiThoiGian($loaiTG, $khoangTG, $startDate, $endDate, $year) {
            $p = new clsKetNoi();
            $pdo = $p->connect();
            $sql = ""; // Initialize the SQL variable
            
            if ($pdo) {
                if ($loaiTG == "1" && $khoangTG) { // Daily
                    if ($khoangTG == "1") { // Today
                        $sql = "SELECT ngayKham, SUM(tongTienKham + tongTienThuoc + tongTienXetNghiem) AS totalRevenue 
                                FROM hoadon 
                                WHERE ngayKham = CURDATE() 
                                GROUP BY ngayKham";
                    } elseif ($khoangTG == "2") { // Last 7 days
                        $sql = "SELECT ngayKham, SUM(tongTienKham + tongTienThuoc + tongTienXetNghiem) AS totalRevenue 
                                FROM hoadon 
                                WHERE ngayKham >= CURDATE() - INTERVAL 7 DAY 
                                GROUP BY ngayKham";
                    } elseif ($khoangTG == "3") { // Last 30 days
                        $sql = "SELECT ngayKham, SUM(tongTienKham + tongTienThuoc + tongTienXetNghiem) AS totalRevenue 
                                FROM hoadon 
                                WHERE ngayKham >= CURDATE() - INTERVAL 30 DAY 
                                GROUP BY ngayKham";
                    } elseif ($khoangTG == "4") { // Custom date range
                        $sql = "SELECT ngayKham, SUM(tongTienKham + tongTienThuoc + tongTienXetNghiem) AS totalRevenue 
                                FROM hoadon 
                                WHERE ngayKham BETWEEN :startDate AND :endDate
                                GROUP BY ngayKham";
                    }
                } elseif ($loaiTG == "2" && $year) { // Monthly for a given year
                    $sql = "SELECT MONTH(ngayKham) AS thang, YEAR(ngayKham) AS nam, 
                                   SUM(tongTienKham + tongTienThuoc + tongTienXetNghiem) AS totalRevenue 
                            FROM hoadon 
                            WHERE YEAR(ngayKham) = :year
                            GROUP BY MONTH(ngayKham), YEAR(ngayKham)";
                } elseif ($loaiTG == "3" && $year) { // Quarterly for a given year
                    $sql = "SELECT QUARTER(ngayKham) AS quy, YEAR(ngayKham) AS nam, 
                                   SUM(tongTienKham + tongTienThuoc + tongTienXetNghiem) AS totalRevenue 
                            FROM hoadon 
                            WHERE YEAR(ngayKham) = :year
                            GROUP BY QUARTER(ngayKham), YEAR(ngayKham)";
                } else {
                    throw new InvalidArgumentException("Invalid time period type or missing parameters.");
                }
        
                // Prepare the SQL statement
                $stmt = $pdo->prepare($sql);
        
                // Bind parameters if needed
                if ($khoangTG == "4") {
                    $stmt->bindParam(':startDate', $startDate);
                    $stmt->bindParam(':endDate', $endDate);
                }
                if ($loaiTG == "2" || $loaiTG == "3") {
                    $stmt->bindParam(':year', $year);
                }
        
                // Execute the statement
                $stmt->execute();

                // Fetch and return results
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return false;
            }
        }
        
        public function thongkeDoanhThuTheoKhoa($khoa, $loaiTG, $khoangTG, $startDate, $endDate, $year) {
            $p = new clsKetNoi();
            $pdo = $p->connect();
            $sql = "";
        
            if ($pdo) {
                if ($khoa == "0") {
                    if ($loaiTG == "2") {
                        // Truy vấn theo tháng
                        $sql = "SELECT k.maKhoa, k.tenKhoa, MONTH(h.ngayKham) AS thang, YEAR(h.ngayKham) AS nam, 
                                SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu 
                                FROM hoadon h 
                                JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                JOIN khoa k ON k.maKhoa = n.maKhoa
                                WHERE YEAR(h.ngayKham) = :year
                                GROUP BY k.maKhoa, k.tenKhoa, MONTH(h.ngayKham), YEAR(h.ngayKham)";
                    } elseif ($loaiTG == "3") {
                        // Truy vấn theo quý
                        $sql = "SELECT k.maKhoa, k.tenKhoa, QUARTER(h.ngayKham) AS quy, YEAR(h.ngayKham) AS nam, 
                                SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                FROM hoadon h 
                                JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                JOIN khoa k ON k.maKhoa = n.maKhoa
                                WHERE YEAR(h.ngayKham) = :year
                                GROUP BY k.maKhoa, k.tenKhoa, QUARTER(h.ngayKham), YEAR(h.ngayKham)";
                    } elseif ($loaiTG == "1") {
                        // Truy vấn theo ngày dựa trên khoảng thời gian
                        if ($khoangTG == "1") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE h.ngayKham = CURDATE() 
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        } elseif ($khoangTG == "2") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE h.ngayKham >= CURDATE() - INTERVAL 7 DAY
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        } elseif ($khoangTG == "3") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE h.ngayKham >= CURDATE() - INTERVAL 30 DAY
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        } elseif ($khoangTG == "4") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE h.ngayKham BETWEEN :startDate AND :endDate
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        }
                    }
                }elseif ($khoa != "0") {
                    if ($loaiTG == "2") {
                        // Truy vấn theo tháng
                        $sql = "SELECT k.maKhoa, k.tenKhoa, MONTH(h.ngayKham) AS thang, YEAR(h.ngayKham) AS nam, 
                                SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu 
                                FROM hoadon h 
                                JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                JOIN khoa k ON k.maKhoa = n.maKhoa
                                WHERE YEAR(h.ngayKham) = :year AND k.maKhoa = :khoa
                                GROUP BY k.maKhoa, k.tenKhoa, MONTH(h.ngayKham), YEAR(h.ngayKham)";
                    } elseif ($loaiTG == "3") {
                        // Truy vấn theo quý
                        $sql = "SELECT k.maKhoa, k.tenKhoa, QUARTER(h.ngayKham) AS quy, YEAR(h.ngayKham) AS nam, 
                                SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                FROM hoadon h 
                                JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                JOIN khoa k ON k.maKhoa = n.maKhoa
                                WHERE YEAR(h.ngayKham) = :year AND k.maKhoa = :khoa
                                GROUP BY k.maKhoa, k.tenKhoa, QUARTER(h.ngayKham), YEAR(h.ngayKham)";
                    } elseif ($loaiTG == "1") {
                        // Truy vấn theo ngày dựa trên khoảng thời gian
                        if ($khoangTG == "1") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE h.ngayKham = CURDATE() AND k.maKhoa = :khoa
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        } elseif ($khoangTG == "2") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE (h.ngayKham >= CURDATE() - INTERVAL 7 DAY) AND k.maKhoa = :khoa
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        } elseif ($khoangTG == "3") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE (h.ngayKham >= CURDATE() - INTERVAL 30 DAY) AND k.maKhoa = :khoa
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        } elseif ($khoangTG == "4") {
                            $sql = "SELECT k.maKhoa, k.tenKhoa, h.ngayKham, 
                                    SUM(h.tongTienKham + h.tongTienThuoc + h.tongTienXetNghiem) AS doanhThu
                                    FROM hoadon h 
                                    JOIN hoadon_phieukhambenh hp ON h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p ON hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n ON n.maNhanVien = p.maNhanVien
                                    JOIN khoa k ON k.maKhoa = n.maKhoa
                                    WHERE (h.ngayKham BETWEEN :startDate AND :endDate) AND k.maKhoa = :khoa
                                    GROUP BY k.maKhoa, k.tenKhoa, h.ngayKham";
                        }
                    }
                }
                
                // Prepare the query
                $stmt = $pdo->prepare($sql);
                
                // Bind parameters based on the query
                if ($khoa != "0") {
                    $stmt->bindParam(':khoa', $khoa);
                }
                if ($loaiTG == "1" && $khoangTG == "4") {
                    $stmt->bindParam(':startDate', $startDate);
                    $stmt->bindParam(':endDate', $endDate);
                } elseif ($loaiTG == "2" || $loaiTG == "3") {
                    $stmt->bindParam(':year', $year);
                }
                
                // Execute the query
                $stmt->execute();
                
                // Fetch and return the results
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }
        
    }
?>