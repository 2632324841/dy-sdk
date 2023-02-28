<?php

namespace Douyin\Model\Mount;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class Mount extends Basic
{
    /**
     * 小程序直播挂载黑白名单管理能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/live-black-white-list
     * @return void
     */
    public function setBlackWhiteList(string $uniq_id, int $type = 1)
    {
        $api = '/api/apps/v1/live/set_black_white_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'appid' => $this->config->get('app_id'),
            'uniq_id' => $uniq_id,
            'type' => $type,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 拍抖音黑白名单管理能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/ShareConfig
     * @param string $uniq_id
     * @param integer $type
     * @return void
     */
    public function shareConfig(string $uniq_id, int $type = 1)
    {
        $api = '/api/apps/share_config';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'appid' => $this->config->get('app_id'),
            'uniq_id' => $uniq_id,
            'type' => $type,
            'access_token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 申请短视频自主挂载能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/apply-self-mount
     * @param string $apply_reason
     * @return void
     */
    public function applyCapacityVideoSelfMount(string $apply_reason)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'video_self_mount',
            'apply_reason' => $apply_reason,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询短视频自主挂载能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/query-video-self-mount
     * @return void
     */
    public function queryApplyVideoSelfMountStatus()
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'video_self_mount',
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 申请直播自主挂载能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/apply-live-self-mount
     * @param string $apply_reason
     * @return void
     */
    public function applyCapacityLiveSelfMount(string $apply_reason)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'live_self_mount',
            'apply_reason' => $apply_reason,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询直播自主挂载能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/query-live-self-mount
     * @return void
     */
    public function queryApplyLiveSelfMountStatus()
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'live_self_mount',
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 申请直播自主挂载能力
     *
     * @param string $apply_reason
     * @return void
     */
    public function applyCapacityVideoTalentMount(string $apply_reason)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'video_talent_mount',
            'apply_reason' => $apply_reason,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询短视频达人推广挂载能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/query-video-talent-mount
     * @return void
     */
    public function queryApplyVideoTalentMountStatus()
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'video_talent_mount',
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 短视频/直播自主挂载能力绑定抖音号
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/bind-self-mount-user
     * @param string $capacity_key
     * @param string $aweme_id
     * @return void
     */
    public function bindSelfMountUser(string $capacity_key, string $aweme_id)
    {
        $api = '/api/apps/v1/capacity/bind_self_mount_user';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => $capacity_key,
            'aweme_id' => $aweme_id,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 获取短视频/直播自主挂载抖音号绑定二维码
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/get-self-mount-bind-qrcode
     * @param string $capacity_key
     * @return void
     */
    public function getSelfMountBindQrcode(string $capacity_key = 'video_self_mount')
    {
        $api = '/api/apps/v1/capacity/get_self_mount_bind_qrcode';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => $capacity_key,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 查询短视频/直播自主挂载能力绑定抖音号列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/query-self-mount-user-list
     * @param integer $page_num
     * @param integer $page_size
     * @param string $capacity_key
     * @return void
     */
    public function querySelfMountUserList(int $page_num = 1, int $page_size = 20,string $capacity_key = 'video_self_mount')
    {
        $api = '/api/apps/v1/capacity/query_self_mount_user_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => $capacity_key,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 解除短视频/直播自主挂载能力抖音号绑定
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/unbind-self-mount-user
     * @param string $aweme_id
     * @param string $capacity_key
     * @return void
     */
    public function unbindSelfMountUser(string $aweme_id, string $capacity_key = 'video_self_mount')
    {
        $api = '/api/apps/v1/capacity/unbind_self_mount_user';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'aweme_id' => $aweme_id,
            'capacity_key' => $capacity_key,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }
}
