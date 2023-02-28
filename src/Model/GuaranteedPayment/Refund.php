<?php
namespace Douyin\Model\GuaranteedPayment;
use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class Refund extends Basic{

    /**
     * 发起退款
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/refund-list/refund
     * @param array $option
     * @return $res
     */
    public function createRefund(array $option){
        $api = '/api/apps/ecpay/v1/create_order';
        $option['appid'] = $this->config->get('appid');
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 退款结果查询
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/refund-list/query
     * @param string $out_refund_no
     * @param string|null $thirdparty_id
     * @return void
     */
    public function queryRefund(string $out_refund_no,string $thirdparty_id = null){
        $api = '/api/apps/ecpay/v1/query_refund';
        $option['appid'] = $this->config->get('appid');
        $option['out_refund_no'] = $out_refund_no;
        if(!empty($thirdparty_id)){
            $option['thirdparty_id'] = $thirdparty_id;
        }
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 订单退款结果回调
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
     * 退款成功回调响应
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/refund-list/callback
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
     * 退款失败回调响应
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/refund-list/callback
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