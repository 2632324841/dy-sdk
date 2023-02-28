<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class LiveRoomAbility extends Basic
{
    /**
     * 查询跳转抖音直播间能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/live-capcity/query-jump-live-room-status
     * @return void
     */
    public function queryApplyJumpLiveRoom()
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.jsapi.jump_live_room',
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 申请跳转抖音直播间能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/live-capcity/apply-jump-live-room
     * @param array $option
     * @return void
     */
    public function applyCapacityJumpLiveRoom(string $apply_reason, array $apply_info)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.jsapi.jump_live_room',
            'apply_reason' => $apply_reason,
            'apply_info' => $apply_info,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询直播间状态组件能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/live-capcity/query-live-room-status-capacity
     * @return void
     */
    public function queryApplyLiveRoomStatus()
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.jsapi.live_room_status',
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 申请直播间状态组件能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/live-capcity/apply-live-room-status
     * @param string $apply_reason
     * @param array $apply_info
     * @return void
     */
    public function applyCapacityLiveRoomStatus(string $apply_reason, array $apply_info)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.jsapi.live_room_status',
            'apply_reason' => $apply_reason,
            'apply_info' => $apply_info,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询实时音视频流播放器能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/live-capcity/query-rtc-video-flow-status
     * @return void
     */
    public function queryApplyRtcVideoFlow()
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.jsapi.rtc_video_flow',
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 申请实时音视频流播放器能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/live-capcity/apply-rtc-video-flow
     * @param string $apply_reason
     * @param array $apply_info
     * @return void
     */
    public function applyCapacityRtcVideoFlow(string $apply_reason, array $apply_info)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.jsapi.rtc_video_flow',
            'apply_reason' => $apply_reason,
            'apply_info' => $apply_info,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }
}
