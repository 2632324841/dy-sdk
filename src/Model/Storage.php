<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class Storage extends Basic
{
    /**
     * 设置用户缓存（小程序云服务存储）
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-caching/set-user-storage
     * @param string $openid
     * @param string $signature
     * @param string $sig_method
     * @param array $kv_list
     * @return void
     */
    public function setUserStorage(string $openid, string $session_key, array $kv_list)
    {
        $api = '/api/apps/set_user_storage';
        $data = [
            'access_token'=>$this->getAccessToken(),
            'openid'=>$openid,
            'kv_list'=>$kv_list,
            'sig_method'=>'hmac_sha256',
        ];
        $data['signature'] = hash_hmac('sha256', json_encode($data), $session_key);
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 删除用户缓存（小程序云服务存储）
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-caching/remove-user-storage
     * @param string $openid
     * @param string $signature
     * @param string $sig_method
     * @param array $key
     * @return void
     */
    public function removeUserStorage(string $openid, string $session_key,  array $key)
    {
        $api = '/api/apps/v2/token';
        $data = [
            'access_token'=>$this->getAccessToken(),
            'openid'=>$openid,
            'key'=>$key,
            'sig_method'=>'hmac_sha256',
        ];
        $data['signature'] = hash_hmac('sha256', json_encode($data), $session_key);
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }
}
