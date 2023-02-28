<?php

namespace Douyin\Contracts;

use Douyin\Douyin;
use Douyin\Model\SubscribeMessages;


class Subscribe extends Basic
{

    /**
     * 查询订阅消息模版库
     *
     * @param array $option
     * @return void
     */
    public function querySubscribeNotificationTplList(array $option)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->querySubscribeNotificationTplList($option);
    }

    /**
     * 发送订阅消息
     *
     * @param array $option
     * @return void
     */
    public function subscribeNotification(array $option)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->subscribeNotification($option);
    }

    /**
     * 查询小程序的模版列表
     *
     * @param array $option
     * @return void
     */
    public function queryAppSubscribeNotificationTpl(array $option)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->queryAppSubscribeNotificationTpl($option);
    }

    /**
     * 添加模版
     *
     * @param array $option
     * @return void
     */
    public function addAppSubscribeNotificationtTpl(array $option)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->addAppSubscribeNotificationtTpl($option);
    }

    /**
     * 修改模版
     *
     * @param array $option
     * @return void
     */
    public function modifyAppSubscribeNotificationTpl(array $option)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->modifyAppSubscribeNotificationTpl($option);
    }

    /**
     * 删除模版
     *
     * @param string $msg_id
     * @return void
     */
    public function deleteAppSubscribeNotificationTpl(string $msg_id)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->deleteAppSubscribeNotificationTpl($msg_id);
    }

    /**
     * 查询新建订阅消息模版列表
     *
     * @param integer $page_num
     * @param integer $page_size
     * @param integer|null $status
     * @return void
     */
    public function queryCreatedSubscribeNotificationTplList(int $page_num = 1, int $page_size = 20, int $status = null)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->queryCreatedSubscribeNotificationTplList($page_num, $page_size, $status);
    }

    /**
     * 新建订阅消息模版
     *
     * @param string $title
     * @param array $keyword_list
     * @param string $category_ids
     * @param integer $classification
     * @param array $host_list
     * @return void
     */
    public function createSubscribeNotificationTpl(string $title, array $keyword_list, string $category_ids, int $classification, array $host_list)
    {
        $SubscribeMessages = SubscribeMessages::instance($this->config->get());
        return $SubscribeMessages->createSubscribeNotificationTpl($title, $keyword_list, $category_ids, $classification, $host_list);
    }
}
