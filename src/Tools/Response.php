<?php

namespace Douyin\Tools;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response as Psr7Response;
use Exception;

class Response
{
    /**
     * 处理响应
     *
     * @param Psr7Response $response
     * @return void
     */
    public static function response(Psr7Response $response)
    {
        if ($response->getStatusCode() == 200) {
            $body = $response->getBody();
            $text = $body->getContents();
            //json
            $json = json_decode($text, true);
            if ($json != false) {
                return $json;
            } else {
                //字符串
                return $text;
            }
        } else {
            throw new Exception("Request status code is not equal to 200 . res : " . (string)$response->getBody(), $response->getStatusCode());
        }
    }

    /**
     * 抖音的响应处理
     *
     * @param array $data
     * @return void
     */
    public static function douYingResponse(array $data)
    {
        //如果有错误
        if (isset($data['err_no']) && $data['err_no'] != 0) {
            $error_message = self::dyErrorMessage($data);
            $code = self::dyErrorCode($data);
            throw new Exception('error code : ' . $code . ". error message : " . $error_message . ' . error data : ' . json_encode($data, 256), 0);
        }
        if (isset($data['error']) && $data['error'] != 0) {
            $error_message = self::dyErrorMessage($data);
            $code = self::dyErrorCode($data);
            throw new Exception('error code : ' . $code . ". error message : " . $error_message . ' . error data : ' . json_encode($data, 256), 0);
        }
        if (isset($data['error']) && $data['error'] != 0) {
            $error_message = self::dyErrorMessage($data);
            $code = self::dyErrorCode($data);
            throw new Exception('error code : ' . $code . ". error message : " . $error_message . ' . error data : ' . json_encode($data, 256), 0);
        } else {
            return $data;
        }
    }

    /**
     * 处理抖音错误消息
     *
     * @param array $data
     * @return void
     */
    public static function dyErrorMessage(array $data){
        if(isset($data['err_tips'])){
            return $data['err_tips'];
        }
        if(isset($data['err_msg'])){
            return $data['err_msg'];
        }
        if(isset($data['errmsg'])){
            return $data['errmsg'];
        }
        if(isset($data['message'])){
            return $data['message'];
        }
        return '未知下标错误消息';
    }

    /**
     * 处理抖音错误代码
     *
     * @param array $data
     * @return void
     */
    public static function dyErrorCode(array $data){
        if(isset($data['errcode'])){
            return $data['errcode'];
        }
        if(isset($data['err_no'])){
            return $data['err_no'];
        }
        if(isset($data['error'])){
            return $data['error'];
        }
        return 500;
    }
}
