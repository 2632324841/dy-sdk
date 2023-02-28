<?php

namespace Douyin\Model\GuaranteedPayment;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class CashWithdrawal extends Basic
{
    
    /**
     * 商户余额查询
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/withdraw/query-balance
     * @param array $option
     * @return $res
     */
    public function queryMerchantBalance(array $option)
    {
        $api = '/api/apps/ecpay/saas/query_merchant_balance';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    
    /**
     * 商户提现
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/withdraw/merchant-withdraw
     * @param array option
     * @return $res
     */
    public function merchantWithdraw(array $option)
    {
        $api = '/api/apps/ecpay/saas/merchant_withdraw';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 商户提现结果查询
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/withdraw/query
     * @param array $option
     * @return void
     */
    public function queryWithdrawOrder(array $option)
    {
        $api = '/api/apps/ecpay/saas/query_withdraw_order';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 提现结果回调
     *
     * @param array $data
     * @return void
     */
    public function notify(array $data)
    {
        $msg_signature = $data['msg_signature'];
        $signature = Tools::callbackSign($data, $this->config->get('token'));
        print_r([$msg_signature, Tools::callbackSign($data, $this->config->get('token'))]);
        $data['signature'] = $signature;
        if($msg_signature == $signature){
            $data['data'] = json_decode($data['msg'], true);
            return $data;
        }
        return null;
    }
    
    /**
     * 提现成功回调响应
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/apply/callback
     * @param boolean $isEcho
     * @return array|null
     */
    public function successNotify($isEcho = false)
    {
        $data = ['err_no' => 0, 'err_tips' => 'success'];
        if ($isEcho) {
            header("Content-type:application/json");
            echo json_encode($data);
            return null;
        }
        return $data;
    }

    /**
     * 提现失败回调响应
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/apply/callback
     * @param integer $err_no
     * @param string $err_tips
     * @param boolean $isEcho
     * @return array|null
     */
    public function errorNotify(int $err_no = 500, string $err_tips = 'business fail', bool $isEcho = false)
    {
        $data = ['err_no' => $err_no, 'err_tips' => $err_tips];
        if ($isEcho) {
            header("Content-type:application/json");
            echo json_encode($data);
            return null;
        }
        return $data;
    }
}
