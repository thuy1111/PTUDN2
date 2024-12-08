<?php
    include_once("../../model/mThongkethuoc.php");

    class cThongkethuoc {
        // Thống kê thuốc theo bảo hiểm
        public function thongKeThuocTheoBaoHiem($baoHiemId, $startDate, $endDate) {
            $p = new mThongkethuoc();
            $result = $p->thongKeThuocTheoBaoHiem($baoHiemId, $startDate, $endDate);

            if ($result !== false) {
                return [
                    "json" => json_encode(["thuoc" => $result]), // Dữ liệu cho biểu đồ
                    "value" => $result                           // Dữ liệu cho bảng
                ];
            } else {
                return [
                    "json" => json_encode(["error" => "Không thể kết nối tới cơ sở dữ liệu"]),
                    "value" => null
                ];
            }
        }
        // Thống kê thuốc theo bác sĩ
        public function thongKeThuocTheoBacSi($bacSiId, $startDate, $endDate) {
            $p = new mThongkethuoc();
            $result = $p->thongKeThuocTheoBacSi($bacSiId, $startDate, $endDate);

            if ($result !== false) {
                return [
                    "json" => json_encode(["thuoc" => $result]), // Dữ liệu cho biểu đồ
                    "value" => $result                           // Dữ liệu cho bảng
                ];
            } else {
                return [
                    "json" => json_encode(["error" => "Không thể kết nối tới cơ sở dữ liệu"]),
                    "value" => null
                ];
            }
        }
    }
?>
