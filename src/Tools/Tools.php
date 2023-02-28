<?php
namespace Douyin\Tools;

class Tools
{
    /**
     * 解密敏感数据
     *
     * @param [type] $encryptedData
     * @param [type] $sessionKey
     * @param [type] $iv
     * @return void
     */
    public static function decryptData($encryptedData, $sessionKey, $iv)
    {
        $aesIV = base64_decode($iv);
        $aesCipher = base64_decode($encryptedData, true);
        $result = openssl_decrypt($aesCipher, "AES-128-CBC", $sessionKey, OPENSSL_RAW_DATA, $aesIV);
        $data = json_decode($result, true);
        if(is_array($data)){
            return $data;
        }
        return null;
    }

    /**
     * 回调验签
     *
     * @param [type] $map
     * @param string $token
     * @return void
     */
    public static function callbackSign($map, $token = ''){
        $rList = [];
        foreach ($map as $k => $v) {
            if ($k == "msg_signature")
                continue;
            $value = trim(strval($v));
            if (is_array($v)) {
                $value = self::arrayToStr($v);
            }

            $len = strlen($value);
            if ($len > 1 && substr($value, 0, 1) == "\"" && substr($value, $len, $len - 1) == "\"")
                $value = substr($value, 1, $len - 1);
            $value = trim($value);
            if ($value == "" || $value == "null")
                continue;
            $rList[] = $value;
        }
        $result[] = $token;
        sort($rList, SORT_STRING);
        return sha1(implode('', $map));
    }

    /**
     * 请求签名
     *
     * @param [type] $map
     * @param string $payment_salt
     * @return void
     */
    public static function sign($map, $payment_salt = '')
    {
        $rList = [];
        foreach ($map as $k => $v) {
            if ($k == "other_settle_params" || $k == "app_id" || $k == "sign" || $k == "thirdparty_id")
                continue;
            $value = trim(strval($v));
            if (is_array($v)) {
                $value = self::arrayToStr($v);
            }

            $len = strlen($value);
            if ($len > 1 && substr($value, 0, 1) == "\"" && substr($value, $len, $len - 1) == "\"")
                $value = substr($value, 1, $len - 1);
            $value = trim($value);
            if ($value == "" || $value == "null")
                continue;
            $rList[] = $value;
        }
        $rList[] = $payment_salt;
        sort($rList, SORT_STRING);
        return md5(implode('&', $rList));
    }

    public static function arrayToStr($map)
    {
        $isMap = self::isArrMap($map);

        $result = "";
        if ($isMap) {
            $result = "map[";
        }

        $keyArr = array_keys($map);
        if ($isMap) {
            sort($keyArr);
        }

        $paramsArr = array();
        foreach ($keyArr as  $k) {
            $v = $map[$k];
            if ($isMap) {
                if (is_array($v)) {
                    $paramsArr[] = sprintf("%s:%s", $k, self::arrayToStr($v));
                } else {
                    $paramsArr[] = sprintf("%s:%s", $k, trim(strval($v)));
                }
            } else {
                if (is_array($v)) {
                    $paramsArr[] = self::arrayToStr($v);
                } else {
                    $paramsArr[] = trim(strval($v));
                }
            }
        }

        $result = sprintf("%s%s", $result, join(" ", $paramsArr));
        $result = sprintf("[%s]", $result);

        return $result;
    }

    public static function isArrMap($map)
    {
        foreach ($map as $k => $v) {
            if (is_string($k)) {
                return true;
            }
        }
        return false;
    }

    /**
     * 开放平台验签
     *
     * @param [type] $method
     * @param [type] $url
     * @param [type] $body
     * @param [type] $timestamp
     * @param [type] $nonce_str
     * @return void
     */
    public static function makeSign($method, $url, $body, $timestamp, $nonce_str) {
        $text = $method . "\n" . $url . "\n" . $timestamp . "\n" . $nonce_str . "\n" . $body . "\n";
        $priKey = file_get_contents("/private_key.pem");
        $privateKey = openssl_get_privatekey($priKey, '');
        openssl_sign($text, $sign, $privateKey, OPENSSL_ALGO_SHA256);
        $sign = base64_encode($sign);
        return $sign;
    }

    /**
     * 产生随机字符串
     * @param int $length 指定字符长度
     * @param string $str 字符串前缀
     * @return string
     */
    public static function createNoncestr($length = 32, $str = "")
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }
}
