<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class PageStructureCustomization extends Basic
{

    /**
     * 查询页面结构自定义能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/page-layout-custom/query-capacity-status
     * @param array $data
     * @return void
     */
    public function queryApplyStatus(string $capacity_key)
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => $capacity_key
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data
        ]);
        return $res;
    }

    /**
     * 申请页面结构自定义能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/page-layout-custom/apply-capacity
     * @param array $option
     * @return void
     */
    public function applyCapacity(array $option)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }
}
