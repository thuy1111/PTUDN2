<html>

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Đăng ký</title>
    <link rel="shortcut icon" href="../../assets/images/logo/hospital.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" />
</head>
<?php
error_reporting(1);
session_start();

include_once("../../controller/cCustomer.php");
$ctrl = new cCustomer;

if (isset($_POST["btndk"])) {
    $name = $_POST["name"];
    $birth = $_POST["birth"];
    $sex = $_POST["sex"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $userName = $_POST["userName"];
    $pass = md5($_POST["pass"]);
    $maBH = $_POST["maBH"];
    $maHD = $_POST["maHD"];

    if ($name === "" || $birth === "" || $sex === "" || $address === "" || $phone === "" || $email === "" || $userName === "" || $pass === "" || $maBH === "" || $maHD === "") {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin đăng ký!');</script>";
    } else {
        $ctrl->cInsertCustomer($name, $birth, $sex, $address, $phone, $email, $userName, $pass, $maBH, $maHD);

        echo "<script>alert('Đăng ký tài khoản thành công! Hello, ".$userName."');</script>";
    }
}
?>

<body class="flex items-center justify-center bg-[#F0FFFE]">
    <form action="" method="POST" class="my-20 w-full">
        <div class="absolute top-4 left-4 flex flex-col items-center">
            <a href="../../index.php" class="flex flex-col items-center">
                <img src="../../assets/images/logo/logo_main.png" alt="" width="100" />
            </a>
        </div>
        <div class="bg-white px-8 py-10 border border-gray-300 rounded-lg shadow-md h-fit w-2/6 mx-auto">
            <div class="flex flex-col justify-center items-center mb-10">
                <i class="fas fa-user-circle text-7xl text-white bg-gray-500 rounded-full"> </i>
                <h2 class="font-bold text-3xl mt-3 text-[#68665b]">ĐĂNG KÝ</h2>
            </div>
            <div class="space-y-4 mb-4">
                <table class="w-full">
                    <tbody>
                        <tr>
                            <td>
                                <label for="name" class="font-bold">Họ và tên</label>
                                <input type="text" id="name" name="name" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Họ và tên" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="date" class="font-bold">Ngày sinh</label>
                                <input type="date" id="date" name="birth" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Ngày sinh" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="sex" class="font-bold">Giới tính</label>
                                <input type="radio" name="sex" id="male" value="0" class="ml-4 mr-1"><label for="male">Nam</label>
                                <input type="radio" name="sex" id="female" value="1" class="ml-4 mr-1"><label for="female">Nữ</label>
                                <input type="radio" name="sex" id="non" value="2" class="ml-4 mr-1 mb-4"><label for="none">Khác</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="address" class="font-bold">Địa chỉ</label>
                                <input type="text" id="address" name="address" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Địa chỉ">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="phone" class="font-bold">Số điện thoại</label>
                                <input type="text" id="phone" name="phone" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Số điện thoại">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email" class="font-bold">Email</label>
                                <input type="email" id="email" name="email" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="userName" class="font-bold">Tên đăng nhập</label>
                                <input type="text" id="userName" name="userName" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Tên đăng nhập" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pass" class="font-bold">Mật khẩu</label>
                                <input type="password" id="pass" name="pass" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Mật khẩu" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="maBH" class="font-bold">Mã bảo hiểm</label>
                                <input type="text" name="maBH" id="maBH" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Mã bảo hiểm">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="maHD" class="font-bold">Mã hóa đơn</label>
                                <input type="text" id="maHD" name="maHD" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300" placeholder="Mã hóa đơn">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-6 text-center">
                <span>Đã có tài khoản? </span><a class="text-md text-[#68665b] italic hover:underline" href="../dangNhap/index.php">Đăng nhập</a>
            </div>
            <div class="mt-4 w-full">
                <button type="submit" name="btndk" class="w-full bg-[#1C69F3] py-2 px-auto rounded-lg text-white text-lg opacity-90 hover:opacity-100 transition-all ease">Đăng ký</button>
            </div>
        </div>
    </form>
</body>

</html>