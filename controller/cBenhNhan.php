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
                return null; 
            }
        } else {
            return false;
        }
    }

    public function themThongTinVaoHoaDon($maBenhNhan, $maLichKham) {
        $p = new mBenhNhan();
        $result = $p->themThongTinVaoHoaDon($maBenhNhan, $maLichKham);
        return $result; 
    }

    public function hienThiLichKhamTheoBenhNhan($maBenhNhan) {
        if (!$maBenhNhan) {
            return false; 
        }
        $lichKhamModel = new mBenhNhan();
        $dsLichKham = $lichKhamModel->layDSLichKhamTheoBenhNhan($maBenhNhan);
        return $dsLichKham;
    }

    public function hienThiChiTietLKTheoBenhNhan($maLichKham, $maBenhNhan) {
		if (!$maBenhNhan || !$maLichKham) {
			return false;
		}
	
		$lichKhamModel = new mBenhNhan();
		$chiTietLK = $lichKhamModel->layChiTietLichKhamTheoBenhNhan($maLichKham, $maBenhNhan);
	
		if ($chiTietLK) {
			return $chiTietLK; 
		} else {
			return null; 
		}
	}
	
}
?>