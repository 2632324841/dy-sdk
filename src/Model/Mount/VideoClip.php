<?php

namespace Douyin\Model\Mount;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class VideoClip extends Basic
{
    /**
     * 查询剪映视频模版能力申请状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/capcut-video-template/query-status
     * @return void
     */
    public function queryApplyCapcutVideoTemplateStatus()
    {
        $api = '/api/apps/v1/capacity/query_apply_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.mount.capcut_video_template',
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 申请剪映视频模版能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/capcut-video-template/apply-capacity
     * @param string $apply_reason
     * @param array $apply_info
     * @return void
     */
    public function applyCapcutVideoTemplate(string $apply_reason, array $apply_info)
    {
        $api = '/api/apps/v1/capacity/apply_capacity';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'capacity_key' => 'ma.mount.capcut_video_template',
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
     * 查询绑定的剪映号
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/mount/capcut-video-template/query-capcut-info
     * @return void
     */
    public function queryCapcutInfo()
    {
        $api = '/api/apps/v1/capacity/query_capcut_info';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
        ]);
        return $res;
    }

    /**
     * 查询剪映模版列表
     *
     * @param integer $page_num
     * @param integer $page_size
     * @return void
     */
    public function queryCapcutTemplateList(int $page_num = 1, int $page_size = 20)
    {
        $api = '/api/apps/v1/capacity/query_capcut_template_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'page_num' => $page_num,
            'page_size' => $page_size,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 更新剪映模板状态
     *
     * @param integer $template_id
     * @param integer $template_status
     * @return void
     */
    public function updateCapcutTemplateStatus(int $template_id = 1, int $template_status = 1)
    {
        $api = '/api/apps/v1/capacity/update_capcut_template_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'template_id' => $template_id,
            'template_status' => $template_status,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }
}
