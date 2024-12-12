<?php    
session_start();
class cThanhToanOnline {
    public function thanhToanOnline() {
        if (isset($_POST['redirect'])) {
            $maLichKham = $_POST['maLK'];
            $tienKham = $_POST['total']; 

            // Cấu hình cổng thanh toán VNPAY
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            //$vnp_Returnurl = "http://localhost/PTUDN2/view/benhNhan/xemlichkham.php";
            $vnp_Returnurl = "http://localhost/PTUDN2/view/benhNhan/thongbao.php";
            $vnp_TmnCode = "GBX04TR9"; // Mã website tại VNPAY
            $vnp_HashSecret = "Y12QOFH6162LGBD3LZ7OXFTUYW9VKTYJ"; // Chuỗi bí mật
            
            // Mã đơn hàng ngẫu nhiên (đảm bảo tính duy nhất)
            $vnp_TxnRef = $maLichKham;
            $vnp_OrderInfo = "Thanh toán lịch khám";
            $vnp_OrderType = "billpayment";

            // Số tiền (đơn vị VND, nhân 100 theo yêu cầu của VNPAY)
            $vnp_Amount = (int)$tienKham * 100; 

            $vnp_Locale = "vn"; // Ngôn ngữ
            $vnp_BankCode = "NCB"; // Mã ngân hàng (có thể để trống nếu không chọn ngân hàng)
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; // Lấy địa chỉ IP của người dùng

            // Tạo mảng dữ liệu gửi đến VNPAY
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            // Sắp xếp các tham số theo thứ tự từ a-z để chuẩn bị tạo chuỗi hash
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
            
            // Tạo URL cổng thanh toán VNPAY
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); // Tạo mã bảo mật SHA512
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }

            // Trả về dữ liệu
            $returnData = array('code' => '00', 'message' => 'success', 'data' => $vnp_Url);
            
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
    }

}

// Khởi tạo lớp và gọi phương thức
$cThanhToanOnline = new cThanhToanOnline();
$cThanhToanOnline->thanhToanOnline();



?>
