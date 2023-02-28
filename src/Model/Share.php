<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class Share extends Basic
{

    /**
     * 生成能够直接跳转到端内小程序的 url link。
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/share/url-link-generate
     * @param string $app_name
     * @param string $path
     * @param integer $expire_time
     * @param array $query
     * @return void
     */
    public function generate(string $app_name = 'douyin', int $expire_time, string $path = 'pages/index', array $query = [])
    {
        $api = '/api/apps/url_link/generate';
        $data = [
            'ma_app_id' => $this->config->get('appid'),
            'access_token' => $this->getAccessToken(),
            'app_name' => $app_name,
            'path' => $path,
            'expire_time' => $expire_time,
        ];
        if (!empty($query) && is_array($query) && count($query) > 0) {
            $data['query'] = json_encode($query);
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 查询已经生成的 link 的信息
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/share/url-link-query
     * @param string $url_link
     * @return void
     */
    public function queryInfo(string $url_link)
    {
        $ma_app_id = '';
        $access_token = '';
        $api = '/api/apps/url_link/query_info';
        $data = [
            'ma_app_id' => $ma_app_id,
            'access_token' => $access_token,
        ];
        if (!empty($url_link)) {
            $data['url_link'] = $url_link;
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 查询当前小程序生成 url link 链接的配额
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/share/url-link-query-quota
     * @return void
     */
    public function queryQuota()
    {
        $api = '/api/apps/url_link/query_quota';
        $data = [
            'ma_app_id' => $this->config->get('appid'),
            'access_token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }
}
