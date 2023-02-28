<?php

namespace Douyin\Model\GuaranteedPayment;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class AccountStatement extends Basic
{
    
    /**
     * 获取交易账单
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/bills/bill
     * @param array $option
     * @return $res
     */
    public function getBills(array $option)
    {
        $api = '/api/apps/bills';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 获取资金账单
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/bills/fundbill
     * @param array $option
     * @return $res
     */
    public function getFundBills(array $option)
    {
        $api = '/api/apps/fund/bills';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }
}