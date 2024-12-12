<?php
// Xử lý đơn thuốc
include_once("connect.php");

class mDonThuoc {
    // Lấy tất cả đơn thuốc
    public function SelectAllDonThuoc() {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        $truyvan = "SELECT * FROM benhnhan b JOIN donthuoc t ON b.maBenhNhan = t.maBenhNhan";
        $tbl = mysqli_query($con, $truyvan);
        
        if (!$tbl) {
            echo "Lỗi truy vấn: " . mysqli_error($con);
            return false;
        }

        $p->dongKetNoi($con);
        return $tbl;
    }

    // Lấy thông tin của một đơn thuốc
    public function get01DT($maDonThuoc) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        $truyvan = "SELECT * FROM donthuoc WHERE maDonThuoc = '$maDonThuoc'";
        $kq = mysqli_query($con, $truyvan);

        if (!$kq) {
            echo "Lỗi truy vấn: " . mysqli_error($con);
            $p->dongKetNoi($con);
            return false;
        }

        $p->dongKetNoi($con);

        if (mysqli_num_rows($kq) > 0) {
            return mysqli_fetch_assoc($kq); // Trả về mảng kết quả
        } else {
            return false; // Không tìm thấy
        }
    }

    // Cập nhật tình trạng đơn thuốc
    public function updateDonThuoc($maDonThuoc, $tinhTrang) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
    
        // Update the status of the main prescription (donthuoc)
        $truyvan = "UPDATE donthuoc SET tinhTrang = '$tinhTrang' WHERE maDonThuoc = '$maDonThuoc'";
        $kq = mysqli_query($con, $truyvan);
    
        // If the update for the main prescription fails, return false
        if (!$kq) {
            echo "Lỗi truy vấn: " . mysqli_error($con);
            $p->dongKetNoi($con);
            return false;
        }
    
        // If the prescription status is updated successfully, update the status of the details (chitietdonthuoc)
        if ($tinhTrang == 'Đã Thanh Toán') {
            $truyvanChiTiet = "UPDATE chitietdonthuoc SET tinhTrang = 'Đã Thanh Toán' WHERE maDonThuoc = '$maDonThuoc'";
            $kqChiTiet = mysqli_query($con, $truyvanChiTiet);
    
            // If the update for the details fails, return false
            if (!$kqChiTiet) {
                echo "Lỗi truy vấn chi tiết: " . mysqli_error($con);
                $p->dongKetNoi($con);
                return false;
            }
        }
    
        $p->dongKetNoi($con);
        return true; // Successfully updated both the main prescription and details
    }
    
}
