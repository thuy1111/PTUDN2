<?php
include_once('../../model/mThongkethuoc.php');

class cThongkethuoc {
    public function thongKeThuoc($bacSiId = null) {
        $model = new mThongkethuoc();
        $result = $model->getThuocByBacSi($bacSiId);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return null;
        }
    }
}
?>
