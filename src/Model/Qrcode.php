<?php
namespace Douyin\Model;
use Douyin\Tools\Request;
use Douyin\Contracts\Basic;
class Qrcode extends Basic{

    /**
     * 获取小程序/小游戏的二维码。该二维码可通过任意 app 扫码打开，能跳转到开发者指定的对应字节系 app 内拉起小程序/小游戏
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/qr-code/create-qr-code
     * @param array $data
     * @return void
     */
    public function createQRCode(array $data){
        $api = '/api/apps/qrcode';
        $data['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json'=>$data
        ]);
        return $res;
    }
}