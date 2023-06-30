<?php

namespace App\Utilities;

class VNPay
{
    // 9a1
    // $vnp_TmnCode = "538EOABB";
    // $vnp_HashSecret = "SQWRPGKBCFIOMJRHYVDLMQSCYSEFCEQW";

    // 10a1
    static $vnp_TmnCode = "70A7LNUJ"; //Mã website tại VNPAY
    static $vnp_HashSecret = "ZBBKAASEKWACSDWBWHUVZRMSMKMGXBKC"; //Chuỗi bí mật
    static $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    static $vnp_Returnurl = "http://127.0.0.1:8000/thanh-toan/vnPayCheck"; // url trả về

    public static function vnpay_create_payment(array $data)
    {
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
        /**
         * Description of vnpay_ajax
         *
         * @author xonv
         */

        $vnp_TxnRef = $data['vnp_TxnRef']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $data['vnp_OrderInfo'];
        $vnp_OrderType = 100000;
        $vnp_Amount = $data['vnp_Amount'] * 100;
        $vnp_Locale = 'vn';
        // $vnp_BankCode = $_POST['bank_code'];
        // $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => self::$vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => env('APP_URL') .self::$vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );


        //Thêm 'vnp BankCode
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        //Thêm vnp_HashSecret và vnpSecureHash
        $vnp_Url = self::$vnp_Url . "?" . $query;
        if (isset(self::$vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', self::$vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );

        // echo json_encode($returnData);
        return $returnData['data'];
    }
}
