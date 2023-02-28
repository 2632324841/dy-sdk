<?php

namespace Douyin\Model\ThirdpartyServices;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;
use Douyin\Tools\AesEncryptUtil;
use Douyin\Tools\VerifyByteDanceServerUtil;
use Exception;

class Authorization extends Basic
{
    /**
     * 推送 component_ticket
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/componentticket
     * @param array $data 接收的参数
     * @return void
     */
    public function pushComponentTicket(string $token,array $data){
        if(!isset($data['Nonce'])){
            throw new Exception('缺少数据：Nonce');
        }
        if(!isset($data['TimeStamp'])){
            throw new Exception('缺少数据：TimeStamp');
        }
        if(!isset($data['Encrypt'])){
            throw new Exception('缺少数据：Encrypt');
        }
        if(!isset($data['MsgSignature'])){
            throw new Exception('缺少数据：MsgSignature');
        }
        // $VerifyByteDanceServerUtil = new VerifyByteDanceServerUtil($token);
        // $AesEncryptUtil = new AesEncryptUtil();
    }

    /**
     * 获取第三方小程序接口调用凭据
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/componentaccesstoken
     * @param string $component_appid
     * @param string $component_appsecret
     * @param string $component_ticket
     * @return void
     */
    public function getAuthTpToken(string $component_appid, string $component_appsecret, string $component_ticket)
    {
        $api = '/openapi/v1/auth/tp/token';
        $data = [
            'component_appid' => $component_appid,
            'component_appsecret' => $component_appsecret,
            'component_ticket' => $component_ticket,
        ];
        $res = Request::request('GET', $this->config->get('bytedance_url') . $api, [
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 获取预授权码
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/preauthcode
     * @param string $component_appid
     * @param string $component_access_token
     * @return void
     */
    public function getPreAuthCode(string $component_appid, string $component_access_token)
    {
        $api = '/openapi/v2/auth/pre_auth_code';
        $data = [
            'component_appid' => $component_appid,
            'component_access_token' => $component_access_token,
        ];
        $res = Request::request('POST', $this->config->get('bytedance_url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 手动构造授权链接
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/createlink
     * @param string $component_appid
     * @param string $component_access_token
     * @return void
     */
    public function tpAuthorization(string $component_appid, string $pre_auth_code, string $redirect_uri)
    {
        $api = '/mappconsole/tp/authorization';
        $data = [
            'component_appid' => $component_appid,
            'pre_auth_code' => $pre_auth_code,
            'redirect_uri' => $redirect_uri,
        ];
        $res = Request::request('GET', $this->config->get('bytedance_url') . $api, [
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 直接获取授权链接
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/genlink
     * @param string $component_appid
     * @param string $component_access_token
     * @return void
     */
    public function authGenLink(string $component_appid, string $component_access_token)
    {
        $api = '/openapi/v2/auth/gen_link';
        $data = [
            'component_appid' => $component_appid,
            'component_access_token' => $component_access_token,
        ];
        $res = Request::request('GET', $this->config->get('bytedance_url') . $api, [
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 获取授权小程序接口调用凭据
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/authorizeraccesstoken
     * @param string $component_appid
     * @param string $component_access_token
     * @param string $authorization_code
     * @return void
     */
    public function getOauthToken(string $component_appid, string $component_access_token, string $authorization_code)
    {
        $api = '/openapi/v1/oauth/token';
        $data = [
            'component_appid' => $component_appid,
            'component_access_token' => $component_access_token,
            'authorization_code' => $authorization_code,
            'grant_type' => 'app_to_tp_authorization_code',
        ];
        $res = Request::request('GET', $this->config->get('bytedance_url') . $api, [
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 刷新授权小程序接口调用凭据
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/authorizerrefreshtoken
     * @param string $component_appid
     * @param string $component_access_token
     * @param string $authorization_code
     * @return void
     */
    public function refreshOauthToken(string $component_appid, string $component_access_token, string $authorization_code)
    {
        $api = '/openapi/v1/oauth/token';
        $data = [
            'component_appid' => $component_appid,
            'component_access_token' => $component_access_token,
            'authorization_code' => $authorization_code,
            'grant_type' => 'app_to_tp_refresh_token',
        ];
        $res = Request::request('GET', $this->config->get('bytedance_url') . $api, [
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 找回授权码
     *
     * @param string $component_appid
     * @param string $component_access_token
     * @param string $authorization_appid
     * @return void
     */
    public function retrieveAutnCode(string $component_appid, string $component_access_token, string $authorization_appid)
    {
        $api = '/openapi/v1/auth/retrieve';
        $data = [
            'component_appid' => $component_appid,
            'component_access_token' => $component_access_token,
            'authorization_appid' => $authorization_appid,
        ];
        $res = Request::request('POST', $this->config->get('bytedance_url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 获取授权小程序列表
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/authorization/authapplist
     * @param string $component_appid
     * @param string $component_access_token
     * @param integer $page
     * @param integer $size
     * @return void
     */
    public function authAppList(string $component_appid, string $component_access_token, string $page = 1, int $size = 20)
    {
        $api = '/openapi/v1/tp/auth_app_list';
        $data = [
            'component_appid' => $component_appid,
            'component_access_token' => $component_access_token,
            'page' => $page,
            'size' => $size,
        ];
        $res = Request::request('GET', $this->config->get('bytedance_url') . $api, [
            'query' => $data,
        ]);
        return $res;
    }
}
