<?php
    include_once("../../model/mGiaoDichTT.php");
    class cGiaoDich {
        public function luuGiaoDichThanhToan($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash)
        {
            $p = new mGiaoDich();
            $result = $p->luuGiaoDichThanhToan($vnp_Amount, $vnp_BankCode, $vnp_BankTranNo, $vnp_CardType, $vnp_OrderInfo, $vnp_PayDate, $vnp_ResponseCode, $vnp_TmnCode, $vnp_TransactionNo, $vnp_TransactionStatus, $vnp_TxnRef, $vnp_SecureHash);
            if ($result) {
                return $result;
            } else {
                return false;
            }
        }
    }

?>