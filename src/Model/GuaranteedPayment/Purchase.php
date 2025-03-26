<?php

namespace Douyin\Model\GuaranteedPayment;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class Purchase extends Basic
{
    /**
     * 发起进件请求
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/apply/create
     * @param array $option
     * @return $res
     */
    public function createMerchant(array $option = [])
    {
        $api = '/api/apps/ecpay/saas/create_merchant';
        $option['access_token'] = $this->getAccessToken();
        $option['appid'] = $this->config->get('appid');
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    
    /**
     * 图片上传接口
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/apply/image-upload
     * @param [type] $image_content
     * @param [type] $image_type
     * @param [type] $thirdparty_id
     * @param [type] $component_access_token
     * @return void
     */
    public function imageUpload($image_content, $image_type, $thirdparty_id = null, $component_access_token = null)
    {
        $api = '/api/apps/ecpay/saas/image_upload';
        $data['access_token'] = $this->getAccessToken();
        $data['appid'] = $this->config->get('appi');
        $data['image_content'] = $image_content;
        $data['image_type'] = $image_type;
        if (!empty($thirdparty_id)) {
            $data['thirdparty_id'] = $thirdparty_id;
        }
        if (!empty($component_access_token)) {
            $data['component_access_token'] = $component_access_token;
        }
        $new_data = [];
        foreach($data as $key=>$val){
            $new_data[] = [
                'name'=>$key,
                'contents'=>$val,
            ];
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'multipart' => $new_data
        ]);
        return $res;
    }

    /**
     * 进件状态查询
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/apply/query
     * @param [type] $merchant_id
     * @param [type] $thirdparty_id
     * @param [type] $sub_merchant_id
     * @return void
     */
    public function queryMerchantstatus($merchant_id, $thirdparty_id = null, $sub_merchant_id = null)
    {
        $api = '/api/apps/ecpay/saas/query_merchant_status';
        $data['access_token'] = $this->getAccessToken();
        $data['appid'] = $this->config->get('appid');
        $data['image_content'] = $thirdparty_id;
        $data['image_type'] = $merchant_id;
        if (!empty($thirdparty_id)) {
            $data['thirdparty_id'] = $thirdparty_id;
        }
        if (!empty($sub_merchant_id)) {
            $data['sub_merchant_id'] = $sub_merchant_id;
        }
        $data = Tools::sign($data, $this->config->get('payment_salt'));
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 进件结果回调
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
     * 进件回调成功响应
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
     * 进件回调失败响应
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
