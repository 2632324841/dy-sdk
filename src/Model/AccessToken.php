<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;
use Douyin\Tools\Cache;
use Douyin\Contracts\Config;

class AccessToken extends Basic
{
    /**
     * 获取小程序的全局唯一调用凭据
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/interface-request-credential/get-access-token
     * @return string
     */
    public function getAccessToken()
    {
        $api = '/api/apps/v2/token';
        $Cache = new Cache($this->config->get('cache_type'), $this->config->get('cache_path'));
        $access_token = $Cache->get('access_token');
        if (!empty($access_token) || $access_token !== false) {
            return $access_token;
        }
        $data = [
            'appid' => $this->config->get('appid'),
            'secret' => $this->config->get('secret'),
            'grant_type' => 'client_credential',
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        if (isset($res['data']['access_token']) && !empty($res['data']['access_token'])) {
            $Cache->set('access_token', $res['data']['access_token'], 7000);
        }
        return $res['data']['access_token'];
    }
}
