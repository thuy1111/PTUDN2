<?php
    include_once("connect.php");
    class mGiaoDich{
        public function luuGiaoDichThanhToan($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash) {
            $p = new clsKetNoi();
            $conn = $p->moketnoi();
            if ($conn) {
                // Sử dụng prepared statement để tránh SQL Injection
                $stmt = $conn->prepare(
                    "INSERT INTO vnpay (vnp_Amount, vnp_BankCode, vnp_BankTranNo, vnp_CardType, vnp_OrderInfo, vnp_PayDate, vnp_ResponseCode, vnp_TmnCode, vnp_TransactionNo, vnp_TransactionStatus, vnp_TxnRef, vnp_SecureHash) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
                );
        
                if ($stmt) {
                    // Gắn các tham số vào câu lệnh
                    $stmt->bind_param("isssssssssss", $vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash);
        
                    // Thực thi câu lệnh
                    $result = $stmt->execute();
        
                    // Kiểm tra kết quả
                    if ($result) {
                        $stmt->close();
                        $p->dongketnoi($conn);
                        return true; // Chèn thành công
                    } else {
                        // Hiển thị lỗi nếu không thực thi được
                        echo "Lỗi thực thi: " . $stmt->error;
                        $stmt->close();
                        $p->dongketnoi($conn);
                        return false;
                    }
                } else {
                    // Báo lỗi nếu không chuẩn bị được câu lệnh
                    echo "Lỗi chuẩn bị câu lệnh: " . $conn->error;
                    $p->dongketnoi($conn);
                    return false;
                }
            } else {
                echo "Không thể kết nối đến cơ sở dữ liệu.";
                return false;
            }
        }
        
    }
?>