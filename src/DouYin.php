<?php

namespace Douyin;

use Douyin\Contracts\Config;
use Exception;

class Douyin
{

    /**
     * 定义当前版本
     * @var string
     */
    const VERSION = '1.0.2';

    private static $config;

    protected static $cache;

    /**
     * 静态魔术加载方法
     * @param string $name 静态类名
     * @param array $arguments 参数集合
     * @return mixed
     * @throws InvalidInstanceException
     */
    public static function __callStatic($name, $arguments)
    {
        $class = '\\Douyin\\Contracts\\' . $name;
        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }
}
