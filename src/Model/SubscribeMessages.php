<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class SubscribeMessages extends Basic
{

    /**
     * 查询订阅消息模版库
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/query-template-list
     * @param array $option
     * @return void
     */
    public function querySubscribeNotificationTplList(array $option)
    {
        $api = '/api/apps/v1/capacity/query_subscribe_notification_tpl_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 发送订阅消息
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/notify
     * @param array $option
     * @return void
     */
    public function subscribeNotification(array $option)
    {
        $api = '/api/apps/subscribe_notification/developer/v1/notify';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 查询小程序的模版列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/query-app-template-list
     * @param array $option
     * @return void
     */
    public function queryAppSubscribeNotificationTpl(array $option)
    {
        $api = '/api/apps/v1/capacity/query_app_subscribe_notification_tpl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $option
        ]);
        return $res;
    }

    /**
     * 添加模版
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/add-template
     * @param array $option
     * @return void
     */
    public function addAppSubscribeNotificationtTpl(array $option)
    {
        $api = '/api/apps/v1/capacity/add_app_subscribe_notification_tpl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 修改模版
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/modify-app-template
     * @param array $option
     * @return void
     */
    public function modifyAppSubscribeNotificationTpl(array $option)
    {
        $api = '/api/apps/v1/capacity/modify_app_subscribe_notification_tpl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 删除模版
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/delete-template
     * @param array $data
     * @return void
     */
    public function deleteAppSubscribeNotificationTpl(string $msg_id)
    {
        $api = '/api/apps/v1/capacity/delete_app_subscribe_notification_tpl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => ['msg_id' => $msg_id],
        ]);
        return $res;
    }

    /**
     * 查询新建订阅消息模版列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/query-created-template-list
     * @param integer $page_num
     * @param integer $page_size
     * @param integer|null $status
     * @return void
     */
    public function queryCreatedSubscribeNotificationTplList(int $page_num = 1, int $page_size = 20,int $status = null)
    {
        $api = '/api/apps/v1/capacity/delete_app_subscribe_notification_tpl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'page_num' => $page_num,
            'page_size' => $page_size,
        ];
        if (!empty($status)) {
            $data['status'] = $status;
        }
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 新建订阅消息模版
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/subscribe-notification/create-template
     * @param string $msg_id
     * @return void
     */
    public function createSubscribeNotificationTpl(string $title, array $keyword_list, string $category_ids, int $classification, array $host_list)
    {
        $api = '/api/apps/v1/capacity/create_subscribe_notification_tpl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'title'=>$title,
            'keyword_list'=>$keyword_list,
            'category_ids'=>$category_ids,
            'classification'=>$classification,
            'host_list'=>$host_list,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }
}
