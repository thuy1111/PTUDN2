<?php
include_once("../../controller/cDonThuoc.php");

if (isset($_POST['changeStatus'])) {
    $id = $_POST['id'];
    $p = new cDonThuoc();
    $result = $p->updateDonThuoc($id, "Đã Thanh Toán"); // Hàm cập nhật trạng thái

    if ($result) {
        echo '<script>alert("Cập nhật trạng thái thành công!"); window.location.href = "xulythuoc.php";</script>';
    } else {
        echo '<script>alert("Cập nhật trạng thái thất bại!"); window.history.back();</script>';
    }
}
?>