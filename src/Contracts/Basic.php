<?php

namespace Douyin\Contracts;

use Douyin\Model\AccessToken;
use Douyin\Tools\DouyinDataCrypt;

class Basic
{
    /**
     * 商户配置
     * @var DataArray
     */
    protected $config;

    /**
     * 当前请求数据
     * @var DataArray
     */
    protected $params;

    protected $headers = [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36',
        'Content-Type' => 'application/json:',
    ];

    /**
     * 静态缓存
     * @var static
     */
    protected static $cache;

    /**
     * 交易系统URL
     *
     * @var string
     */
    protected $open_douyin = 'https://open.douyin.com';
    /**
     * 抖音沙盒URL
     *
     * @var string
     */
    protected $douyin_sandbox = 'https://open-sandbox.douyin.com';
    /**
     * 头条URL
     *
     * @var string
     */
    protected $toutiao_online = 'https://developer.toutiao.com';
    /**
     * 课程库URL
     *
     * @var string
     */
    protected $curriculum_online = 'https://developer-product.zijieapi.com';
    /**
     * 课程库沙盒URL
     *
     * @var string
     */
    protected $curriculum_sandbox = 'https://open-sandbox.douyin.com';
    /**
     * 字节头条
     *
     * @var string
     */
    protected $bytedance = 'https://open.microapp.bytedance.com';

    /**
     * 抖音
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->config = new Config($options);
        // 商户基础参数
        $this->params = new Config([
            'appid'     => $this->config->get('appid'),
            'mch_id'    => $this->config->get('mch_id'),
        ]);
        // 商户参数支持
        if ($this->config->get('sub_appid')) {
            $this->params->set('sub_appid', $this->config->get('sub_appid'));
        }
        if ($this->config->get('sub_mch_id')) {
            $this->params->set('sub_mch_id', $this->config->get('sub_mch_id'));
        }

        //设置api
        if ($this->config->get('isSandBox')) {
            $this->config->set('curriculum_url', $this->curriculum_sandbox);
            $this->config->set('url', $this->douyin_sandbox);
        } else {
            $this->config->set('curriculum_url', $this->curriculum_online);
            $this->config->set('url', $this->toutiao_online);
        }
        $this->config->set('open_url', $this->open_douyin);
        $this->config->set('bytedance_url', $this->bytedance);
        //PublicKey 平台公钥
        //appPublicKey 应用公钥
        //payment_salt

    }

    /**
     * 静态创建对象
     * @param array $config
     * @return static
     */
    public static function instance(array $config)
    {
        $key = md5(get_called_class() . serialize($config));
        if (isset(self::$cache[$key])) return self::$cache[$key];
        return self::$cache[$key] = new static($config);
    }

    /**
     * 获取小程序凭证
     *
     * @return void
     */
    public function getAccessToken()
    {
        $AccessToken = AccessToken::instance($this->config->get());
        return $AccessToken->getAccessToken();
    }

    /**
     * 抖音敏感数据解码(一定要在tt.login后使用)
     *
     * @param string $sessionKey
     * @param string $encryptedData
     * @param string $iv
     * @return void
     */
    public function decryptData(string $sessionKey, string $encryptedData, string $iv)
    {
        $DouyinDataCrypt = new DouyinDataCrypt($this->config->get('appid'), $sessionKey);
        $data = $DouyinDataCrypt->decryptData($encryptedData, $iv, $data);
        return $data;
    }

    /**
     * 设置配置数据
     *
     * @param [type] $key
     * @param [type] $val
     * @return void
     */
    public function setConfig($key, $val)
    {
        $this->config->set($key, $val);
        return $this;
    }

    /**
     * 获取配置数据
     *
     * @param [type] $key
     * @return void
     */
    public function getConfig($key)
    {
        return $this->config->get($key);
    }
}
