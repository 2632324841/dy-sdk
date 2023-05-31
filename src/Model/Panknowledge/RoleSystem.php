<?php

namespace Douyin\Model\Panknowledge;

use Douyin\Tools\Request;
use Douyin\Contracts\Basic;
use Douyin\Tools\Cache;
use Douyin\Contracts\Config;

class RoleSystem extends Basic
{
    /**
     * 上传材料
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/upload-qualification-materials
     * @param array $data
     * @return void
     */
    public function UploadMaterials(array $data)
    {
        $api = '/auth/entity/upload_material';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'multipart' => $data
        ]);
        return $res;
    }

    /**
     * 代运营服务商帮老师或代运营模式机构入驻
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/partner-help-teacher-institution-join
     * @param array $data
     * @return void
     */
    public function bypartner(array $data)
    {
        $api = '/auth/entity/bypartner';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 自营机构/服务商入驻
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/institution-partner-join
     * @param array $data
     * @return void
     */
    public function byself(array $data)
    {
        $api = '/auth/entity/byself';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 新增角色
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/add-role
     * @param array $data
     * @return void
     */
    public function addRole(array $data)
    {
        $api = '/auth/entity/add_role';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询基础认证资质
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/query-basic-qualification
     * @param array $data
     * @return void
     */
    public function getBasicAuth(array $data)
    {
        $api = '/auth/entity/get_basic_auth';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 更新基础认证资质
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/update-basic-qualification
     * @param array $data
     * @return void
     */
    public function updateBasicAuth(array $data)
    {
        $api = '/auth/entity/update_basic_auth';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 更新基础认证资质
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/query-category-qualification
     * @param array $data
     * @return void
     */
    public function getClassAuth(array $data)
    {
        $api = '/auth/entity/get_class_auth';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 添加类目认证资质
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/add-category-qualification
     * @param array $data
     * @return void
     */
    public function addClassAuth(array $data)
    {
        $api = '/auth/entity/add_class_auth';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 获取审核任务详情
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/get-audit-task-details
     * @param array $data
     * @return void
     */
    public function getAuditDetail(array $data)
    {
        $api = '/auth/entity/get_audit_detail';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 小程序绑定角色
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/miniapp-binding-role
     * @param array $data
     * @return void
     */
    public function bindRole(array $data)
    {
        $api = '/auth/entity/bind_role';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 小程序解除绑定角色
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/miniapp-unbinding-role
     * @param array $data
     * @return void
     */
    public function unbindRole(array $data)
    {
        $api = '/auth/entity/unbind_role';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询小程序已绑定的角色
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/query-miniapp-bound-role
     * @param array $data
     * @return void
     */
    public function getBindList(array $data)
    {
        $api = '/auth/entity/get_bind_list';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 角色授权小程序
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/role-authorization-miniapp
     * @param array $data
     * @return void
     */
    public function authRole(array $data)
    {
        $api = '/auth/entity/auth_role';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 解除授权小程序
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/deauthorization-miniapp
     * @param array $data
     * @return void
     */
    public function unauthRole(array $data)
    {
        $api = '/auth/entity/unauth_role';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询授权小程序
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/query-authorization-applet
     * @param array $data
     * @return void
     */
    public function getAppidAuth(array $data)
    {
        $api = '/auth/entity/get_appid_auth';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 更新授权小程序授权信息
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/update-authorization-letter-of-miniapp
     * @param array $data
     * @return void
     */
    public function updateAuthletter(array $data)
    {
        $api = '/auth/entity/update_authletter';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 获取老师/机构角色的进件页面、提现页或提现记录页
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/get-teacher-institution-role-pages
     * @param array $data
     * @return void
     */
    public function getSaasUrl(array $data)
    {
        $api = '/api/apps/ecpay/saas/get_saas_url';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 商户号激活
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/merchant-account-activation
     * @param array $data
     * @return void
     */
    public function activateMerchantcode(array $data)
    {
        $api = '/auth/entity/activate_merchantcode';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询商户号激活状态
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/query-merchant-account-activation-state
     * @param array $data
     * @return void
     */
    public function queryMerchantcodeStatus(array $data)
    {
        $api = '/auth/entity/query_merchantcode_status';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    /**
     * 查询实体 ID
     *
     * @link https://developer.open-douyin.com/docs/resource/zh-CN/mini-app/develop/server/pan-knowledge/role/query-entity-id
     * @param array $data
     * @return void
     */
    public function queryEntityInfo(array $data)
    {
        $api = '/auth/entity/query_entity_info';
        $data['access_token'] =  $this->getAccessToken();
        $res = Request::request('POST', $this->config->get('url') . $api, [
            'json' => $data,
        ]);
        return $res;
    }

    
}
