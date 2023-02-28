<?php

namespace Douyin\Model\GuaranteedPayment;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class Chargeback extends Basic
{

    /**
     * 发起退分账
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/return-settle/ReturnSettle
     * @param array $option
     * @return $res
     */
    public function createReturn(array $option)
    {
        $api = '/api/apps/ecpay/v1/create_return';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 查询分账回退结果
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/return-settle/query
     * @param array $option
     * @return $res
     */
    public function queryReturn(array $option)
    {
        $api = '/api/apps/ecpay/v1/query_return';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }
}
