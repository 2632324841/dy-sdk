<?php

namespace Douyin\Model\DataAnalysis;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class UserAnalysis extends Basic
{
    /**
     * 行为分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/behavior-analysisx
     * @param integer $start_time
     * @param integer $end_time
     * @param string|null $host_name
     * @param string|null $os
     * @param string|null $version_type
     * @return void
     */
    public function queryBehaviorData(int $start_time, int $end_time, string $host_name = null, string $os = null, string $version_type = null)
    {
        $api = '/api/apps/v1/data_analysis/query_behavior_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];
        if (!empty($host_name)) {
            $data['host_name'] = $host_name;
        }
        if (!empty($os)) {
            $data['os'] = $os;
        }
        if (!empty($version_type)) {
            $data['version_type'] = $version_type;
        }
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 实时分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/realtime-analysis
     * @param string $host_name
     * @param string $version_type
     * @return void
     */
    public function queryRealTimeUserData(string $host_name, string $version_type)
    {
        $api = '/api/apps/v1/data_analysis/query_behavior_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'host_name' => $host_name,
            'version_type' => $version_type,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 留存分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/retention-analysis
     * @param string $host_name
     * @param string $version_type
     * @return void
     */
    public function queryRetentionData(string $host_name, string $version_type)
    {
        $api = '/api/apps/v1/data_analysis/query_retention_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'host_name' => $host_name,
            'version_type' => $version_type,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 来源分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/scene-analysis
     * @param integer $start_time
     * @param integer $end_time
     * @param string $host_name
     * @param string|null $version_type
     * @return void
     */
    public function querySceneData(int $start_time, int $end_time, string $host_name, string $version_type = null)
    {
        $api = '/api/apps/v1/data_analysis/query_scene_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'host_name' => $host_name,
        ];
        if (!empty($version_type)) {
            $data['version_type'] = $version_type;
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 用户画像
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/user-portrait-analysis
     * @param integer $start_time
     * @param integer $end_time
     * @param string $user_type
     * @param string|null $host_name
     * @param string|null $version_type
     * @return void
     */
    public function queryUserPortraitData(int $start_time, int $end_time, string $user_type, string $host_name = null, string $version_type = null)
    {
        $api = '/api/apps/v1/data_analysis/query_user_portrait_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'user_type' => $user_type,
        ];
        if (!empty($version_type)) {
            $data['version_type'] = $version_type;
        }
        if (!empty($host_name)) {
            $data['host_name'] = $host_name;
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 终端分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/client-analysis
     * @param integer $start_time
     * @param integer $end_time
     * @param string $user_type
     * @param string|null $host_name
     * @param string|null $version_type
     * @return void
     */
    public function queryClientData(int $start_time, int $end_time, string $user_type, string $host_name = null, string $version_type = null)
    {
        $api = '/api/apps/v1/data_analysis/query_client_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'user_type' => $user_type,
        ];
        if (!empty($version_type)) {
            $data['version_type'] = $version_type;
        }
        if (!empty($host_name)) {
            $data['host_name'] = $host_name;
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 页面分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/page-analysis
     * @param integer $start_time
     * @param integer $end_time
     * @param string|null $host_name
     * @param string|null $os
     * @param string|null $version_type
     * @return void
     */
    public function queryPageData(int $start_time, int $end_time, string $host_name = null, string $os = null, string $version_type = null)
    {
        $api = '/api/apps/v1/data_analysis/query_client_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'start_time' => $start_time,
            'end_time' => $end_time,
        ];
        if (!empty($host_name)) {
            $data['host_name'] = $host_name;
        }
        if (!empty($os)) {
            $data['os'] = $os;
        }
        if (!empty($host_name)) {
            $data['host_name'] = $host_name;
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    
}
