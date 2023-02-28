<?php

namespace Douyin\Contracts;

use Douyin\Model\AccessToken;
use Douyin\Model\Qrcode;
use Douyin\Model\Login;
use Douyin\Model\Storage;
use Douyin\Model\Share;
use Douyin\Model\CustomerService;
use Douyin\Model\ContentSecurity;

class Xcx extends Basic
{
    /**
     * 获取凭证
     *
     * @return void
     */
    public function getAccessToken()
    {
        $AccessToken = AccessToken::instance($this->config->get());
        return $AccessToken->getAccessToken();
    }

    /**
     * 登录
     *
     * @param string|null $code
     * @param string|null $anonymous_code
     * @return void
     */
    public function login(string $code = null, string $anonymous_code = null)
    {
        $Login = Login::instance($this->config->get());
        return $Login->code2Session($code, $anonymous_code);
    }

    /**
     * 创建二维码
     *
     * @param array $data
     * @return void
     */
    public function createQRCode(array $data)
    {
        $Qrcode = Qrcode::instance($this->config->get());
        return $Qrcode->createQRCode($data);
    }

    /**
     * 设置用户缓存
     *
     * @param array $data
     * @return void
     */
    public function setUserStorage(string $openid, string $session_key, array $kv_list)
    {
        $Storage = Storage::instance($this->config->get());
        return $Storage->setUserStorage($openid, $session_key, $kv_list);
    }

    /**
     * 设置用户缓存
     *
     * @param array $data
     * @return void
     */
    public function removeUserStorage(string $openid, string $session_key,  array $key)
    {
        $Storage = Storage::instance($this->config->get());
        return $Storage->removeUserStorage($openid, $session_key, $key);
    }

    /**
     * 生成能够直接跳转到端内小程序的 url link。
     *
     * @param string $app_name
     * @param integer $expire_time
     * @param string $path
     * @param array $query
     * @return void
     */
    public function generateLink(string $app_name = 'douyin', int $expire_time, string $path = 'pages/index', array $query = [])
    {
        $Share = Share::instance($this->config->get());
        return $Share->generate($app_name, $expire_time, $path, $query);
    }
    /**
     * 查询已经生成的 link 的信息
     *
     * @param string $url_link
     * @return void
     */
    public function queryLinkInfo(string $url_link)
    {
        $Share = Share::instance($this->config->get());
        return $Share->queryInfo($url_link);
    }

    /**
     * 查询当前小程序生成 url link 链接的配额
     *
     * @return void
     */
    public function queryLinkQuota()
    {
        $Share = Share::instance($this->config->get());
        return $Share->queryQuota();
    }

    /**
     * 客服
     *
     * @param string $openid
     * @param integer $type
     * @param integer $scene
     * @param string|null $order_id
     * @param string|null $im_type
     * @return void
     */
    public function customerServiceUrl(string $openid, int $type = 1128, int $scene = 1,string $order_id = null, string $im_type = null)
    {
        $CustomerService = CustomerService::instance($this->config->get());
        return $CustomerService->customerServiceUrl($openid, $type, $scene, $order_id, $im_type);
    }

    /**
     * 内容安全检测
     *
     * @param array $data
     * @return void
     */
    public function textCensor(array $data)
    {
        $ContentSecurity = ContentSecurity::instance($this->config->get());
        return $ContentSecurity->textCensor($data);
    }

    /**
     * 图片检测
     *
     * @param array $data
     * @return void
     */
    public function imageCensor(array $data)
    {
        $ContentSecurity = ContentSecurity::instance($this->config->get());
        return $ContentSecurity->imageCensor($data);
    }

    /**
     * 图片检测 V2
     *
     * @param array $data
     * @return void
     */
    public function imageCensorV2(array $data)
    {
        $ContentSecurity = ContentSecurity::instance($this->config->get());
        return $ContentSecurity->imageCensorV2($data);
    }
}
