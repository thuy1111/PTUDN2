<html>

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="../../assets/images/logo/hospital.png" type="image/x-icon">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<?php
error_reporting(1);
session_start();

include_once("../../controller/cUser.php");
include_once("../../controller/cCustomer.php");
$ctrlUser = new cUser;
$ctrlCustomer = new cCustomer;

if (isset($_POST["btndk"])) {
    $userName = $_POST["username"];
    $pass = md5($_POST["pass"]);
    $foundNV = true;
    $foundBN = true;

    if (empty($userName) || empty($pass)) {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin đăng nhập!');</script>";
    } else {
        if ($ctrlUser->cGetAllUser() != 0) {
            $result = $ctrlUser->cGetAllUser();

            while ($row = $result->fetch_assoc()) {
                if ($userName == $row["tenDangNhap"] && $pass == $row["matKhau"]) {
                    $_SESSION["loginNV"] = true;
                    switch ($row["maNhanVien"]) {
                        case 1:
                            echo "<script>window.location.href = '../bacSi/';</script>";
                            break;
                        case 2:
                            echo "<script>window.location.href = '../yTa/';</script>";
                            break;
                        case 3:
                            echo "<script>window.location.href = '../quanLyNhanSu/';</script>";
                            break;
                        case 4:
                            echo "<script>window.location.href = '../leTan/';</script>";
                            break;
                        case 5:
                            echo "<script>window.location.href = '../quanLyThuoc/';</script>";
                            break;
                        case 6:
                            echo "<script>window.location.href = '../keToan/';</script>";
                            break;
                    }
                }
                
                $foundNV = false;
            }
        }
        
        if (!$found && $ctrlCustomer->cGetAllCustomer() != 0) {
            $result = $ctrlCustomer->cGetAllCustomer();

            while ($row = $result->fetch_assoc()) {
                if ($userName == $row["tenDangNhap"] && $pass == $row["matKhau"]) {
                    $_SESSION["loginBN"] = true;
                    echo "<script>window.location.href = '../benhNhan/';</script>";
                }
                
                $foundBN = false;
            }
        }
    }
    
    if (!$foundNV && !$foundBN)
        echo "<script>alert('Thông tin đăng nhập không hợp lệ. Vui lòng đăng nhập lại!');</script>";
}
?>

<body class="h-screen flex items-center justify-center bg-[#F0FFFE]">
    <form action="" method="POST" class="m-0">
        <div class="absolute top-4 left-4 flex flex-col items-center">
            <a href="../../index.php" class="flex flex-col items-center">
                <img src="../../assets/images/logo/logo1.png" alt="Hospital logo" class="w-48 h-20 mb-2" />
            </a>
        </div>
        <div class="bg-white px-8 py-20 border border-gray-300 rounded-lg shadow-md h-fit">
            <div class="flex flex-col justify-center items-center mb-10">
                <i class="fas fa-user-circle text-7xl text-white bg-gray-500 rounded-full"> </i>
                <h2 class="font-bold text-3xl mt-3 text-[#f37c7c]">ĐĂNG NHẬP</h2>
            </div>
            <div class="space-y-4 mb-4">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td>
                            <label for="userName" class="font-bold">Tên đăng nhập</label>
                            <input type="text" id="userName" name="username" class="w-full mt-2 mb-4 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300" placeholder="Tên đăng nhập" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="pass" class="font-bold">Mật khẩu</label>
                            <input type="password" id="pass" name="pass" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300" placeholder="Mật khẩu" />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-2 text-right">
                <a class="text-md text-[#5d5c5d] italic hover:underline" href="forget_pass.php">Quên mật khẩu?</a>
            </div>
            <div class="mt-4 text-center">
                <span>Chưa có tài khoản?</span><a class="text-md text-[#68665b] italic hover:underline" href="../dangKy/"> Đăng ký</a>
            </div>
            <div class="mt-4 w-full">
                <button type="submit" name="btndk" class="w-full bg-[#f37c7c] py-2 px-auto rounded-lg text-white text-lg opacity-90 hover:opacity-100 transition-all ease">Đăng nhập</button>
            </div>
        </div>
    </form>
</body>

</html>