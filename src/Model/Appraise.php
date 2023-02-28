<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class Appraise extends Basic
{
    
    /**
     * 获取评价数据
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/evolution/obtain-evolution
     * @param array $option
     * @return $res
     */
    public function getAppraise(array $option)
    {
        $api = '/api/comment/open/get';
        $option['appid'] = $this->config->get('appid');
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'body' => $option
        ]);
        return $res;
    }
}