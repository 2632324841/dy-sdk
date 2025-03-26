<?php

namespace Douyin\Contracts;

use ReflectionClass;
use ReflectionMethod;
use ReflectionException;
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
     * 始终创建新的对象实例
     * @var bool
     */
    protected static $alwaysNewInstance;

    /**
     * 容器对象实例
     */
    protected static $instance;

    /**
     * 容器中的对象实例
     * @var array
     */
    protected static $instances = [];

    /**
     * 容器绑定标识
     * @var array
     */
    protected static $bind = [
        'Xcx' => Xcx::class,
        'Payment' => Payment::class,
        'Subscribe' => Subscribe::class,
    ];

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
        //配置缓存
        $this->config->set('cache_type', 'file');
        $this->config->set('cache_path', './douyin');
        if (isset($options['cache_path']) && !empty($options['cache_path'])) {
            $this->config->set('cache_path', $options['cache_path']);
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
     * 获取当前容器的实例（单例）
     * @access public
     * @return static
     */
    public static function getInstance(array $option)
    {
        if (is_null(static::$instance)) {
            static::$instance = new static($option);
        }

        return static::$instance;
    }

    /**
     * 设置当前容器的实例
     * @access public
     * @param  object        $instance
     * @return void
     */
    public static function setInstance($instance)
    {
        static::$instance = $instance;
    }

    /**
     * 获取当前Facade对应类名（或者已经绑定的容器对象标识）
     * @access protected
     * @return string
     */
    protected static function getFacadeClass()
    {
    }


    public static function createFacade($class = '', $args = [], $newInstance = false)
    {
        $class = $class ?: static::class;

        $facadeClass = static::getFacadeClass();

        if ($facadeClass) {
            $class = $facadeClass;
        } else if (isset(self::$bind[$class])) {
            $class = self::$bind[$class];
        }

        if (static::$alwaysNewInstance) {
            $newInstance = true;
        }

        return self::make($class, $args, $newInstance);
    }

    public static function make($class, $argv, $newInstance)
    {
        try {
            if ($newInstance) {
                if (isset(self::$instances[$class])) {
                    return self::$instances[$class];
                }
            }
            $ref = new \ReflectionClass($class);
            if (!$ref->inNamespace()) {
                return null;
            }
            // $constructor = $ref->getConstructor();
            $instance = $ref->newInstanceArgs($argv);
            self::$instances[$class] = $instance;
            self::setInstance($instance);
            return $instance;
        } catch (ReflectionException $e) {
            throw new ReflectionException('class not exists: ' . $class);
        }
    }

    /**
     * 静态创建对象
     * @param array $config
     * @return static
     */
    public static function instance(array $config)
    {
        $key = md5(get_called_class() . serialize($config));
        if (isset(self::$instances[$key])) return self::$instances[$key];
        return self::$instances[$key] = new static($config);
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
    public function decryptData(string $sessionKey, string $encryptedData, string $iv, string $signature = null)
    {
        $DouyinDataCrypt = new DouyinDataCrypt($this->config->get('appid'), $sessionKey);
        $data = $DouyinDataCrypt->decryptData($encryptedData, $iv, $signature);
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
     * @return 
     */
    public function getConfig($key)
    {
        return $this->config->get($key);
    }

    /**
     * 验签
     *
     * @param [type] $http_body
     * @param [type] $timestamp
     * @param [type] $nonce_str
     * @param [type] $sign
     * @return void
     */
    public function verify($http_body, $timestamp, $nonce_str, $sign)
    {
        $data = $timestamp . "\n" . $nonce_str . "\n" . $http_body . "\n";
        $res = openssl_get_publickey($this->getConfig('PublicKey')); // 注意验签时publicKey使用平台公钥而非应用公钥
        $result = (bool)openssl_verify($data, base64_decode($sign), $res, OPENSSL_ALGO_SHA256);
        $php_version = floatval(phpversion());
        if ($php_version < 8.0) {
            openssl_free_key($res);
        }

        return $result;  //bool
    }

    /**
     * 创建签名
     *
     * @param [type] $method
     * @param [type] $url
     * @param [type] $body
     * @param [type] $timestamp
     * @param [type] $nonce_str
     * @return void
     */
    public function makeSign($method, $url, $body, $timestamp, $nonce_str)
    {
        //method内容必须大写，如GET、POST，uri不包含域名，必须以'/'开头
        $text = $method . "\n" . $url . "\n" . $timestamp . "\n" . $nonce_str . "\n" . $body . "\n";
        $priKey = file_get_contents("/private_key.pem");
        $privateKey = openssl_get_privatekey($priKey, '');
        openssl_sign($text, $sign, $privateKey, OPENSSL_ALGO_SHA256);
        $sign = base64_encode($sign);
        $php_version = floatval(phpversion());
        if ($php_version < 8.0) {
            openssl_free_key($privateKey);
        }
        return $sign;
    }
    
}
