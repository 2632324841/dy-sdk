<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

use function PHPSTORM_META\map;

class ContentSecurity extends Basic
{
    /**
     * 内容安全检测
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/content-security/content-security-detect
     * @param array $option
     * @return $res
     */
    public function textCensor(array $data = [])
    {
        $api = '/api/v2/tags/text/antidirt';
        $headers = [
            'X-Token' => $this->getAccessToken()
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 图片检测
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/content-security/picture-detect
     * @param array $data
     * @return void
     */
    public function imageCensor(array $data = [])
    {
        $api = '/api/v2/tags/image/';
        $headers = [
            'X-Token' => $this->getAccessToken()
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 图片检测 V2
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/content-security/picture-detect-v2
     * @param array $data
     * @return void
     */
    public function imageCensorV2(array $data = [])
    {
        $api = '/api/apps/censor/image';
        $data['app_id'] = $this->config->get('appid');
        $data['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }
}
