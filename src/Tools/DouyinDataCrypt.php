<?php

namespace Douyin\Tools;

use Exception;

class DouyinDataCrypt
{
    private $appid;
    private $sessionKey;

    /**
     * 构造函数
     * @param $sessionKey string 用户在小程序登录后获取的会话密钥
     * @param $appid string 小程序的appid
     */
    public function __construct($appid, $sessionKey)
    {
        $this->appid = $appid;
        $this->sessionKey = $sessionKey;
    }

    /**
     * 检验数据的真实性，并且获取解密后的明文.
     * @param $encryptedData string 加密的用户数据
     * @param $iv string 与用户数据一同返回的初始向量
     *
     * @return int 成功0，失败返回对应的错误码
     */
    public function decryptData($encryptedData, $iv, $signature = null)
    {
        if (strlen($this->sessionKey) != 24) {
            throw new Exception('密钥长度不等于24', -41001);
        }
        $aesKey = base64_decode($this->sessionKey);
        if (strlen($iv) != 24) {
            throw new Exception('密钥长度不等于iv向量长度不等于24', -41002);
        }
        $aesIV = base64_decode($iv);
        $aesCipher = base64_decode($encryptedData, true);
        $result = openssl_decrypt($aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);
        if (empty($result)) {
            throw new Exception('解密失败,请确定登录后获取数据或参数错误', -41003);
        }
        $data = json_decode($result, true);
        if (!is_array($data)) {
            throw new Exception('数据内容格式不正确', -41003);
        }
        // $res = $data;
        // unset($res['watermark']);
        // unset($res['openId']);
        // unset($res['unionId']);
        // if (!empty($signature) && $signature != sha1(json_encode($res) . $this->sessionKey)) {
        //     var_dump([$signature, sha1((json_encode($res)) . $this->sessionKey)]);
        //     throw new Exception('signature 数据校验错误', -41003);
        // }
        // 兼容新版本无 watermark 的情况
        if (isset($data['watermark']) && isset($data['watermark']['appid']) && $data['watermark']['appid'] != $this->appid) {
            throw new Exception('watermark 数据校验不正确', -41003);
        }
        return $data;
    }
}
