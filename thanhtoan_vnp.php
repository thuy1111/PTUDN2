<?php
    include_once("controller/cBenhNhan.php");

    if(isset($_SESSION['customer'][0])){
        $maBenhNhan = $_SESSION['customer'][0];
        $ctrlBenhNhan = new cBenhNhan();
        
    }else{
        echo "<script>alert('Vui lòng đăng nhập!');window.location.href = 'view/dangNhap/';</script>";
        exit();
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="text-center mt-5">Thanh Toán Online</h1>
    <form action="controller/cThanhToanOnline.php" method="post" class="text-center mt-3">
        <button name="redirect" type="submit" class="btn btn-success">Thanh toán</button>
    </form>
</div>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>