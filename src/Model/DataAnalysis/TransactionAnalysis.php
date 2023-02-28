<?php

namespace Douyin\Model\DataAnalysis;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class TransactionAnalysis extends Basic
{
    /**
     * 总览分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/user-analysis/behavior-analysisx
     * @param integer $start_time
     * @param integer $end_time
     * @param string|null $host_name
     * @param string|null $version_type
     * @return void
     */
    public function queryDealOverviewData(int $start_time, int $end_time, string $host_name = null, string $version_type = null)
    {
        $api = '/api/apps/v1/data_analysis/query_deal_overview_data';
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
     * 短视频交易分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/transaction-analysis/video-analysis
     * @param integer $start_time
     * @param integer $end_time
     * @param string|null $host_name
     * @return void
     */
    public function queryVideoDealData(int $start_time, int $end_time, string $host_name = null)
    {
        $api = '/api/apps/v1/data_analysis/query_video_deal_data';
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
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 获取直播房间数据
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/transaction-analysis/query-live-room
     * @param string $anchor_name
     * @return void
     */
    public function queryLiveRoom(string $anchor_name)
    {
        $api = '/api/apps/v1/data_analysis/query_live_room';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'anchor_name' => $anchor_name,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 直播数据分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/transaction-analysis/live-room-data-analysis
     * @param integer $live_room_id
     * @return void
     */
    public function queryLiveRoomData(int $live_room_id)
    {
        $api = '/api/apps/v1/data_analysis/query_live_room_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'live_room_id' => $live_room_id,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 直播交易分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/transaction-analysis/live-deal-analysis
     * @param integer $live_room_id
     * @return void
     */
    public function queryLiveDealData(int $live_room_id)
    {
        $api = '/api/apps/v1/data_analysis/query_live_deal_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'live_room_id' => $live_room_id,
        ];
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }

    /**
     * 商品分析
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/data-analysis/transaction-analysis/product-deal-analysis
     * @param integer $start_time
     * @param integer $end_time
     * @param integer $page_num
     * @param integer $page_size
     * @param [type] $host_name
     * @return void
     */
    public function queryProductDealData(int $start_time, int $end_time, int $page_num = 1, $page_size = 20, $host_name = null)
    {
        $api = '/api/apps/v1/data_analysis/query_product_deal_data';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'page_num' => $page_num,
            'page_size' => $page_size,
        ];
        if (!empty($host_name)) {
            $data['host_name'] = $host_name;
        }
        $res = Request::request('GET', $this->config->get('url') . $api, [
            'headers' => $headers,
            'query' => $data,
        ]);
        return $res;
    }
}
