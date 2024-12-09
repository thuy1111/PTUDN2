<?php
include_once("connect.php");

class modelBaoHiem {
    public function selectAllBaoHiem() {
        $p = new clsketnoi();
        $con = $p->moKetNoi();
        $truyvan = "SELECT * FROM baohiem";
        $ketqua = mysqli_query($con, $truyvan);
        $p->dongKetNoi($con);
        return $ketqua;
    }

    public function selectBaoHiemById($maBaoHiem) {
        $p = new clsketnoi();
        $con = $p->moKetNoi(); 
        $truyvan = "SELECT * FROM baohiem WHERE maBaoHiem = ?";
        $stmt = mysqli_prepare($con, $truyvan);
        mysqli_stmt_bind_param($stmt, "i", $maBaoHiem); 
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $p->dongKetNoi($con);
        return $result;
    }
}
?>
