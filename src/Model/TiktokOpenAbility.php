<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class TiktokOpenAbility extends Basic
{

    /**
     * 查询抖音开放能力列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/aweme-capacity/query-aweme-permission-list
     * @return void
     */
    public function queryAwemePermissionList()
    {
        $api = '/api/apps/v1/capacity/query_aweme_permission_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
        ]);
        return $res;
    }

    /**
     * 申请开通抖音开放能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/aweme-capacity/apply-aweme-permission
     * @param string $permission_key
     * @param string $scene_desc
     * @return void
     */
    public function applyAwemePermission(string $permission_key, string $scene_desc)
    {
        $api = '/api/apps/v1/capacity/apply_aweme_permission';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'permission_key' => $permission_key,
            'scene_desc' => $scene_desc,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询 scope 配额详情
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/aweme-capacity/query-scope-quota-detail
     * @param string $permission_key
     * @return void
     */
    public function queryScopeQuotaDetail(string $permission_key)
    {
        $api = '/api/apps/v1/capacity/query_scope_quota_detail';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'permission_key' => $permission_key,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * scope 申请提额
     * 
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/aweme-capacity/apply-scope-quota
     * @param array $option
     * @return void
     */
    public function applyScopeQuota(array $option)
    {
        $api = '/api/apps/v1/capacity/apply_scope_quota';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 查询视频关键词列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/aweme-capacity/query-aweme-video-keyword
     * @param array $option
     * @return void
     */
    public function queryAwemeVideoKeywordList(int $page_num = 1, int $page_size = 20)
    {
        $api = '/api/apps/v1/capacity/query_aweme_video_keyword_list';
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
     * 新增视频关键词
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/aweme-capacity/add-aweme-video-keyword
     * @param string $keyword
     * @param string $reason
     * @return void
     */
    public function addAwemeVideoKeyword(string $keyword, string $reason)
    {
        $api = '/api/apps/v1/capacity/add_aweme_video_keyword';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'reason' => $reason,
            'keyword' => $keyword,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 删除视频关键词
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/aweme-capacity/delete-aweme-video-keyword
     * @param string $keyword_id
     * @return void
     */
    public function deleteAwemeVideoKeyword(string $keyword_id)
    {
        $api = '/api/apps/v1/capacity/delete_aweme_video_keyword';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'keyword_id' => $keyword_id,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }
}
