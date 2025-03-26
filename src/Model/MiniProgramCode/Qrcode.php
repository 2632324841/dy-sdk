<?php

namespace Douyin\Model\MiniProgramCode;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class Qrcode extends Basic
{

    /**
     * 生成SchemaV2
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/url-and-qrcode/schema/generate-schema-v2
     * @return void
     */
    public function generate_schema(array $option)
    {
        $api = '/api/apps/v1/url/generate_schema/';
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
