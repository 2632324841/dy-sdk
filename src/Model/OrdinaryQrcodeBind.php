<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;
use Douyin\Contracts\Config;

class OrdinaryQrcodeBind extends Basic
{

    /**
     * 查询普通二维码绑定列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/simple-qr-code/query-simple-qr-bind-list
     * @param integer $page_num
     * @param integer $page_size
     * @return void
     */
    public function querySimpleQrBindList(int $page_num = 1, int $page_size = 20)
    {
        $api = '/api/apps/v1/capacity/query_simple_qr_bind_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'page_num' => $page_num,
            'page_size' => $page_size,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data
        ]);
        return $res;
    }

    /**
     * 新增绑定二维码
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/simple-qr-code/add-simple-qr-bind
     * @param string $qr_url
     * @param string $load_path
     * @param string $stage
     * @param integer $exclusive_qr_url_prefix
     * @return void
     */
    public function addSimpleQrBind(string $qr_url, string $load_path, string $stage = 'online', string $exclusive_qr_url_prefix = 0)
    {
        $api = '/api/apps/v1/capacity/add_simple_qr_bind';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'qr_url' => $qr_url,
            'load_path' => $load_path,
            'stage' => $stage,
            'exclusive_qr_url_prefix' => $exclusive_qr_url_prefix,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 更新绑定二维码链接
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/simple-qr-code/update-simple-qr-bind
     * @param string $before_qr_url
     * @param string $qr_url
     * @param string $load_path
     * @param string $stage
     * @param integer $exclusive_qr_url_prefix
     * @return void
     */
    public function updateSimpleQrBind(string $before_qr_url, string $qr_url, string $load_path, string $stage = 'online', string $exclusive_qr_url_prefix = 0)
    {
        $api = '/api/apps/v1/capacity/update_simple_qr_bind';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'before_qr_url' => $before_qr_url,
            'qr_url' => $qr_url,
            'load_path' => $load_path,
            'stage' => $stage,
            'exclusive_qr_url_prefix' => $exclusive_qr_url_prefix,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 更新绑定二维码状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/simple-qr-code/update-simple-qr-bind-status
     * @param string $qr_url
     * @param integer $status
     * @return void
     */
    public function updateSimpleQrBindStatus(string $qr_url, int $status = 1)
    {
        $api = '/api/apps/v1/capacity/update_simple_qr_bind_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'qr_url' => $qr_url,
            'status' => $status,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 删除绑定二维码链接
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/simple-qr-code/delete-simple-qr-bind
     * @param string $qr_url
     * @return void
     */
    public function deleteSimpleQrBind(string $qr_url)
    {
        $api = '/api/apps/v1/capacity/delete_simple_qr_bind';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'qr_url' => $qr_url,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data
        ]);
        return $res;
    }
}
