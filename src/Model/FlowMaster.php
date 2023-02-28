<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class FlowMaster extends Basic
{
    /**
     * 查询流量主开通状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/traffic-permission/query-status
     * @return void
     */
    public function queryTrafficPermissionStatus()
    {
        $api = '/api/apps/v1/capacity/query_traffic_permission_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
        ]);
        return $res;
    }

    /**
     * 开通流量主
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/traffic-permission/open-traffic-permission
     * @param array $option
     * @return void
     */
    public function openTrafficPermission(array $option)
    {
        $api = '/api/apps/v1/capacity/query_traffic_permission_status';
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
     * 查询广告位列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/traffic-permission/query-ad-placement-list
     * @return void
     */
    public function queryAdPlacementList()
    {
        $api = '/api/apps/v1/capacity/query_ad_placement_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
        ]);
        return $res;
    }

    /**
     * 新增广告位
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/traffic-permission/add-ad-placement
     * @param string $ad_placement_name
     * @param integer $ad_placement_type
     * @return void
     */
    public function addAdPlacement(string $ad_placement_name, int $ad_placement_type = 1)
    {
        $api = '/api/apps/v1/capacity/add_ad_placement';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'ad_placement_name' => $ad_placement_name,
            'ad_placement_type' => $ad_placement_type,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 更新广告位状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/traffic-permission/update-ad-placement-status
     * @param string $ad_placement_id
     * @param integer $status
     * @return void
     */
    public function updateAdPlacementStatus(string $ad_placement_id, int $status = 0)
    {
        $api = '/api/apps/v1/capacity/update_ad_placement_status';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'ad_placement_id' => $ad_placement_id,
            'status' => $status,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询广告收入
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/traffic-permission/query-ad-income
     * @param string $start_date
     * @param string $end_date
     * @param string|null $host_name
     * @return void
     */
    public function queryAdIncome(string $start_date, string $end_date, string $host_name = null)
    {
        $api = '/api/apps/v1/capacity/query_ad_income';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'start_date' => $start_date,
            'end_date' => $end_date,
        ];
        if(!empty($host_name)){
            $data['host_name'] = $host_name;
        }
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 查询广告结算单列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/traffic-permission/query-ad-settlement-list
     * @param string $month
     * @param integer $status
     * @return void
     */
    public function queryAdSettlementList(string $month, int $status = 1)
    {
        $api = '/api/apps/v1/capacity/query_ad_settlement_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'month' => $month,
            'status' => $status,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }
}
