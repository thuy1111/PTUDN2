<?php
include_once("connect.php");

class modelThongKeThuoc {
    public function getThuocTheoBaoHiem() {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        
        $query = "SELECT bh.maBaoHiem, COUNT(dt.maDonThuoc) AS soLuongThuoc
                  FROM donthuoc dt
                  JOIN chitietdonthuoc ctdt ON dt.maDonThuoc = ctdt.maDonThuoc
                  JOIN baohiem bh ON ctdt.maBaoHiem = bh.maBaoHiem
                  GROUP BY bh.tenBaoHiem";
        
        $result = mysqli_query($con, $query);
        $p->dongKetNoi($con);
        
        return $result;
    }
    
}
?>
