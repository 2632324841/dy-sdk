<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class GuideAttentionAccount extends Basic
{
    /**
     * 绑定抖音号
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/follow-aweme/bind-aweme-user
     * @param string $alias
     * @return void
     */
    public function bindAwemeUser(string $type, string $aweme_id)
    {
        $api = '/api/apps/v1/capacity/bind_aweme_user';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'type' => $type,
            'aweme_id' => $aweme_id,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 获取抖音号绑定二维码
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/follow-aweme/get-aweme-user-bind-qrcode
     * @param string $type
     * @return void
     */
    public function getAwemeUserBindQrcode(string $type)
    {
        $api = '/api/apps/v1/capacity/query_aweme_user_bind_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'type' => $type,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 获取绑定抖音号列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/follow-aweme/query-aweme-user-bind-list
     * @param string $type
     * @param integer $page_num
     * @param integer $page_size
     * @return void
     */
    public function queryAwemeUserBindList(string $type, int $page_num = 1, int $page_size = 20)
    {
        $api = '/api/apps/v1/capacity/query_aweme_user_bind_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'type' => $type,
            'page_num' => $page_num,
            'page_size' => $page_size,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 解除抖音号绑定
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/follow-aweme/unbind-aweme-user
     * @param string $type
     * @param string $aweme_id
     * @return void
     */
    public function unbindAwemeUserBind(string $type, string $aweme_id)
    {
        $api = '/api/apps/v1/capacity/unbind_aweme_user_bind';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'type' => $type,
            'aweme_id' => $aweme_id,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }
}
