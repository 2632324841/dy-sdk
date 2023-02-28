<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;
use Douyin\Contracts\Config;

class Login extends Basic
{

    /**
     * 获取到登录凭证
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/log-in/code-2-session
     * @param string $code
     * @param string $anonymous_code
     * @return void
     */
    public function code2Session(string $code = null, string $anonymous_code = null)
    {
        $api = '/api/apps/v2/jscode2session';
        $data = [
            'appid' => $this->config->get('appid'),
            'secret' => $this->config->get('secret'),
        ];
        if (!empty($code)) {
            $data['code'] = $code;
        }
        if (!empty($anonymous_code)) {
            $data['anonymous_code'] = $anonymous_code;
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }
}
