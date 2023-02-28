<?php

namespace Douyin\Model\GuaranteedPayment;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class Payment extends Basic
{
    /**
     * 预下单接口
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/pay-list/pay
     * @param array $option
     * @return $res
     */
    public function payment(array $option = [])
    {
        $api = '/api/apps/ecpay/v1/create_order';
        $option['app_id'] = $this->config->get('appid');
        $sign = Tools::sign($option, $this->config->get('payment_salt'));
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }


    /**
     * 支付结果查询
     *  
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/pay-list/query
     * @param string $out_order_no
     * @param string|null $thirdparty_id
     * @return $res
     */
    public function queryOrder(string $out_order_no, string $thirdparty_id = null)
    {
        $api = '/api/apps/ecpay/v1/create_order';
        $data = [
            'app_id' => $this->config->get('appid'),
            'out_order_no' => $out_order_no,
        ];
        if (!empty($thirdparty_id)) {
            $data['thirdparty_id'] = $thirdparty_id;
        }
        $sign = Tools::sign($data, $this->config->get('payment_salt'));
        $data['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 支付回调
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
     * 支付成功成功响应
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/pay-list/callback
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
     * 支付回调失败响应
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/pay-list/callback
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
