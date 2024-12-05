<?php    
class cThanhToanOnline {
    public function thanhToanOnline() {
        if (isset($_POST['redirect'])) {
            // Cấu hình cổng thanh toán VNPAY
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/PTUDN2/index.php";
            $vnp_TmnCode = "GBX04TR9"; // Mã website tại VNPAY
            $vnp_HashSecret = "Y12QOFH6162LGBD3LZ7OXFTUYW9VKTYJ"; // Chuỗi bí mật
            
            $vnp_TxnRef = rand(1000, 9999); // Mã đơn hàng ngẫu nhiên
            $vnp_OrderInfo = "Thanh toan lich kham";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = 100000 * 100; // Số tiền (đơn vị VND, nhân 100 theo yêu cầu VNPAY)
            $vnp_Locale = "vn"; // Ngôn ngữ
            $vnp_BankCode = "NCB"; // Có thể để trống nếu không chọn ngân hàng
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

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

            //var_dump($inputData);
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
            
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
                // vui lòng tham khảo thêm tại code demo
            
        }
    }
}


// Khởi tạo lớp và gọi phương thức
$cThanhToanOnline = new cThanhToanOnline();
$cThanhToanOnline->thanhToanOnline();
?>


