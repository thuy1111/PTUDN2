<?php
include_once("connect.php");

class modelCTDT {

    // Select all records from chitietdonhang with joins to benhnhan, thuoc, nhanvien, baohiem, donthuoc
    public function selectAllCTDT() {
        $p = new clsketnoi();
        $con = $p->moKetNoi();

        // Query to join chitietdonhang with other relevant tables
        $truyvan = "SELECT 
                        cdt.*, 
                        bn.hoTen AS tenBenhNhan,
                        t.tenThuoc,
                        nv.hoTen AS tenBacSi,
                        bh.maBaoHiem,
                        dt.maDonThuoc,
                        dt.tinhTrang AS tinhTrangDonThuoc
                    FROM 
                        chitietdonthuoc cdt
                    JOIN 
                        benhnhan bn ON cdt.maBenhNhan = bn.maBenhNhan
                    JOIN 
                        thuoc t ON cdt.maThuoc = t.maThuoc
                    JOIN 
                        nhanvien nv ON cdt.maBacSi = nv.maNhanVien
                    JOIN 
                        baohiem bh ON cdt.maBaoHiem = bh.maBaoHiem
                    JOIN 
                        donthuoc dt ON cdt.maDonThuoc = dt.maDonThuoc";

        $ketqua = mysqli_query($con, $truyvan);
        $p->dongKetNoi($con);
        return $ketqua;
    }

    // Select a single record from chitietdonthuoc by maChiTietDT
    public function select01CTDT($machitietdt) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        
        // Secure query to avoid SQL injection
        $truyvan = "SELECT * FROM chitietdonthuoc WHERE maChiTietDT = ?";
        $stmt = mysqli_prepare($con, $truyvan);
        mysqli_stmt_bind_param($stmt, "i", $machitietdt); // 'i' stands for integer
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $p->dongKetNoi($con);
        return $result;
    }

    // Update a specific record in chitietdonthuoc
    public function updateCTDT($machitietdt, $tinhTrang) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        
        // Secure query to avoid SQL injection
        $truyvan = "UPDATE chitietdonthuoc SET tinhTrang = ? WHERE maChiTietDT = ?";
        $stmt = mysqli_prepare($con, $truyvan);
        mysqli_stmt_bind_param($stmt, "si", $tinhTrang, $machitietdt); // 's' for string, 'i' for integer
        $kq = mysqli_stmt_execute($stmt);
        $p->dongKetNoi($con);
        return $kq;
    }

    // Insert a new record into chitietdonthuoc
    public function insertCTDT($maBenhNhan, $maBaoHiem, $maBacSi, $chuanDoan, $STT, $donVi, $donGia, $soLuong, $thanhTien, $maDonThuoc, $tinhTrang, $maThuoc) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        
        // Secure query to avoid SQL injection
        $truyvan = "INSERT INTO chitietdonthuoc (maBenhNhan, maBaoHiem, maBacSi, chuanDoan, STT, donVi, donGia, soLuong, thanhTien, maDonThuoc, tinhTrang, maThuoc) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $truyvan);
        mysqli_stmt_bind_param($stmt, "iiisssdiiisi", $maBenhNhan, $maBaoHiem, $maBacSi, $chuanDoan, $STT, $donVi, $donGia, $soLuong, $thanhTien, $maDonThuoc, $tinhTrang, $maThuoc);
        $kq = mysqli_stmt_execute($stmt);
        $p->dongKetNoi($con);
        return $kq;
    }

    // Delete a specific record from chitietdonthuoc by maChiTietDT
    public function deleteCTDT($machitietdt) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        
        // Secure query to avoid SQL injection
        $truyvan = "DELETE FROM chitietdonthuoc WHERE maChiTietDT = ?";
        $stmt = mysqli_prepare($con, $truyvan);
        mysqli_stmt_bind_param($stmt, "i", $machitietdt); // 'i' for integer
        $kq = mysqli_stmt_execute($stmt);
        $p->dongKetNoi($con);
        return $kq;
    }
}
?>
