<?php

namespace Douyin\Model\Panknowledge;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;
use Douyin\Tools\Cache;
use Douyin\Contracts\Config;

class CourseLibrary extends Basic
{
    /**
     * 【泛知识】上传课程资源
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/resource-upload
     * @param array $data
     * @return void
     */
    public function uploadResource(array $data)
    {
        $api = '/product/api/upload_resource';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】查询课程资源上传状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/resource-upload-query
     * @param array $data
     * @return void
     */
    public function queryResourceStatus(array $data)
    {
        $api = '/product/api/query_resource_status';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】添加资质
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/qualification-add
     * @param array $data
     * @return void
     */
    public function addQualification(array $data)
    {
        $api = '/product/api/add_qualification';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'headers' => ['Aweme-Check-Type' => 'REJECT'],
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】修改资质
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/qualification-modify
     * @param array $data
     * @return void
     */
    public function modifyQualification(array $data)
    {
        $api = '/product/api/modify_qualification';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'headers' => ['Aweme-Check-Type' => 'REJECT'],
            'json' => $data
        ]);
        return $res;
    }


    /**
     * 【泛知识】查询资质
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/qualification-query
     * @param array $data
     * @return void
     */
    public function queryQualification(array $data)
    {
        $api = '/product/api/query_qualification';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】添加课程
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/product-add
     * @param array $data
     * @return void
     */
    public function add(array $data)
    {
        $api = '/product/api/add';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】修改课程
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/product-query
     * @param array $data
     * @return void
     */
    public function modify(array $data)
    {
        $api = '/product/api/modify';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'headers' => ['Aweme-Check-Type' => 'REJECT'],
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】查询课程
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/product-query
     * @param array $data
     * @return void
     */
    public function query(array $data)
    {
        $api = '/product/api/query';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】查询课程审核
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/queryReview
     * @param array $data
     * @return void
     */
    public function queryReview(array $data)
    {
        $api = '/product/api/query_review';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】修改课程免审
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/product-modify-no-audit
     * @param array $data
     * @return void
     */
    public function modifyNoAudit(array $data)
    {
        $api = '/product/api/modify_no_audit';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】查询免审课程
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/query-test-course
     * @param array $data
     * @return void
     */
    public function queryTemplateInfo(array $data)
    {
        $api = '/product/api/query_template_info';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】回调通知
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/sync-callback-url
     * @param array $data
     * @return void
     */
    public function syncCallbackUrl(array $data)
    {
        $api = '/product/api/sync_callback_url';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'headers' => ['Aweme-Check-Type' => 'REJECT'],
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】修改商品退款规则
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/product-refund-rule-modify
     * @param array $data
     * @return void
     */
    public function modifyRefundRule(array $data)
    {
        $api = '/product/api/modify_refund_rule';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'headers' => ['Aweme-Check-Type' => 'REJECT'],
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】查询可选退款规则
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/refund-meta-query
     * @param array $data
     * @return void
     */
    public function queryRefundRuleMeta(array $data)
    {
        $api = '/product/api/query_refund_rule_meta';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }

    /**
     * 【泛知识】查询课程类目信息
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/product/queryClassInfo
     * @param array $data
     * @return void
     */
    public function queryClassInfo(array $data)
    {
        $api = '/product/api/query_class_info';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('curriculum_url') . $api, [
            'json' => $data
        ]);
        return $res;
    }
}
