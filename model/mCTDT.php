<?php
include_once("connect.php");

class modelCTDT {
    // Select all details from chitietdonthuoc
    public function selectAllCTDT() {
        $p = new clsketnoi();
        $con = $p->moKetNoi();

        $truyvan = "
            SELECT ct.*, p.hoTen AS hoTenBacSi, bn.hoTen AS hoTenBenhNhan, t.tenThuoc
            FROM chitietdonthuoc ct
            JOIN nhanvien p ON ct.maBacSi = p.maNhanVien
            JOIN benhnhan bn ON ct.maBenhNhan = bn.maBenhNhan
            JOIN thuoc t ON ct.maThuoc = t.maThuoc
        ";
        $ketqua = mysqli_query($con, $truyvan);

        if (!$ketqua) {
            die("Error fetching data: " . mysqli_error($con));
        }

        $p->dongKetNoi($con);
        return $ketqua;
    }

    // Select one detail from chitietdonthuoc$mactdt
    public function select01CTDT($madt) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
    
        // Truy vấn SQL để lấy chi tiết đơn thuốc
        $truyvan = "
            SELECT ct.*, 
                   p.hoTen AS hoTenBacSi, 
                   bn.hoTen AS hoTenBenhNhan, 
                   t.tenThuoc
            FROM chitietdonthuoc ct
            JOIN nhanvien p ON ct.maBacSi = p.maNhanVien
            JOIN benhnhan bn ON ct.maBenhNhan = bn.maBenhNhan
            JOIN thuoc t ON ct.maThuoc = t.maThuoc
            WHERE ct.maDonThuoc = '$madt'
        ";
    
        // Thực hiện truy vấn
        $ketqua = mysqli_query($con, $truyvan);
    
        // Kiểm tra kết quả truy vấn
        if (!$ketqua) {
            die("Error fetching data: " . mysqli_error($con));
        }
    
        // Đóng kết nối
        $p->dongKetNoi($con);
    
        // Trả về kết quả
        return $ketqua;
    }
    
    

    // Update tinhTrang in chitietdonthuoc
    public function capnhatCTDT($maChiTietDT, $tinhTrang) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();

        // Escape user input to avoid SQL Injection
        $maChiTietDT = mysqli_real_escape_string($con, $maChiTietDT);
        $tinhTrang = mysqli_real_escape_string($con, $tinhTrang);

        $truyvan = "UPDATE chitietdonthuoc SET tinhTrang = '$tinhTrang' WHERE maChiTietDT = '$maChiTietDT'";

        $ketqua = mysqli_query($con, $truyvan);

        if (!$ketqua) {
            echo "Error updating data: " . mysqli_error($con);
            $p->dongKetNoi($con);
            return false;
        }

        $p->dongKetNoi($con);
        return true; // Cập nhật thành công
    }
}
?>
