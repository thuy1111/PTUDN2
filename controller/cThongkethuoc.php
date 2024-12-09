<?php
include_once("../../model/mThongkethuoc.php");

class cThongkeThuoc {
    public function thongKeThuoc() {
        $model = new mThongkeThuoc();
        $result = $model->getThuocByLoaiBaoHiem();
        }
    }
?>
