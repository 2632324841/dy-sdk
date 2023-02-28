<?php

namespace Douyin\Model\GuaranteedPayment\InterfaceGetPageLink;

use Douyin\Tools\Request;
use Douyin\Tools\Tools;
use Douyin\Contracts\Basic;

class Purchase extends Basic
{
    /**
     * 开发者获取小程序收款商户/合作方进件页面
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/page-links/apply/in
     * @param array $option
     * @return void
     */
    public function appAddSubMerchant(array $option)
    {
        $api = '/api/apps/ecpay/saas/app_add_sub_merchant';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 服务商获取小程序收款商户进件页面
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/page-links/apply/app-merchant
     * @param array $option
     * @return void
     */
    public function getAppMerchant(array $option)
    {
        $api = '/api/apps/ecpay/saas/get_app_merchant';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 服务商获取服务商进件页面
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/page-links/apply/merchant
     * @param array $option
     * @return void
     */
    public function addMerchant(array $option)
    {
        $api = '/api/apps/ecpay/saas/add_merchant';
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 服务商获取合作方进件页面
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/ecpay/page-links/apply/sub-merchant
     * @param array $option
     * @return void
     */
    public function addSubMerchant(array $option)
    {
        $api = '/api/apps/ecpay/saas/add_sub_merchant';
        $sign = Tools::sign($option);
        $option['sign'] = $sign;
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option
        ]);
        return $res;
    }
}