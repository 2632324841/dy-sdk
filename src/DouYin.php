<?php

namespace Douyin;

use Douyin\Contracts\Basic;
use Exception;

class Douyin extends Basic
{

    /**
     * 定义当前版本
     * @var string
     */
    const VERSION = '1.0.5';
    
     /**
     * 静态魔术加载方法
     * @param string $name 静态类名
     * @param array $arguments 参数集合
     * @return mixed
     * @throws InvalidInstanceException
     */
    public static function __callStatic($name, $arguments)
    {
        return static::createFacade($name, $arguments);
    }
}
