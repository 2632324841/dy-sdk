<?php

namespace Douyin\Model\MiniProgramCode;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class Schema extends Basic
{

    /**
     * 生成QRCodeV2
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/url-and-qrcode/qrcode/create-qr-code-v2
     * @return void
     */
    public function generate_schema(array $option)
    {
        $api = '/api/apps/v1/qrcode/create/';
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
     * 查询SchemaV2
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/url-and-qrcode/schema/query-schema-v2
     * @return void
     */
    public function query_schema(array $option)
    {
        $api = '/api/apps/v1/url/query_schema/';
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
     * 查询Schema配额V2
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/url-and-qrcode/schema/query-schema-quota-v2
     * @return void
     */
    public function query_schema_quota(array $option)
    {
        $api = '/api/apps/v1/url/query_schema_quota/';
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
