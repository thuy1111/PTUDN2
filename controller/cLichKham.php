<?php

include_once("../../model/mLichKham.php");

class controllerLichKham
{
    
    public function hienThiLichKham()
    {
        $lichKhamModel = new mLichKham();
        $dsLichKham = $lichKhamModel->layDSLichKham();
        if ($dsLichKham) {
            return $dsLichKham;
        } else {
            return false;
        }
    }

    
    public function hienThiChiTietLK($maLichKham)
    {
        $lichKhamModel = new mLichKham();
        $chiTietLK = $lichKhamModel->layChiTietLichKham($maLichKham);
        if ($chiTietLK) {
            return $chiTietLK;
        } else {
            return false;
        }
    }
}
?>
