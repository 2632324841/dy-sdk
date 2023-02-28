<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class CustomerService extends Basic
{
    /**
     * 客服
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/im/customer-service-url
     * @param string $openid
     * @param integer $type
     * @param integer $scene
     * @param string|null $order_id
     * @param string|null $im_type
     * @return void
     */
    public function customerServiceUrl(string $openid, int $type = 1128, int $scene = 1,string $order_id = null, string $im_type = null)
    {
        $api = '/api/apps/chat/customer_service_url';
        $headers = [
            'Access-Token' => $this->getAccessToken(),
        ];
        $data = [
            'appid' => $this->config->get('appid'),
            'openid' => $openid,
            'type' => $type,
            'scene' => $scene,
        ];
        if (!empty($order_id)) {
            $data['order_id'] = $order_id;
        }
        if (!empty($im_type)) {
            $data['im_type'] = $im_type;
        }
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }
}
