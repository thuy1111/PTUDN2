<?php
include_once("../../model/mBenhNhan.php");

class cBenhNhan {
    public function layThongTinLichKham($maBenhNhan, $maLichKham) {
        $p = new mBenhNhan();
        $tbl = $p->layThongTinLichKham($maBenhNhan, $maLichKham);
        if ($tbl) {
            if ($tbl->num_rows > 0) {
                return $tbl;
            } else {
                return null; // Không có dữ liệu trong bảng
            }
        } else {
            return false;
        }
    }

    public function themThongTinVaoHoaDon($maBenhNhan, $maLichKham) {
        $p = new mBenhNhan();
        $result = $p->themThongTinVaoHoaDon($maBenhNhan, $maLichKham);
        return $result; // Trả về true nếu thêm thành công, false nếu thất bại
    }

    public function hienThiLichKhamTheoBenhNhan($maBenhNhan) {
        if (!$maBenhNhan) {
            return false; 
        }
        $lichKhamModel = new mBenhNhan();
        $dsLichKham = $lichKhamModel->layDSLichKhamTheoBenhNhan($maBenhNhan);
        return $dsLichKham; // Trả về mảng dữ liệu hoặc false nếu không có dữ liệu
    }

    public function hienThiChiTietLKTheoBenhNhan($maLichKham, $maBenhNhan) {
        if (!$maBenhNhan || !$maLichKham) {
            return false; 
        }

        $lichKhamModel = new mBenhNhan();
        $chiTietLK = $lichKhamModel->layChiTietLichKhamTheoBenhNhan($maLichKham, $maBenhNhan);
        return $chiTietLK; // Trả về dữ liệu chi tiết hoặc false nếu không tìm thấy
    }
}
?>