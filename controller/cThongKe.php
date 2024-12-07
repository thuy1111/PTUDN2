<?php
    include_once("../../model/mThongKeDoanhThu.php");

    class cThongKe {
        public function thongKeTongDoanhThu($startDate, $endDate) {
            $p = new mThongKeDoanhThu();
            $result = $p->thongKeTongDoanhThu($startDate, $endDate);

            if ($result !== false) {
                // Prepare JSON for chart and numeric value for table
                $jsonResult = json_encode(["tongDoanhThu" => $result]);
                return [
                    "json" => $jsonResult,   // JSON for charting
                    "value" => $result       // Numeric value for display in the table
                ];
            } else {
                // Return an error message in JSON if the connection fails
                return [
                    "json" => json_encode(["error" => "Không thể kết nối tới cơ sở dữ liệu"]),
                    "value" => null          // No revenue value to display
                ];
            }
        }

        public function thongKeDoanhThuTheoLoaiThoiGian($loaiTG, $khoangTG, $startDate, $endDate, $year) {
            $p = new mThongKeDoanhThu();
            $result = $p->thongKeDoanhThuTheoLoaiThoiGian($loaiTG, $khoangTG, $startDate, $endDate, $year);
        
            if ($result !== false) {
                $jsonResult = json_encode($result);
                return [
                    "json" => $jsonResult,   // Dữ liệu JSON cho biểu đ��
                    "data" => $result,                // Dữ liệu gốc để xử lý nếu cần
                    "result" => $result               // Đảm bảo "result" luôn được đ��nh ngh��a
                ];
            } else {
                return [
                    "json" => json_encode(["error" => "Không thể kết nối tới cơ sở dữ liệu"]),
                    "data" => null,
                    "result" => []  // Đảm bảo "result" luôn được định nghĩa
                ];
            }
        }
                
    
        public function thongKeDoanhThuTheoKhoa($khoa, $loaiTG, $khoangTG, $startDate, $endDate, $year) {
            $p = new mThongKeDoanhThu();
            $result = $p->thongKeDoanhThuTheoKhoa($khoa, $loaiTG, $khoangTG, $startDate, $endDate, $year);

            if ($result !== false) {
                $jsonResult = json_encode($result);
                return [
                    "json" => $jsonResult,
                    "data" => $result,
                    "result" => $result
                ];
            } else {
                return [
                    "json" => json_encode(["error" => "Không thể kết nối tới cơ sở dữ liệu"]),
                    "data" => null,
                    "result" => []
                ];
            }
        }
        
    }
?>
