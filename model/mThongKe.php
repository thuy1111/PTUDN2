<?php
    include_once('model/connect.php');
    class mThongKe{
        public function tinhTongDoanhThu($startDate, $endDate){
            $p = new clsKetNoi();
            $conn = $p->moketnoi();
            $conn->set_charset("utf8");
            
            if ($conn) {
                // Sử dụng BETWEEN để lọc trong khoảng thời gian từ startDate đến endDate
                $str = "SELECT SUM(tongTienKha + tongTienThuoc + tongTienXetNghiem) AS tongDoanhThu 
                        FROM hoadon 
                        WHERE ngayKham BETWEEN '$startDate' AND '$endDate'";
                
                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            } else {
                return false;
            }
        }

        public function tinhDoanhThuTheoLoaiThoiGian($loaiTG, $startDate, $endDate) {
            $p = new clsKetNoi();
            $conn = $p->moketnoi();
            $conn->set_charset("utf8");
        
            if ($conn) {
                if ($loaiTG == "Tháng") {
                    $str = "SELECT SUM(tongTienKha + tongTienThuoc + tongTienXetNghiem) AS tongDoanhThu 
                            FROM hoadon 
                            WHERE DATE_FORMAT(ngayKham, '%Y-%m') BETWEEN '$startDate' AND '$endDate'";
                } else if ($loaiTG == "Quý") {
                    $str = "SELECT SUM(tongTienKha + tongTienThuoc + tongTienXetNghiem) AS tongDoanhThu 
                            FROM hoadon 
                            WHERE QUARTER(ngayKham) BETWEEN QUARTER('$startDate') AND QUARTER('$endDate') 
                            AND YEAR(ngayKham) BETWEEN YEAR('$startDate') AND YEAR('$endDate')";
                } else if ($loaiTG == "Năm") {
                    $str = "SELECT SUM(tongTienKha + tongTienThuoc + tongTienXetNghiem) AS tongDoanhThu 
                            FROM hoadon 
                            WHERE YEAR(ngayKham) BETWEEN YEAR('$startDate') AND YEAR('$endDate')";
                }
        
                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            } else {
                return false;
            }
        }
        
        public function tinhDoanhThuTheoKhoa($idKhoa, $startDate, $endDate) {
            $p = new clsKetNoi();
            $conn = $p->moketnoi();
            $conn->set_charset("utf8");
        
            if ($conn) {
                $str = "SELECT SUM(tongTienKha + tongTienThuoc + tongTienXetNghiem) AS tongDoanhThu 
                        FROM hoadon h JOIN hoadon_phieukhambenh hp on h.maHoaDon = hp.maHoaDon
                                    JOIN phieukhambenh p on hp.maPKB = p.maPhieuKhamBenh
                                    JOIN nhanvien n on n.maNhanVien = p.maNhanVien
                                    JOIN khoa k on k.maKhoa = n.maKhoa
                        WHERE k.maKhoa = '$idKhoa'
                        AND ngayKham BETWEEN '$startDate' AND '$endDate'";
                $tbl = $conn->query($str);
                $p->dongketnoi($conn);
                return $tbl;
            } else {
                return false;
            }
        }
    }
?>