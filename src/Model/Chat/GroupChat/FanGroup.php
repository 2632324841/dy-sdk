<?php

namespace Douyin\Model\Chat\GroupChat;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class FanGroup extends Basic
{

    /**
     * 发送群消息
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/instant-message/group-chat/group-message/im.group.message.send
     * @return void
     */
    public function send_msg_group(array $option)
    {
        $api = '/im/send/msg/group/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $params = [];
        if (isset($option['open_id'])) {
            $params['open_id'] = $option['open_id'];
            unset($option['open_id']);
        }
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'query' => $params,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 撤回群消息
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/instant-message/group-chat/group-message/group-msg-recall
     * @return void
     */
    public function recall_msg(array $option)
    {
        $api = '/im/recall/msg/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $params = [];
        if (isset($option['open_id'])) {
            $params['open_id'] = $option['open_id'];
            unset($option['open_id']);
        }
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'query' => $params,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 查询主动私信用户授权状态
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/instant-message/private-message/QueryAuthorizeStatus 
     * @return void
     */
    public function authorize_status(array $option)
    {
        $api = '/im/authorize/status/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $params = [];
        if (isset($option['open_id'])) {
            $params['open_id'] = $option['open_id'];
            unset($option['open_id']);
        }
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'query' => $params,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 查询授权主动私信用户
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/instant-message/private-message/query_private_auth_user 
     * @return void
     */
    public function authorize_user_list(array $option)
    {
        $api = '/im/authorize/user_list/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $params = [];
        if (isset($option['open_id'])) {
            $params['open_id'] = $option['open_id'];
            unset($option['open_id']);
        }
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'query' => $params,
            'json' => $option
        ]);
        return $res;
    }

    /**
     * 私信消息撤回
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/instant-message/private-message/recall-msg 
     * @return void
     */
    public function recall_msg(array $option)
    {
        $api = '/im/recall/msg/';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $params = [];
        if (isset($option['open_id'])) {
            $params['open_id'] = $option['open_id'];
            unset($option['open_id']);
        }
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'query' => $params,
            'json' => $option
        ]);
        return $res;
    }
}
