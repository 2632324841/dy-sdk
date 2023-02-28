<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class ServiceCategory extends Basic
{

    /**
     * 获取已设置的服务类目
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/category/query-app-categories
     * @return void
     */
    public function query_app_categories()
    {
        $api = '/api/apps/v1/category/query_app_categories';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
        ]);
        return $res;
    }
}
