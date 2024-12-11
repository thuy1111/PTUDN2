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
    public function select01CTDT($mactdt){
        $p=new clsketnoi();
		$con=$p->moKetNoi();
		$truyvan="select * from chitietdonthuoc where maChiTietDT=$mactdt";
		$ketqua=mysqli_query($con,$truyvan);
		$p->dongKetNoi($con);
		return $ketqua;
    }

    public function capnhatCTDT($maChiTietDT,$tinhTrang)
    {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        $conn ->set_charset("utf8");
        if ($conn) {
            $str = "UPDATE `chitietdonthuoc` SET  `tinhTrang` = $tinhTrang WHERE `chitietdonthuoc`.`maChiTietDT` = $maChiTietDT;";
            $tbl = $conn->query($str);
            $p->dongketnoi($conn);
            return $tbl;
        } else {
            return false;
        }
    }
    
}
?>
