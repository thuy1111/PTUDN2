<?php
include_once("connect.php");

class mThongkethuoc {
    public function getThuocByBacSi($bacSiId = null) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();

        $query = "SELECT nv.maNhanVien AS maBacSi, nv.hoTen AS tenBacSi, ctdt.maThuoc, t.tenThuoc,
                         SUM(ctdt.soLuong) AS tongSoLuong, SUM(ctdt.soLuong * ctdt.donGia) AS tongTien
                  FROM chitietdonthuoc ctdt
                  JOIN nhanvien nv ON ctdt.maBacSi = nv.maNhanVien
                  JOIN thuoc t ON ctdt.maThuoc = t.maThuoc";

        // Add filtering for a specific doctor
        if ($bacSiId) {
            $query .= " WHERE nv.maNhanVien = " . intval($bacSiId);
        }
        $query .= " GROUP BY nv.maNhanVien, nv.hoTen, ctdt.maThuoc, t.tenThuoc";

        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Query Error: " . mysqli_error($con));
        }

        $p->dongKetNoi($con);

        return $result;
    }
}
?>
