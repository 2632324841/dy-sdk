<?php

namespace Douyin\Model\MiniProgramCode;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class Link extends Basic
{

    /**
     * 生成 Link V2
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/url-and-qrcode/link/url-link-generate
     * @return void
     */
    public function generate(array $option)
    {
        $api = '/api/apps/v1/url_link/generate/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 查询 Link 配额V2
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/url-and-qrcode/link/url-link-query-quota-v2
     * @return void
     */
    public function query_quota(array $option)
    {
        $api = '/api/apps/v1/url_link/query_quota/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 查询 Link V2
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/url-and-qrcode/link/url-link-query-v2
     * @return void
     */
    public function query_schema_quota(array $option)
    {
        $api = '/api/apps/v1/url_link/query_info/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }
}
