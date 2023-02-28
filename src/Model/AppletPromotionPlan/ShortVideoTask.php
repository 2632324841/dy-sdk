<?php

namespace Douyin\Model\AppletPromotionPlan;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class ShortVideoTask extends Basic
{
    /**
     * 查询任务台任务投稿视频数据
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/promote/taskbox/taskbox-query-task-video-data
     * @param array $option
     * @return void
     */
    public function queryTaskVideoData(array $option)
    {
        $api = '/api/apps/taskbox/query_task_video_data';
        $option['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 查询小程序任务台任务 ID
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/promote/taskbox/taskbox-query-app-task-id
     * @param array $option
     * @return void
     */
    public function queryAppTaskId(array $option)
    {
        $api = '/api/apps/taskbox/query_app_task_id';
        $option['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 任务台任务状态更新
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/promote/taskbox/updatetaskstatus
     * @param array $option
     * @return void
     */
    public function taskboxUpdateStatus(array $option)
    {
        $api = '/api/apps/taskbox/update/status/';
        $option['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 任务编辑
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/promote/taskbox/updatetasks
     * @param array $option
     * @return void
     */
    public function taskboxUpdateTask(array $option)
    {
        $api = '/api/apps/taskbox/update_task/';
        $option['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 任务台任务查询
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/promote/taskbox/taskquery
     * @param array $option
     * @return void
     */
    public function queryTaskInfo(array $option)
    {
        $api = '/api/apps/taskbox/query_task_info/';
        $option['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 小程序任务台任务上传
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/promote/taskbox/taskbox-task-upload
     * @param array $option
     * @return void
     */
    public function addTask(array $option)
    {
        $api = '/api/apps/taskbox/add_task';
        $option['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $option,
        ]);
        return $res;
    }
}