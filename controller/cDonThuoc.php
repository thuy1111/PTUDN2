<?php
include_once("../../model/mDonThuoc.php");

class cDonThuoc {
    // Lấy tất cả đơn thuốc
    public function getAllDonThuoc() {
        $p = new mDonThuoc();
        $tbl = $p->SelectAllDonThuoc();

        if ($tbl && mysqli_num_rows($tbl) > 0) {
            return $tbl; // Trả về kết quả truy vấn
        } else {
            return false; // Không tìm thấy dữ liệu
        }
    }

    // Lấy thông tin một đơn thuốc
    public function select01DT($maDonThuoc) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();

        // Làm sạch dữ liệu đầu vào để tránh SQL Injection
        $maDonThuoc = mysqli_real_escape_string($con, $maDonThuoc);

        $truyvan = "SELECT * FROM donthuoc WHERE maDonThuoc = '$maDonThuoc'";
        $tbl = mysqli_query($con, $truyvan);

        if (!$tbl) {
            echo "Lỗi truy vấn: " . mysqli_error($con);
        }

        $p->dongKetNoi($con);
        return $tbl;
    }

    // Cập nhật tình trạng đơn thuốc
    public function updateDonThuoc($maDonThuoc, $tinhTrang) {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
    
        // Sanitize input to prevent SQL injection
        $maDonThuoc = mysqli_real_escape_string($con, $maDonThuoc);
        $tinhTrang = mysqli_real_escape_string($con, $tinhTrang);
    
        // Update the status of the main prescription (donthuoc)
        $truyvan = "UPDATE donthuoc SET tinhTrang = '$tinhTrang' WHERE maDonThuoc = '$maDonThuoc'";
        $kq = mysqli_query($con, $truyvan);
    
        if (!$kq) {
            echo "Lỗi truy vấn: " . mysqli_error($con);
            $p->dongKetNoi($con);
            return false;
        }
    
        // If the prescription status is updated successfully and the status is 'Đã Thanh Toán',
        // also update the status of the details (chitietdonthuoc)
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
    
        // Close the connection and return true to indicate success
        $p->dongKetNoi($con);
        return true; // Successfully updated both the main prescription and details
    }
    
}
?>
