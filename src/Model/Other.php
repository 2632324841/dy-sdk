<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;


class Other extends Basic
{
    /**
     * 上传直播间封面图
     *
     * @param string $start_page
     * @param string $title
     * @param string $image
     * @param integer|null $room_id
     * @return void
     */
    public function upload_live_image(string $start_page, string $title, string $image, int $room_id = null)
    {
        $api = '/api/apps/upload_live_image';
        $option = [
            'app_id' => $this->config->get('appid'),
            'start_page' => $start_page,
            'title' => $title,
            'image' => $image,
            'room_id' => $room_id
        ];
        $new_data = [];
        foreach ($option as $key => $val) {
            $new_data[] = [
                'name' => $key,
                'contents' => $val,
            ];
        }
        $option['access_token'] = $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'multipart' => $new_data,
        ]);
        return $res;
    }

    /**
     * 抖音开放平台与小程序视频打通能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/other/video-id-convert
     * @return void
     */
    public function videoIdToOpenItemId(array $video_ids, $access_key)
    {
        $api = '/api/apps/convert_video_id/video_id_to_open_item_id';
        $data = [
            'access_token' => $this->getAccessToken(),
            'video_ids' => $video_ids,
            'app_id' => $this->config->get('appid'),
            'access_key' => $access_key,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 视频使用能力能力
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/other/video-id-convert
     * @param array $video_ids
     * @param [type] $access_key
     * @return void
     */
    public function openItemIdToEncryptId(array $video_ids, $access_key)
    {
        $api = '/api/apps/convert_video_id/open_item_id_to_encrypt_id';
        $data = [
            'access_token' => $this->getAccessToken(),
            'video_ids' => $video_ids,
            'app_id' => $this->config->get('appid'),
            'access_key' => $access_key,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 开放能力配置接口
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/other/solution
     * @param array $option
     * @return void
     */
    public function solutionSetImpl(array $option)
    {
        $api = '/api/industry/v1/solution/set_impl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 查询生效中配置接口
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/other/solution
     * @param array $option
     * @return void
     */
    public function queryImpl(array $option)
    {
        $api = '/api/industry/v1/solution/query_impl';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 上传资源
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/other/upload-material
     * @param string $material_type
     * @param [type] $material_file
     * @return void
     */
    public function upload_material(string $material_type, $material_file)
    {
        $api = '/api/apps/v1/capacity/upload_material';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $option = [
            [
                'name' => 'material_type',
                'contents' => $material_type,
            ],
            [
                'name' => 'material_file',
                'contents' => $material_file,
            ]
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'multipart' => $option,
        ]);
        return $res;
    }

    /**
     * 新增测试物料接口
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/other/test-relation-api
     * @param array $option
     * @return void
     */
    public function addAppTestRelation(array $option)
    {
        $api = '/api/industry/v1/solution/add_app_test_relation';
        $headers = [
            'Access-Token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 查询测试物料接口
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/other/test-relation-api
     * @param array $option
     * @return void
     */
    public function queryAppTestRelation(string $type)
    {
        $api = '/api/industry/v1/solution/query_app_test_relation';
        $headers = [
            'Access-Token' => $this->getAccessToken(),
        ];
        $option['type'] = $type;
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option,
        ]);
        return $res;
    }

    /**
     * 删除测试物料接口
     *
     * @param array $option
     * @return void
     */
    public function deleteAppTestRelation(array $option)
    {
        $api = '/api/industry/v1/solution/delete_app_test_relation';
        $headers = [
            'Access-Token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('open_url') . $api, [
            'headers' => $headers,
            'json' => $option,
        ]);
        return $res;
    }
}
