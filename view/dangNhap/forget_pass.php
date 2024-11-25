<title>Quên mật khẩu</title>
<link rel="shortcut icon" href="../../assets/images/logo/hospital.png" type="image/x-icon">
<script src="https://cdn.tailwindcss.com"></script>

<?php
    error_reporting(1);
    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if (isset($_POST["submit"])) {
        $email = $_POST["email"];
        
        include_once("../../controller/cCustomer.php");
        $ctrl = new cCustomer();
        $customer = $ctrl->cGetCustomerByEmail($email);
        $row = $customer->fetch_assoc();
        
        if ($customer) {
            $recoveryCode = bin2hex(random_bytes(16));
    
            $ctrl->cSaveRecoveryCode($email, $recoveryCode);
    
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = "nmsangtg26@gmail.com";
                $mail->Password = "pvxf nuqs snre epso";
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
    
                $mail->setFrom("nmsangtg26@gmail.com", mb_encode_mimeheader("Hospital", "UTF-8", "B"));
                $mail->addAddress($email, $row["hoTen"]);
    
                $mail->isHTML(true);
                $mail->Subject = mb_encode_mimeheader("Khôi phục mật khẩu", "UTF-8", "B");
                $mail->Body    = "Xin chào {$row["hoTen"]},<br><br>
                                  Nhấn vào đường dẫn sau để khôi phục mật khẩu của bạn:<br>
                                  <a href='localhost/PTUDN2/view/dangNhap/reset_pass.php?code=$recoveryCode'>Khôi phục mật khẩu</a><br><br>
                                  Nếu bạn không yêu cầu điều này, vui lòng bỏ qua email này.<br><br>
                                  Trân trọng,<br>
                                  Đội ngũ hỗ trợ.";
    
                $mail->send();
                echo "<script>alert('Email khôi phục mật khẩu đã được gửi đi. Vui lòng kiểm tra email của bạn!');</script>";
            } catch (Exception $e) {
                echo "Lỗi khi gửi email: {$mail->ErrorInfo}";
            }
        } else {
            echo "<script>alert('Email không tồn tại trong hệ thống!');</script>";
        }
    }
    
?>

<div class="w-screen h-screen flex justify-center items-center">
    <form action="" method="POST" class="w-2/6 h-1/3 bg-white border-gray-300 px-8 py-auto border rounded-lg shadow-md">
        <h2 class="font-bold text-3xl mb-8 mt-3 text-center text-[#f37c7c]">Quên mật khẩu</h2>
        <div class="">
            <label for="email" class="font-bold">Nhập email đã đăng ký</label>
            <input type="email" id="email" name="email" class="w-full mt-2 px-4 py-2 bg-blue-100 border border-gray-300 rounded-md outline-blue-300 mb-4" placeholder="Email của bạn">
            <button type="submit" name="submit" class="w-full bg-[#f37c7c] mt-2 py-2 px-auto rounded-lg text-white text-lg opacity-90 hover:opacity-100 transition-all ease">Xác nhận</button>
        </div>
    </form>
</div>