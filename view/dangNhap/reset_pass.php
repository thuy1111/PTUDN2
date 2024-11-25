<?php
error_reporting(1);

if (isset($_POST["reset"])) {
    $code = $_GET["code"];
    $newPass = $_POST["newPass"];
    $confirmPass = $_POST["confirmPass"];

    if ($newPass === $confirmPass) {
        include_once("../../controller/cCustomer.php");
        $ctrl = new cCustomer();

        if ($ctrl->cVerifyRecoveryCode($code)) {
            $hashedPass = $newPass;
            $ctrl->cUpdatePassword($code, $hashedPass);
            echo "<script>alert('Mật khẩu đã được đặt lại');</script>";
        } else {
            echo "<script>alert('Mã khôi phục không hợp lệ');</script>";
        }
    } else {
        echo "<script>alert('Mật khẩu xác nhận không khớp');</script>";
    }
}


?>
<title>Đặt lại mật khẩu</title>
<link rel="shortcut icon" href="../../assets/images/logo/hospital.png" type="image/x-icon">
<script src="https://cdn.tailwindcss.com"></script>

<div class="w-screen h-screen flex justify-center items-center">
    <form action="" method="POST" class="w-2/6 h-fit bg-white border-gray-300 px-8 py-auto border rounded-lg shadow-md">
        <h2 class="font-bold text-3xl mb-8 pt-8 text-center text-[#f37c7c]">Đặt lại mật khẩu</h2>
        <div class="pb-8">
            <label for="newPass" class="font-bold">Mật khẩu mới:</label>
            <input type="password" id="newPass" name="newPass" required class="w-full px-4 py-2 mb-3 border bg-blue-100 outline-blue-300 rounded-md">
            <label for="confirmPass" class="font-bold">Xác nhận mật khẩu:</label>
            <input type="password" id="confirmPass" name="confirmPass" required class="w-full px-4 py-2 mb-4 border bg-blue-100 outline-blue-300 rounded-md">
            <input type="hidden" name="code" value="<?php echo $_GET["code"]; ?>">
            <button type="submit" name="reset" class="bg-[#f37c7c] text-white px-4 py-2 mt-4 w-full rounded-md">Đặt lại mật khẩu</button>
        </div>
    </form>
</div>