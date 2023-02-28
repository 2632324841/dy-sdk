<?php

namespace Douyin\Model\GuaranteedPayment;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class OrderPush extends Basic
{
    
    /**
     * 订单同步
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/order/order-sync
     * @param array $option
     * @return $res
     */
    public function orderSync(array $option)
    {
        $api = '/api/apps/order/v2/push';
        $sign = Tools::sign($option, $this->config->get('payment_salt'));
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }
}