<?php
namespace Douyin\Tools;

use GuzzleHttp\Client;
use Douyin\Tools\Response;

class Request{

    /**
     * http请求
     *
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return void
     */
    public static function request(string $method, $uri = '', array $options = []){
        $option['http_errors'] = false;
        $option[''] = false;
        $Client = new Client($option);
        if(isset($options['json']) && is_array($options['json'])){
            $options = self::handleJson($options);
        }else if(isset($options['multipart']) && is_array($options['multipart'])){
            $options = self::handleMultipart($options);
        }
        $res = $Client->request(strtoupper($method), $uri, $options);
        $response = Response::response($res);
        if(is_array($response)){
            return Response::douYingResponse($response);
        }else{
            return $response;
        }
    }

    /**
     * 处理JSON请求数据
     *
     * @param array $options
     * @return void
     */
    protected static function handleJson(array $options){
        $options['body'] = json_encode($options['json']);
        if(isset($options['headers']['Content-Type'])){
            $options['headers']['Content-Type'] = 'application/json; charset=utf-8';
        }else{
            $options['headers']['Content-Type'] = 'application/json; charset=utf-8';
        }
        unset($options['json']);
        return $options;
    }

    /**
     * 处理上传数据
     *
     * @param array $options
     * @return void
     */
    protected static function handleMultipart(array $options){
        $multipart = $options['multipart'];
        $newData = [];
        foreach($multipart as $val){
            $temp = [];
            if(isset($val['name'])){
                $temp['name'] = $val['name'];
            }
            if(isset($val['headers'])){
                $temp['headers'] = $val['headers'];
            }
            if(isset($val['contents'])){
                if(is_file($val['contents'])){
                    $temp['contents'] = fopen($val['contents'], 'r');
                }else{
                    $temp['contents'] = $val['contents'];
                }
                if(isset($val['filename']) && !empty($val['filename'])){
                    $temp['filename'] = $val['filename'];
                }
            }
        }
        $options['multipart'] = $newData;
        return $options;
    }
}