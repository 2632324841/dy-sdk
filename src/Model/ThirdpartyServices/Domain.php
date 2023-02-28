<?php

namespace Douyin\Model\ThirdpartyServices;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;


class Authorization extends Basic
{
    /**
     * 下载域名校验文件
     *
     * @link https://partner.open-douyin.com/docs/resource/zh-CN/thirdparty/API/smallprogram/domain/download
     * @param string $component_appid
     * @param string $component_access_token
     * @return void
     */
    public function downloadWebviewFile(string $component_appid, string $component_access_token)
    {
        $api = '/openapi/v1/tp/download/webview_file';
        $data = [
            'component_appid' => $component_appid,
            'component_access_token' => $component_access_token,
        ];
        $res = Request::request('GET', $this->config->get('bytedance_url') . $api, [
            'query' => $data,
        ]);
        return $res;
    }
}