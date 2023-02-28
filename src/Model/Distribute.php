<?php

namespace Douyin\Model;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;

class Distribute extends Basic
{
    /**
     * 添加小程序别名
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/delivery/add-alias
     * @param string $alias
     * @return void
     */
    public function addAlias(string $alias)
    {
        $api = '/api/apps/v1/capacity/add_alias';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'alias' => $alias,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询小程序别名
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/delivery/query-alias-list
     * @return void
     */
    public function queryAliasList()
    {
        $api = '/api/apps/v1/capacity/query_alias_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
        ]);
        return $res;
    }

    /**
     * 修改小程序别名
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/delivery/modify-alias
     * @param string $before_alias
     * @param string $after_alias
     * @return void
     */
    public function modifyAlias(string $before_alias, string $after_alias)
    {
        $api = '/api/apps/v1/capacity/modify_alias';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'before_alias' => $before_alias,
            'after_alias' => $after_alias,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 删除小程序别名
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/delivery/delete-alias
     * @param string $alias
     * @return void
     */
    public function deleteAlias(string $alias)
    {
        $api = '/api/apps/v1/capacity/modify_alias';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'alias' => $alias,
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 设置小程序搜索标签
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/delivery/set-search-tag
     * @param array $modify_tag_list
     * @param array $add_tag_list
     * @param array $delete_tag_list
     * @return void
     */
    public function setSearchTag(array $modify_tag_list, array $add_tag_list = [], array $delete_tag_list = [])
    {
        $api = '/api/apps/v1/capacity/modify_alias';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $data = [
            'modify_tag_list' => $modify_tag_list,
        ];
        if (count($modify_tag_list) > 0) {
            $data['add_tag_list'] = $add_tag_list;
        }
        if (count($delete_tag_list) > 0) {
            $data['delete_tag_list'] = $delete_tag_list;
        }
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询小程序搜索标签列表
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/delivery/query-search-tag-list
     * @return void
     */
    public function querySearchTagList()
    {
        $api = '/api/apps/v1/capacity/query_search_tag_list';
        $headers = [
            'access-token' => $this->getAccessToken(),
        ];
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'headers' => $headers,
        ]);
        return $res;
    }
}
